<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','size', 'supplier_sku', 'quantity', 'price', 'total'];

    public function products(){
        return $this->hasMany(Product::class);
    }

}
