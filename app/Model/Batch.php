<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table='batchs';
    protected $fillable=['name','status', 'created_by', 'updated_by'];

    public function inquiry()
    {
        return $this->hasMany(Inquiry::class);
    }
    public function classes()
    {
        return $this->belongsToMany(Classes::class,'batch_classes','batch_id','class_id')
            ->withPivot('title')
            ->withTimestamps();
    }
}
