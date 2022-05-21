<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'server'];

    public function domains(){
        return $this->hasMany(Domain::class)->orderBy('id', 'asc');
    }
}
