<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageFeature extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'name', 'description', 'icon'];

    public function page(){
        return $this->belongsTo(Page::class);
    }

    /**
     * Get all of the feature's images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
