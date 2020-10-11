<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkOrderUpdate extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'pic_name' => 'required',
            'status_id' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Field title is required',
            'description.required' => 'Field description is required',
            'location.required' => 'Field location is required',
            'pic_name.required' => 'Field PIC Name is required',
            'status_id.required' => 'Field status is required',
            'category_id.required' => 'Field category is required'
        ];
    }
}
