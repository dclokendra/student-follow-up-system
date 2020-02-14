<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='students';
    protected $fillable=['student_code','inquiry_id','name','permanent_address','temporary_address','dob_bs','gender','photo',
        'register_date','parent_name','parent_id','created_by', 'updated_by'];

    public function parent()
    {
        return $this->belongsTo(Parents::class);
    }
    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

}
