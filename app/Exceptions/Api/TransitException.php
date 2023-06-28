<?php

namespace App\Exceptions\Api;

use Exception;
use Illuminate\Support\Facades\Log;

class TransitException extends Exception
{
    public function report(): void
    {
        if($this->getCode() === 1){
            Log::error($this->message);
            // Log::setEventDispatcher()
        }
    }

    public function render(){
        return response()->apiError(env('APP_DEBUG') ? $this->getMessage() :'Service not available, try again later');
    }
}
