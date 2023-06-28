<?php
namespace App\Actions\TripActions;

use App\Models\Transit ;
use App\Http\Requests\Api\Transits as TransitRequest;
use App\Interfaces\ActionsServiceInterface;

class Transits implements ActionsServiceInterface{

    public function __construct(protected TransitRequest $request){}
    public function execute(){

        return response()->apiSuccess(Transit::where('from_id', $this->request->from_id)
        ->where('to_id', $this->request->to_id)
        ->whereDate('departure_time', $this->request->departure_time)
        ->with(['to', 'from', 'car'])
        ->get());
        
    }
}