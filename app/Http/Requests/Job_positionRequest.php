<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Job_positionRequest extends FormRequest
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
            'job_code_id'=>'required|alpha_num|max:20',
            'company_id'=>'required',
            'jobcategory_id'=>'required',
            'position_name'=>'required|regex:/^[a-zA-Z\s]+$/u|max:50', 
            'gender'=>'required',
            'exper_id'=>'required',
            'age'=>'required|numeric|min:1|max:100',
            'job_description'=>'required',
            'job_requirement'=>'required',
            'salary'=>'required|numeric|min:1|max:10000000000000000000',
            'offer_employee_count'=>'required|numeric|min:1|max:10000000000000000000',
            'state_id'=>'required',
            'job_time'=>'required|string|max:10',
            'benefits'=>'required',
            'highlights'=>'required',
            'carrier_opptunity'=>'required'
        ];
    }
}
