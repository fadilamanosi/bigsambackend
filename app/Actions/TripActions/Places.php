<?php
namespace App\Actions\TripActions;

use App\Interfaces\ActionsServiceInterface;
use App\Models\Destination;
class Places implements ActionsServiceInterface{
    public function execute(){
        return response()->apiSuccess(Destination::all());
    }
}