<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'favicon', 'description', 'server', 'store_type_id', 'logo',
        'seo_key_words', 'explore', 'resource', 'short_description', 'twitter', 'facebook',
        'instagram', 'linkedin', 'is_active', 'code'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function setIsActiveAttribute($active){
        $this->attributes['is_active'] = (int) $active;
    }

    public function setCodeAttribute($value){
        $code = $value;
        while (Store::whereCode($code)->exists()){
            $code = now();
        }
        $this->attributes['code'] = $code;
    }

    public function domains(){
        return $this->hasMany(Domain::class)->orderBy('id', 'asc');
    }

    public function storeType(){
        return $this->belongsTo(StoreType::class);
    }

    /**
     * Get all of the post's comments.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Get all of the post's comments.
     */
    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    public function users(){
        return $this->hasMany(User::class, 'store_id', 'id');
    }

    /**
     * Get all of the post's comments.
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function storeAdmin(){
        return $this->users()->whereHas('roles',
            function ($query){
                $query->where('name', 'admin');
            })->first();
    }

    public function applicationUrl(){
        return $this->domains()->first()?->domain;
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['storeSearch'] ?? false, function ($q, $search){
            $q->where('name', 'like','%'.$search.'%')
            ->orWhere('code', $search);
        })->when($filters['field'] ?? false, function ($query, $field) use($filters){
            $query->orderBy($field, $filters['sortAsc'] ? 'asc' : 'desc');
        })->when($filters['active'] ?? false, function ($q, $active){
            $q->where('is_active', $active);
        })->when($filters['store'] ?? false, function ($q, $store){
            $q->whereHas('storeType', function ($q) use($store){
                $q->where('id', $store);
            });
        });

    }
}
