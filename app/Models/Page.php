<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['store_id', 'is_published', 'name', 'detail', 'short_description', 'view_count'];

    public function store(){
        return $this->belongsTo(Store::class);
    }

    /**
     * Get all of the page's images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Get all of the page's images.
     */
    public function categories()
    {
        return $this->morphMany(Category::class, 'categoryable');
    }

    public function features(){
        return $this->hasMany(PageFeature::class, 'page_id', 'id');
    }

    public function type(){
        return $this->belongsTo(PageType::class, 'page_type_id', 'id');
    }

    public function scopeType($q, $type){
        $q->whereHas('type', function ($query) use($type){
            $query->where('slug', $type);
        });
    }
}
