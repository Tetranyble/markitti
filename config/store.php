<?php

if(app()->environment('production')){
    $domain = ['www.markitti.com', 'markitti.com'];
}else{
    $domain = ['127.0.0.1', 'localhost', 'localhost:8000'];
    }
return [

    /**
     * The list of domains hosting your central app.
     *
     * Only relevant if you're using the domain or subdomain identification middleware.
     */
    'central_domains' => $domain


];
