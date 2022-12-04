<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['imageable_id', 'imageable_type', 'store_id', 'image', 'description'];

    /**
     * Get the parent commentable model (post or video).
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }
}
