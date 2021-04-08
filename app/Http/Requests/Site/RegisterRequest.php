<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'age' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Please enter the first name',
            'last_name.required' => 'Please enter the last name',
            'email.required' => 'Please enter the email address',
            'email.email' => 'Please enter a valid email address',
            'age.numeric' => 'Please enter a number'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
