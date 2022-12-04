<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrequentQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['store_id', 'title', 'active', 'body', 'slug'];

    public function store(){
        return $this->belongsTo(Store::class);
    }
}
