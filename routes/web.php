<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\Payment;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Destination;
use App\Http\Livewire\Transit;
use App\Http\Livewire\Vehicle;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');require __DIR__.'/auth.php';
// });


Route::domain('cp.'. env('DOMAIN'))->group(function () {

    Route::get('/', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::get('/vehicles', Vehicle::class)
    ->middleware(['auth', 'verified'])
    ->name('vehicle');


    Route::get('/destinations', Destination::class)
    ->middleware(['auth', 'verified'])
    ->name('destinations');

    Route::get('/transits', Transit::class)
    ->middleware(['auth', 'verified'])
    ->name('transit');

    require __DIR__.'/auth.php';
});


Route::get('/trip/{action}',  Payment::class)
->where('action', 'payment');



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


