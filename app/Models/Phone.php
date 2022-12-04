<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = ['phoneable_id', 'phoneable_type', 'description', 'icon', 'store_id'];


    public function phoneable(){
        return $this->morphTo();
    }
}
