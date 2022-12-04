<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialHandle extends Model
{
    use HasFactory;

    protected $fillable = ['store_id', 'social_handle_type_id', 'handle'];

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function socialHandleType(){
        return $this->belongsTo(SocialHandleType::class);
    }
}
