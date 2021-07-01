<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFirstRequest extends FormRequest
{


    // use this for stop when first validation fails and at that time you don't want to 
    // validate further 
    // protected $stopOnFirstFailure = true;


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

        // if you pass nullable as "" or null in request laravel automatically convert it to null
        // if you don't include any particular request data in this return statement then 
        // laravel wont provide it in $req->validated() (see controller) it just ignore
        // that data from request and won't return in  $req->validated() method however
        // that extra data will be available in actual $request   
        return [

            'title' => 'required|max:50|min:10',
            'body' => 'required',
            'like' => 'nullable|numeric',

            // author is {}, for apply validation to all object
            // 'author' => 'required'

            // for particular field in obj
            // 'author.name' => 'required|max:10',

            // for object inside [] 
            // 'author.0.name' => 'required|max:10'

            // use when we have [] and inside we have {} with same keys in each
            // this validation will apply to every name key in {} of  author [] 
            'author.*.name' => 'required|max:10',

            // can also do this
            // 'title' => ['required', 'max:50', 'min:10'],
            // 'body' => ['required'],
            // 'like' => ['nullable', 'numeric']


            // we can define custom validations like this just execute $fail call back if 
            // validation fails or do nothing
            // we can also define rules globally for that refer https://laravel.com/docs/8.x/validation#form-request-validation
            'custom_field' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (strtoupper($value) != $value) {
                        $fail("The $attribute must be in Uppercase.");
                    }
                }

            ]
        ];
    }


    // we can override the default message for perticular field with messages
    // just use keyname.validator and change message   
    // we can use :attribute to put field name in string
    // if we don't set attribute in attribute function it will use default 
    // and if we use attribute it will use our custom attribute 
    // :attribute for attribute name
    // :input for value of attribute
    // :other can be use in validators where we use other attribute to compar with this 
    // :min :max in min max validators to get values
    // :values for in operator to get values
    public function messages()
    {
        return [
            'title.required' => 'changed required :attribute message',
            'title.min' => 'changed min :attribute message',

            // use for first author case
            // 'author.required' => 'auther custom'

            // use this for seccond author case
            // 'author.name.required' => 'author custom'

            // use this for third author case
            // 'author.0.name.required' => 'author custom'

            // use this for forth author case
            'author.*.name.required' => ':attribute custom'
        ];
    }



    // we can change attributes names in err message likes this
    public function attributes()
    {

        return [

            'title' => 'title changed',
            'author.*.name' => 'author changed'

        ];
    }
}
