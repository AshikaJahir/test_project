<?php

namespace TestProject\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckValidation extends FormRequest
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
            'first_name' => 'bail|required|max:1',
        ];
    }
    
    //For custom Error messages (Optional)
    public function messages()
    {
        return [
            'first_name.required' => 'A Firstname is required',
            'first_name.max' => 'Firstname cannot be more than 1 character',

        ];
    }
}
