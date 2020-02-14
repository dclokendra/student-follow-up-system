<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest{

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
            'inquiry_id'=>'required',
            'dob_bs'=>'required | before:5 years ago',
            'student_photo'=>'required | mimes:jpeg,jpg,png,bmp,gif,svg',
            'phone'=>'required|unique:parents|max:10',
        ];
    }
    function messages()
    {
        return[
            'phone.required'=>$this->required_messages('phone'),
            'dob_bs.required'=>$this->required_messages('dob_bs'),
            'inquiry_id.required'=>'Select Inquiry',
            'student_photo.required'=>'Select Photo',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".ucfirst($field);
    }

}
