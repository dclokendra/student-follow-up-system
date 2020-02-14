<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $table='exam_types';
    protected $fillable=['name','status','created_by', 'updated_by'];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
