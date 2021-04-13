<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class Deliver extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'nip' => 'required|numeric',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Pole Nazwa jest wymagane',
            'nip.required' => 'Pole NIP jest wymagane',
            'address.required' => 'Pole Adres jest wymagane',
        ];
    }
}
