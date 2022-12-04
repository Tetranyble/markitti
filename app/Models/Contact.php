<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['store_id', 'name', 'phone', 'email', 'time', 'service_id', 'contact_type_id', 'message'];

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function contactType(){
        return $this->belongsTo(ContactType::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
