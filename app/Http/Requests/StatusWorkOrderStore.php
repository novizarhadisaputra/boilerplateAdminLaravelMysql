<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatusWorkOrderStore extends FormRequest
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
            'name' => 'required|unique:status_work_orders',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Field name is required',
            'name.unique' => 'Field name must be unique',
        ];
    }
}
