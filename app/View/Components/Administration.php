<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Administration extends Component
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
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <!-- Meta, title, CSS, favicons, etc. -->
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="icon" href="images/favicon.ico" type="image/ico" />

                <!-- CSRF Token -->
                <meta name="csrf-token" content="{{ csrf_token() }}">

                {{ $head ?? '' }}
                <link rel="shortcut icon" href="../images/favicon.png">

                <!-- Fonts -->
                <link rel="dns-prefetch" href="//fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
                    <!-- Styles -->
                <link href="{{ mix('assets/css/portal.css') }}" rel="stylesheet">
                <livewire:styles/>
            </head>
            <body class="app">
              {{ $slot }}
               <script src="{{ mix('assets/js/dashboard.js') }}"></script>
                <livewire:scripts/>
            </body>
            </html>
            blade;
    }
}
