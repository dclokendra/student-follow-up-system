<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table='parents';
    protected $fillable=['name','email','password','address','occupation','phone', 'created_by', 'updated_by'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
