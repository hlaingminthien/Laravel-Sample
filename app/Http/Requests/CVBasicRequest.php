<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CVBasicRequest extends FormRequest
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
            'job_position'=>'required|regex:/^[a-zA-Z\s]+$/u|max:20',
            'jobcate_id'=>'required',
            'experlevel_id'=>'required',
            'state_id'=>'required',
            'expected_salary'=>'required',
            'education'=>'required',         
            'bond_with_prev_company'=>'required',
            'limit_jobs_with_prev_company'=>'required',
            'employment_status' => 'required',
            'employment_type' => 'required'
        ];
    }
}
