<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table='inquiries';
    protected $fillable=['name','permanent_address','temporary_address','student_name','phone','email','batch_id','class_id','exam_id','result_id','selection_status','created_by', 'updated_by'];

    public function exam()
    {
        return $this->hasOne(Exam::class);
    }
    public function result()
    {
        return $this->hasOne(Result::class);
    }
    public function student()
    {
        return $this->hasOne(Student::class);
    }
    public function followup()
    {
        return $this->hasOne(FollowUp::class);
    }
    public function inquiryClass()
    {
        return $this->belongsTo(Classes::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

}
