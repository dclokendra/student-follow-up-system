<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
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
            'name'=>'required|string|unique:classes',
            'numeric_name'=>'required|unique:classes|min:1',
        ];
    }
    function messages()
    {
        return[
            'name.required'=>$this->required_messages('name'),
            'numeric_name.required'=>$this->required_messages('numeric_name'),
            'name.unique'=>'Name is already taken',
            'name.string'=>'Name must be string',
            'numeric_name.unique'=>'Numeric Name is already taken',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".$field;
    }
}
