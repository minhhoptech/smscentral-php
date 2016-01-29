<?php

class Campaign {
    public $name;
    public $id;
    public $schedule_date;
    public $total_sms;
    public $failed_sms;
    public $success_sms;
    public $processing_sms;

    public function __construct(Array $properties=array()){
        foreach($properties as $key => $value){
            $this->{$key} = $value;
        }
    }
}