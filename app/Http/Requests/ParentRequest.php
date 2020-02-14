<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentRequest extends FormRequest{

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
            'name'=>'required|string',
            'email'=>'required|unique:parents',
            'address'=>'required',
            'occupation'=>'required',
            'phone'=>'required|unique:parents|max:10',
        ];
    }
    function messages()
    {
        return[
            'name.required'=>$this->required_messages('name'),
            'email.required'=>$this->required_messages('email'),
            'address.required'=>$this->required_messages('address'),
            'phone.required'=>$this->required_messages('phone'),
            'occupation.required'=>$this->required_messages('occupation'),
            'email.unique'=>'Email is already taken',
            'phone.unique'=>'Phone is already taken',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".$field;
    }

}
