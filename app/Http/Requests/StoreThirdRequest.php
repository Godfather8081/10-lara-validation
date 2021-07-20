<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreThirdRequest extends FormRequest
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
            'id' => ['required', 'numeric'],
            'name' => ['required', 'max:10']
        ];
    }

    // by overriding the all method like this you can add extra data in form request
    // and that data will be mostly a route params and then we can also validate route params
    public function all($keys = null)
    {
        $data = Parent::all($keys);
        $data['id'] = $this->route('id');
        $data['name'] = $this->route('name');
        return $data;
    }
}
