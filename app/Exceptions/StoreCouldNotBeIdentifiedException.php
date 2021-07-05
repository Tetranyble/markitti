<?php

namespace App\Exceptions;

use Exception;

class StoreCouldNotBeIdentifiedException extends Exception
{
    public function __construct(string $hostname)
    {
        parent::__construct("Hostname $hostname does not include a subdomain.");
    }
}
