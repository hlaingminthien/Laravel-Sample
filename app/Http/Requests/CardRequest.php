<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'card_name' => 'required|max:50',
            'num_of_postion'=> 'numeric|min:0|max:10000000000000000000',
            'num_of_refresh'=> 'numeric|min:0|max:10000000000000000000',
            'num_of_topping'=> 'numeric|min:0|max:10000000000000000000',
            'num_of_advice'=> 'numeric|min:0|max:10000000000000000000',
            'num_of_cv'=> 'numeric|min:0|max:10000000000000000000',
            'staff_advice_hour'=> 'numeric|min:0|max:10000000000000000000',
            'training_hour'=> 'numeric|min:0|max:10000000000000000000',
            'num_of_drawing_rules'=> 'numeric|min:0|max:10000000000000000000',
            'limit_time'=>'required',
            'price'=>'required|numeric|min:1|max:10000000000000000000',
        ];
    }
}
