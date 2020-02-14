<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest{

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
            'exam_type_id'=>'required',
            'title'=>'required|unique:exams',
            'full_marks'=>'required',
            'pass_marks'=>'required',
            'exam_date'=>'required',
            'exam_time'=>'required',
        ];
    }
    function messages()
    {
        return[
            'exam_type_id.required'=>'Please Select Exam Type',
            'title.required'=>$this->required_messages('title'),
            'full_marks.required'=>$this->required_messages('full marks'),
            'pass_marks.required'=>$this->required_messages('pass marks'),
            'exam_date.required'=>$this->required_messages('exam_date'),
            'exam_time.required'=>$this->required_messages('exam_time'),
            'title.unique'=>'Title is already taken',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".ucfirst($field);
    }

}
