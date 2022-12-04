<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'store_id', 'firstname', 'lastname', 'delivery_address',
        'delivery_info', 'region', 'mobile_phone', 'home_phone', 'is_default'];

    public function store(){
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
