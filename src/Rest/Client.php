<?php
namespace Fkomaralp\Postaguvercini\Rest;

use anlutro\cURL\cURL;
use Spatie\ArrayToXml\ArrayToXml;

class Client
{

    /**
     * @var string Xml setup
     */
    protected $xml;

    public function __construct()
    {
        $data = [
            "CLIENT" => [
                '_attributes' => [
                    "user" => config("postaguvercini.username"),
                    "pwd" => config("postaguvercini.password")
                ]
            ]
        ];

        $this->xml = $data;
    }

    /**
     * @param string $message
     * @param array $numbers
     * @return \anlutro\cURL\Response
     */
    public function sendSms($message = "", $numbers = [] )
    {
        $this->xml["INSERTMSG"] = [
                "_attributes" => [
                    "text"=>$message,
                    "dt" => date("Y/m/d H:s")
                ],
            "TO" => $numbers
        ];
        return $this->request("SMS-InsRequest", $this->xml);
    }

    /**
     * @param $root
     * @param $data
     * @return \anlutro\cURL\Response
     */
    public function request($root, $data){
        $xml = ArrayToXml::convert($data, $root,true, 'UTF-8');
        dd($xml);
        $curl = new cURL();
        $request = $curl->newRawRequest("post", config("turatel.base_uri"), $xml)
            ->setHeader("Content-Type", "text/xml")
            ->setHeader("HTTP_PRETTY_PRINT", "TRUE");

        $response = $request->send();

        return $response->body;
    }
}