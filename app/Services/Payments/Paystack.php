<?php

namespace App\Services\Payments;


use App\Models\Booking;
use Illuminate\Http\Request;


class Paystack 
{
 
    protected $paystack;
    private $secret;

    private $baseUrl = 'https://api.paystack.co';


    public function __construct(protected Request $request){
        $this->paystack = new \Matscode\Paystack\Paystack('sk_test_37aa263376fd3fe161ee510d8c9a653a1265eec3');
     }
 

    public function pay(Booking $booking)
    {
        $paystack = $this->paystack;
        $callback = env('APP_URL') . "/trip/payment";
            
        return response()->apiSuccess($paystack->transaction
        ->setEmail($booking->user()->first()->email)
        ->setReference($booking->uuid)
        ->setCallbackUrl($callback)
        ->setAmount(((int) $booking->transit()->first()->amount) . '00') // amount is treated in Naira while using this setAmount() method
        ->initialize());

    }

    public function payment()
    {
        // dd("sds");

        if(!$this->request->reference){
            dd('Unkown page');
        }
      
        $verify = collect($this->paystack
        ->transaction
        ->verify($this->request->reference));

        
        if ( $verify['data']->status == "success") {
            return view('payment', 
            [
                'status' => $verify['data']->status
            ] );
        }

    }

    public function webhook()
    {

        try{

            // only a post with paystack signature header gets our attention
            if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER)) {
                exit();
            }

            // Retrieve the request's body
            $input = @file_get_contents("php://input");
            define('PAYSTACK_SECRET_KEY', $this->secret);

            // validate event do all at once to avoid timing attack
            if ($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, PAYSTACK_SECRET_KEY)) {
                exit();
            }

            // Check for reference
            $hook = json_decode($input);
            if(!isset($hook->data->reference)){
                exit();
            }

          
            switch ($hook->event) {

                case 'transfer.success':

                    break;

                case 'transfer.failed':
                    
                    break;

                case 'transfer.reversed':
                    
                    # code...
                    break;

                case 'charge.success':


                    # code...
                    break;
    
                default:
                    # code...
                    break;
            }
            http_response_code(200);

            // parse event ( which is json string ) as object
            // Do something - that will not take long - with $event
            $event = json_decode($input);

            exit();
        }catch(\Exception$e){
            error_log($e->getMessage());
        }

    }
}