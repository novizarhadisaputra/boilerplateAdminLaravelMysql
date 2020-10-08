<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
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
            'name' => 'required',
            'roles' => 'required',
            'npk' => 'required',
            'department_id' => 'required',
            'section_id' => 'required',
            'username' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Field name is required',
            'roles.required' => 'Field roles is required',
            'npk.required' => 'Field NPK is required',
            'phone.required' => 'Field phone is required',
            'department_id.required' => 'Field department is required',
            'section_id.required' => 'Field section is required',
            'username.required' => 'Field username is required',
        ];
    }
}
