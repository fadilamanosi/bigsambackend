<?php

namespace App\Http\Requests\Api;

use App\Exceptions\Api\TransitException;
use App\Models\Transit;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string',
            'phone'       => 'required',
            'email'       => 'required|email',
            'gender'      => [Rule::in(['male', 'female'])],
            'next_of_kin' => 'required',
            'next_of_kin_phone' => 'required',
            'transit_id' => 'required|exists:transits,id',
            'seats'      => 'required|array',
        ];
    }

    public function validateTransit(){
        $transit = Transit::find($this->transit_id)->car()->first();

        if(!$transit){
           throw new TransitException('transit is unavailable');
        }

        foreach($this->seats as $seat){
            if($transit->seats < $seat ){
                throw new TransitException('invalid seat selected');
            }
        }

        $transit = Transit::whereHas('bookings.seats', function( $query){
            $query->whereIn('seat', $this->seats);
        })
        ->exists();

        if($transit){
           throw new TransitException('Kindly reselect an empty seat');
        }
    }
}
