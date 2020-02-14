<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest{

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
            'permanent_address'=>'required',
            'temporary_address'=>'required',
            'student_name'=>'required',
            'email'=>'required|email|unique:inquiries',
            'phone'=>'required|unique:inquiries|required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'batch_id'=>'required',
            'class_id'=>'required',
        ];
    }
    function messages()
    {
        return[
            'name.required'=>$this->required_messages('name'),
            'email.required'=>$this->required_messages('email'),
            'permanent_address.required'=>$this->required_messages('permanent address'),
            'temporary_address.required'=>$this->required_messages('temporary address'),
            'parent_name.required'=>$this->required_messages('parent name'),
            'phone.required'=>$this->required_messages('phone'),
            'batch_id.required'=>'Select Batch',
            'class_id.required'=>'Select Class',
            'phone.unique'=>'Phone is already taken',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".ucfirst($field);
    }

}
