<?php

class Request
{
    private static $_URL = 'http://api.smscentral.vn/1.0/campaigns';
    private $request;

    public function __construct($email, $password, $token)
    {
        $this->request = curl_init();
        curl_setopt($this->request, CURLOPT_HTTPHEADER, array(
            'header' => "Authorization: Basic " . base64_encode($email . ':' . $password) . "\r\n" .
                "Content-Type: application/json\r\n" .
                "X-API-TOKEN: $token\r\n"
        ));
        curl_setopt($this->request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->request, CURLOPT_URL, Request::$_URL);
    }

    public function path($p) {
        curl_setopt($this->request, CURLOPT_URL, Request::$_URL.'/'.$p);
        return $this;
    }

    /**
     * Apply post method
     * @return $this
     */
    public function post() {
        curl_setopt($this->request, CURLOPT_POST, true);
        return $this;
    }

    public function execute() {
        $result = json_decode(curl_exec($this->request));
        curl_close($this->request);
        return $result;
    }
}