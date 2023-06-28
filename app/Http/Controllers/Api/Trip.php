<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ActionsServiceInterface;
use Illuminate\Http\Request;

class Trip extends Controller
{
    public function __invoke(ActionsServiceInterface $action){
            return $action->execute();
    }
}
