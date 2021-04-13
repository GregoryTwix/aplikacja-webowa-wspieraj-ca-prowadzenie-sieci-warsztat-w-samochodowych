<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class WarehouseItem extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'quantity' => 'required|numeric',
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Pole Nazwa jest wymagane',
            'quantity.required' => 'Pole Ilość jest wymagane',
            'type.required' => 'Pole Typ jest wymagane'
        ];
    }
}
