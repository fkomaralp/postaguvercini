<?php

namespace Fkomaralp\Postaguvercini;

use Fkomaralp\Postaguvercini\Rest\Client;

class Postaguvercini extends Client
{
    /**
     * @var string Base uri
     */
    protected $baseUri = "http://www.postaguvercini.com/api_xml/ISTEKTURU.ASP";

    /**
     * Postaguvercini constructor.
     * @param bool $useSsl
     */
    public function __construct($useSsl = true)
    {
        parent::__construct();

//        if(!$useSsl){
//            $this->baseUri = "http://processor.smsorigin.com/xml/process.aspx";
//        }
    }

    public function __get($name)
    {
        return "__get";
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return call_user_func_array(array($this, $name), $arguments);
        }

        return \Exception("method bulunamadı");
    }
}