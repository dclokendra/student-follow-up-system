<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest{

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
            'exam_id'=>'required',
            'inquiry_id'=>'required',
            'obtained_marks'=>'required',
            'description'=>'required',
        ];
    }
    function messages()
    {
        return[
            'obtained_marks.required'=>$this->required_messages('obtained marks'),
            'description.required'=>$this->required_messages('description'),
            'exam_id.required'=>'Please Select Exam',
            'inquiry_id.required'=>'Please Select Inquiry Name',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".ucfirst($field);
    }

}
