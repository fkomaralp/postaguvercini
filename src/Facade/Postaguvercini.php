<?php

namespace Fkomaralp\Postaguvercini\Facade;

use Fkomaralp\Postaguvercini\Rest\Client;
use Illuminate\Support\Facades\Facade;

class Postaguvercini extends Facade
{
    /**
     *  Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Client::class;
    }
}