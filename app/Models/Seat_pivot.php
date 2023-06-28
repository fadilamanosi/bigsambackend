<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat_pivot extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'seat'];

    public function bookings(){
        return $this->belongsTo(Booking::class);
    }
}
