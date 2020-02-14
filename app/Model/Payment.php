<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';
    protected $fillable=['student_id','type','total_amount','paid_amount','paid_date','status','created_by', 'updated_by'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
