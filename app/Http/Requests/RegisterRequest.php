<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => Config::get('validation.name'),
            'email' => Config::get('validation.email'),
            'password' => Config::get('validation.password'),
            'phone' => Config::get('validation.phone'),

            // Kötelező szállítási adatok
            'zip' => Config::get('validation.zip'),
            'city' => Config::get('validation.city'),
            'street' => Config::get('validation.street'),
            'houseNumber' => Config::get('validation.houseNumber'),

            // Nem kötelező
            'floor_door' => Config::get('validation.floor_door'),
            'doorbell' => Config::get('validation.doorbell'),
            'elseData' => Config::get('validation.elseData'),

            'accepted_terms' => Config::get('validation.accepted_terms'),
        ];
    }
}
