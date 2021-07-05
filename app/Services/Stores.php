<?php

namespace App\Services;


use App\Models\Store;

class Stores {
    protected $store;
    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function id(){
        return $this->store->id;
    }

    public function store(){
        return $this->store;
    }
    public static function storeId(){
        return app(Stores::class)->id();
    }
    public static function stores(){
        return app(Stores::class)->store();
    }
}
