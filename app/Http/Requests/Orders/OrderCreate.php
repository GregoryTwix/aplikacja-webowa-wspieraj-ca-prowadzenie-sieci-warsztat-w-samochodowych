<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreate extends FormRequest
{
    public function rules()
    {
        return [
            'date' => 'required|date',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Pole Data jest wymagane',
            'description.required' => 'Pole Opis jest wymagane'
        ];
    }
}
