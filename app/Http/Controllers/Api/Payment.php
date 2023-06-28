<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Payments\Paystack;
use Illuminate\Http\Request;

class Payment extends Controller
{
    public function __invoke(Paystack $paystack, Request $request){
       return $paystack->{$request->action}();
    }
}
