<?php


namespace App\Traits;


use App\Models\Store;
use App\Scopes\StoreScope;
use App\Services\Stores;

trait BelongsToStore
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function bootBelongsToStore()
    {
        static::addGlobalScope(new StoreScope);
        static::creating(function ($model){
            if (session()->has('store_id')){
                $model->store_id = session()->get('store_id') ;
            }
        });
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

}
