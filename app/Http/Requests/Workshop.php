<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class Workshop extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Pole Nazwa jest wymagane',
            'address.required' => 'Pole Opis jest wymagane',
        ];
    }
}
