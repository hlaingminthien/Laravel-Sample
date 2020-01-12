<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WorkExperienceRequest extends Request
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
            'job_postion'=>'required|regex:/^[a-zA-Z\s]+$/u',
            'star_date'=>'required',
            'end_date'=>'required',
            'left_reason'=>'required',
            'proof'=>'required',
        ];
    }
}
