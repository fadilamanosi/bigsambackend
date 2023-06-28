<?php

use App\Http\Controllers\Api\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::domain('api.'. env('DOMAIN'))->group(function(){

    Route::post('/trip/{action}', Trip::class)
    ->where('action', 'book');

    Route::get('/trip/{action}', Trip::class)
    ->where('action', 'places|destinations|transits|bookings|seats');

    // Route::get('/trip/{action}', Trip::class)
    // ->where('action', 'places|destinations|transits');
});
