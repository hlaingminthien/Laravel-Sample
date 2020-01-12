<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Training_CerticateRequest extends Request
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
            'name'=>'required|regex:/^[a-zA-Z\s]+$/u',
            'university'=>'required',
            'time_limit'=>'required',
            'star_date'=>'required',
            'end_date'=>'required',           
        ];
    }
}
