<?php
namespace App\Actions\TripActions;

use App\Http\Requests\Api\DestinationRequest;
use App\Interfaces\ActionsServiceInterface;
use App\Models\Transit;
class Bus implements ActionsServiceInterface{

    public function __construct(protected DestinationRequest $request){}
    public function execute(){

        return response()->apiSuccess(Transit::where('from_id', $this->request->destination_id)
        ->with(['to',])
        ->selectRaw('to_id, to_id as destinations')
        ->get());
    }
}