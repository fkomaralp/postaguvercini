<?php
namespace Fkomaralp\Turatel\Rest;

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
            "PlatformID" => config("turatel.platform_id"),
            "ChannelCode" => config("turatel.channel_code"),
            "UserName" => config("turatel.username"),
            "PassWord" => config("turatel.password"),
            "Originator" => config("turatel.originator"),
//            "Contact" => 1,
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
        $this->xml["Command"] = 0;
        $this->xml["Mesgbody"] = $message;
        $this->xml["Type"] = 2;
        $this->xml["Numbers"] = implode(";", $numbers);

        return $this->request("MainmsgBody", $this->xml);
    }

    /**
     * @param $root
     * @param $data
     * @return \anlutro\cURL\Response
     */
    public function request($root, $data){
        $xml = ArrayToXml::convert($data, $root,true, 'UTF-8');

        $curl = new cURL();
        $request = $curl->newRawRequest("post", config("turatel.base_uri"), $xml)
            ->setHeader("Content-Type", "text/xml")
            ->setHeader("HTTP_PRETTY_PRINT", "TRUE");

        $response = $request->send();

        return $response->body;
    }
}