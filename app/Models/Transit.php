<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transit extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'from_id', 'to_id', 'amount', 'departure_time'];



    public function car(){
        return $this->belongsTo(Car::class);
    }


    public function from(){
        return $this->belongsTo(Destination::class, 'from_id');
    }


    public function to(){
        return $this->belongsTo(Destination::class, 'to_id');
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }


    public function seats(){
        return $this->hasManyThrough(Seat_pivot::class, Booking::class);
    }

}
