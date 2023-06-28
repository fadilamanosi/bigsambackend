<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BookTicket extends FormRequest
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
            'email'   => 'email',
            'phone'   => '',
            'gender'  => ['required', Rule::in(['male', 'female'])],
            'next_of_kin'       => 'required',
            'next_of_kin_phone' => 'required'
        ];
    }
}
