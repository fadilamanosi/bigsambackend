<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'transit_id', 'ticket', 'uuid', 'status'];

    public function seats(){
        return $this->hasMany(Seat_pivot::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transit(){
        return $this->belongsTo(Transit::class);
    }
}
