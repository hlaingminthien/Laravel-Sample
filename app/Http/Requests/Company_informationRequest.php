<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Company_informationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name'=>'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            'job_category_id'=>'required',
            'member_name'=>'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            'state_id'=>'required',
            'country_id'=>'required',
            'no_of_employee'=>'required|numeric|min:1|max:10000000000000000000',
            'contact_name'=>'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            'contact_phone'=>'required|regex:/^(09)([0-9\s\-\+\(\)]*)$/|min:9|max:11',
            'contact_email'=>'required|email',
            'address'=>'required',
            'what_you_do'=>'required',
            'why_should_join'=>'required',
            'licensePhoto'=>'required'
        ];
    }
}
