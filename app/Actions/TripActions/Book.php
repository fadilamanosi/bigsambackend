<?php
namespace App\Actions\TripActions;

use App\Models\User;
use App\Enums\UserEnum;
use App\Models\Transit;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Services\Payments\Paystack;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\BookRequest;
use Illuminate\Database\Query\Builder;
use App\Interfaces\ActionsServiceInterface;

class Book implements ActionsServiceInterface{

    public function __construct(protected BookRequest $request, protected Paystack $paystack){}

    public function execute(){

        DB::beginTransaction();

        try{
        // Validate Transit
        $this->request->validateTransit();

        // Get all data
        $data = $this->request->all();
        $data['account'] = UserEnum::Passenger->value;

        $user = User::where('email', $this->request->email)->first();

        if(!$user){
        // Create user
        $user = User::create($data);
        }else{
        // Update info if changed
        $user->update($data);
        }

        $booking = $user->bookings()->create([
        'transit_id' => $this->request->transit_id,
        'ticket'     => uniqid('bigsam_', true),
        'uuid'       => Str::uuid(),
        ]);

        $seats = collect($this->request->seats)->map(function($v)  {
            $seats = ["seat" => $v];
            return $seats;
        });

        $booking->seats()->createMany($seats->toArray());

        $response = $this->paystack->pay($booking);
        DB::commit();

        return $response;
        }catch(\Exception $e){
            DB::rollBack();
            return response()->apiError($e->getMessage());
        }
        
    }


}