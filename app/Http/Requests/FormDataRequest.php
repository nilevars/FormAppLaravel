<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'regex:/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',
                'max:255',
                'unique:users,email'
            ],
            'phone' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>  __('The Name required'),
            'email.required' => __('The Email address is required'),
            'email.unique' => __('The Email address is already registered'),
            'email.regex' => __('The Email address format is invalid'),
            'password.required' => __('The Password is required'),
            'password.min' => __('The Password should be minimum 8 characters'),
            'phone.required' => __('The Mobile number is required'),
        ];
    }
}
