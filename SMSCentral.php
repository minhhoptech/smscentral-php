<?php
include('Campaign.php');
include('Request.php');

class SMSCentral
{
    public $email;
    public $password;
    public $token;

    function __construct($email, $password, $token)
    {
        $this->email = $email;
        $this->password = $password;
        $this->token = $token;
    }

    public function compaigns()
    {
        $result = $this->request()->execute();
        foreach ($result as $value) {
            $campaigns[] = new Campaign((array)$value);
        }
        return $campaigns;
    }

    public function campaign($id)
    {
        $result = $this->request()->path($id)->execute();
        $campaign = new Campaign((array)$result);
        return $campaign;
    }

    private function request() {
        return new Request($this->email, $this->password, $this->token);
    }
}