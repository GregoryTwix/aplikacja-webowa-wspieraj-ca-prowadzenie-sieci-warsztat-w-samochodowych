<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UserManage extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'role_id' => 'required|numeric',
            'workshop' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Pole Nazwa jest wymagane',
            'role_id.required' => 'Pole Rola jest wymagane',
            'workshop.required' => 'Pole Warsztat jest wymagane'
        ];
    }
}
