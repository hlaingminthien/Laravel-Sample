<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StaffCreateRequest extends Request
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
            'name'=>'required|max:255',
            'email'=>'required|email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:11',
            'nrc'=>'required',
            'gender'=>'required',
            'race'=>'required|string|max:10',
            'religious'=>'required|string|max:20',
            'native_town'=>'required|string|max:50',
            'date_of_birth'=>'required',
            'weight'=>'required',
            'height'=>'required',
            'marital_status'=>'required',
            'health'=>'required|string|max:10',
            'address'=>'required',
            'emergency_contact_name'=>'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'emergency_phone'=>'required|regex:/^(09)([0-9\s\-\+\(\)]*)$/|min:9|max:11',
            'relation_with_econtact'=>'required',    
            'password'=>'required|min:6',        
        ];
    }
}
