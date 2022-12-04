<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['store_id', 'title', 'body', 'slug'];

    public function store(){
        return $this->belongsTo(Store::class);
    }
}
