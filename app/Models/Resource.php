<?php

namespace App\Models;

use App\Traits\BelongsToStore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'filename', 'extension', 'size', 'is_banner','store_id'];

    public function resourceable(){

        return $this->morphTo();
    }

}
