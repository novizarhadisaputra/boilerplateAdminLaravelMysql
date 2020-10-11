<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
            'name' => 'required|unique:users',
            'roles' => 'required',
            'npk' => 'required|unique:users',
            'department_id' => 'required',
            'section_id' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required|unique:users',
            'email' => 'email|required|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Field name is required',
            'name.unique' => 'Field name must be unique',
            'role.required' => 'Field role is required',
            'npk.required' => 'Field NPK is required',
            'npk.unique' => 'Field NPK must be unique',
            'phone.required' => 'Field phone is required',
            'phone.unique' => 'Field phone must be unique',
            'department_id.required' => 'Field department is required',
            'section_id.required' => 'Field section is required',
            'username.required' => 'Field username is required',
            'username.unique' => 'Field username must be unique',
            'password.required' => 'Field password is required',

        ];
    }
}
