<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserInfoUpdateRequest extends Request
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
            'name'=>'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            'email'=>'required|email',
            'phone'=>'required|regex:/^(09)([0-9\s\-\+\(\)]*)$/|min:9|max:11',
            'nrc'=>'required|regex:/^[0-9]{1,2}[/][a-zA-Z]+[(]+[N]+[)]+[0-9]+$/',
            'gender'=>'required',
            'race'=>'required|regex:/^[a-zA-Z\s]+$/u|max:10',
            'religious'=>'required|regex:/^[a-zA-Z\s]+$/u|max:20',
            'native_town'=>'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            'date_of_birth'=>'required',
            'weight'=>'required|numeric',
            'feet'=>'required|numeric|max:9',
            'inches'=>'required|numeric|min:1|max:11',
            'marital_status'=>'required',
            'health'=>'required|regex:/^[a-zA-Z\s]+$/u|max:10',
            'address'=>'required',
            'emergency_contact_name'=>'required',
            'emergency_phone'=>'required|regex:/^(09)([0-9\s\-\+\(\)]*)$/|min:9|max:11',
            'relation_with_econtact'=>'required',            
        ];
    }
}
