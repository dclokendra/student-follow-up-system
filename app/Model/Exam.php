<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table='exams';
    protected $fillable=['exam_type_id','title','full_marks','pass_marks','exam_date', 'exam_time','status','created_by', 'updated_by'];

    public function examType()
    {
        return $this->belongsTo(ExamType::class);
    }
    public function inquiry()
    {
        return $this->hasOne(Inquiry::class);
    }
}
