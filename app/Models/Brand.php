<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Spatie\Ignition\ErrorPage\throwableString;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
