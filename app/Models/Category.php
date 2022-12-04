<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'store_id'];

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function resources(){
        return $this->morphMany(Resource::class, 'resourceable');
    }

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }


}
