<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'name'=>'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'email'=>'required|email',
            'phone'=>'required|regex:/^(09)([0-9\s\-\+\(\)]*)$/|min:9|max:11',
            'password'=>'required|min:6',
            'terms_&_conditions'=>'accepted'
        ];
    }
}
