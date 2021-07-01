<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSceeondRequest extends FormRequest
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

        echo 'one';

        return [
            'title' => 'required'
        ];
    }


    // use this method to do something after  request validated
    // mainly this  method is use when we want to do some extra checks after 
    // validations check and then we can also add validation error as well
    // like this $validator->errors()->add('field', 'Something is wrong with this field!');
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            echo 'two';
        });
    }
}
