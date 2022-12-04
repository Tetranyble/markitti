<?php

namespace App\View\Components;

use App\Services\Stores;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $store = Stores::stores();
        return view("components.{$store->storeType->slug}.footer");
    }
}
