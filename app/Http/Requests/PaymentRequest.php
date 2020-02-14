<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest{

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
            'student_id'=>'required',
            'type'=>'required',
            'total_amount'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'paid_amount'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'paid_date'=>'required',
        ];
    }
    function messages()
    {
        return[
            'student_id.required'=>'Please Select Student',
            'type.required'=>$this->required_messages('type'),
            'total_amount.required'=>$this->required_messages('total amount'),
            'paid_amount.required'=>$this->required_messages('pais amount'),
            'paid_date.required'=>$this->required_messages('paid date'),

        ];
    }
    private function required_messages($field){
        return "Please Enter ".ucfirst($field);
    }

}
