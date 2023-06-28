<?php
namespace App\Actions\TripActions;

use App\Http\Requests\Api\DestinationRequest;
use App\Interfaces\ActionsServiceInterface;
use App\Models\Transit;
class Destinations implements ActionsServiceInterface{

    public function __construct(protected DestinationRequest $request){}
    public function execute(){

        $response = Transit::where('from_id', $this->request->destination_id)
        ->with(['to',])
        ->selectRaw('to_id, to_id as destinations')
        ->get();

        return response()->apiSuccess($response);
    }
}