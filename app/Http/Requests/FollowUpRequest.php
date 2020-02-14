<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FollowUpRequest extends FormRequest{

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
            'follow_up_date'=>'required',
            'follow_up_time'=>'required',
            'description'=>'required',
        ];
    }
    function messages()
    {
        return[
            'follow_up_date.required'=>$this->required_messages('follow_up_date'),
            'follow_up_time.required'=>$this->required_messages('follow_up_time'),
            'description.required'=>$this->required_messages('description'),
            'inquiry_id.required'=>'Select Inquiry'
        ];
    }
    private function required_messages($field){
        return "Please Enter ".ucfirst($field);
    }

}
