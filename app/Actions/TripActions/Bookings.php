<?php
namespace App\Actions\TripActions;

use App\Models\Destination;
use App\Models\Transit;
use Illuminate\Http\Request;
use App\Interfaces\ActionsServiceInterface;

class Bookings implements ActionsServiceInterface{
    public function __construct(protected Request $request){}

    public function execute(){

        $this->request->validate([
            'trans_id' => 'required'
        ]);
        
        return response()->apiSuccess(
            Transit::where('id', $this->request->trans_id)->first()->bookings()->with(['seats'])->get()
        );
    }
}