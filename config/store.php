<?php

use Illuminate\Support\Facades\App;

if(config('app.env') === 'production'){
    $domain = ['www.markitti.com', 'markitti.com'];
}else{
    $domain = ['127.0.0.1', 'localhost', 'localhost'];
    }
return [

    /**
     * The list of domains hosting your central app.
     *
     * Only relevant if you're using the domain or subdomain identification middleware.
     */
    'central_domains' => $domain


];
