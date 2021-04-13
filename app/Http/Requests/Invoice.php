<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class Invoice extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'comment' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Pole Nazwa jest wymagane',
            'comment.required' => 'Pole Komentarz jest wymagane'
        ];
    }
}
