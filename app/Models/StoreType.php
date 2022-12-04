<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class StoreType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'description'];


    public function stores(){
        return $this->hasMany(Store::class);
    }

    public function setSlugAttribute($value)
    {
        $integer = 0;
        $slug = $value ? Str::slug($value) : Str::slug($this->name);
        while (StoreType::whereSlug($slug)->exists()) {
            $slug = $slug.$integer;
            $integer++;
        }
        $this->attributes['slug'] = $slug;
    }

    public function filter($query, $request){
        $query->when($request->search ?? false, function($query, $search){
            $query->where('name', 'LIKE', '%'. $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%'. $search . '%');
        });
    }

}
