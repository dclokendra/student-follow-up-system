<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table='results';
    protected $fillable=['exam_id','inquiry_id','student_id','obtained_marks','description','status','created_by', 'updated_by'];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
