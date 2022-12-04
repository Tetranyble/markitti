<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [ 'store_id', 'slug', 'comment', 'star', 'product_id', 'user_id'];


   public function user(){

       return $this->belongsTo(User::class, 'user_id', 'id');
   }

   public function reviewable(){
       return $this->morphTo();
   }

    public function store(){
       return $this->belongsTo(Store::class, 'store_id', 'id');
    }


}
