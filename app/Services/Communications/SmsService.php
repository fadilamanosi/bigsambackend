<?php

namespace App\Services\Communications;

use App\Helpers\Str;
use App\Jobs\SmsJob;
use App\Models\Settings;
use App\Exceptions\SettingsException;

class SmsService{
    use Str;
    private $smsSettings;
    public function __construct( protected Settings $settings){

        /**
         * Check if service is available
         */
        $this->smsSettings = $this->settings->retrieveSettings('sms.notification');
        
        if(!$this->smsSettings['status']) throw new SettingsException('Sms service not available') ;
    }

    public function send($phone, $message){
        dispatch(new SmsJob($this->smsSettings['secret.key'], $phone, $message));
    }





}