<?php

namespace App\Services\Communications;

use App\Models\Settings;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\SettingsException;

class MailService{
    
    public function send($email, $class){
        Mail::to( $email )->queue( $class );
    }


}