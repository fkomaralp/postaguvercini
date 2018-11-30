<?php

namespace Fkomaralp\Postaguvercini;

use Fkomaralp\Postaguvercini\Rest\Client;

class Postaguvercini extends Client
{
    /**
     * @var string Base uri
     */
    protected $baseUri = "https://processor.smsorigin.com/xml/process.aspx";

    /**
     *   Create client
     */
    public function __construct($useSsl = true)
    {
        parent::__construct();

        if(!$useSsl){
            $this->baseUri = "http://processor.smsorigin.com/xml/process.aspx";
        }
    }

    public function __get($name)
    {
        return "__get";
    }

    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return call_user_func_array(array($this, $name), $arguments);
        }

        return \Exception("method bulunamadı");
    }
}