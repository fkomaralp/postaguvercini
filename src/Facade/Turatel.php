<?php

namespace Fkomaralp\Turatel\Facade;

use Fkomaralp\Turatel\Rest\Client;
use Illuminate\Support\Facades\Facade;

class Turatel extends Facade
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