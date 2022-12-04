<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLetterSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['store_id', 'email', 'unsubscribe'];


    public function store(){
        return $this->belongsTo(Store::class);
    }
}
