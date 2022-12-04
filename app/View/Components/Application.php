<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Application extends Component
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
        return <<<'blade'
<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
</div>
blade;
    }
}
