<?php

namespace App\Enums;

enum UserEnum : int{
    case Passenger  = 1;
    case Driver = 2;
    case Admin = 3;

    public static function byValue($value){
        return collect(UserEnum::cases())->firstWhere('value', $value);
    }
}