<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table='classes';
    protected $fillable=['name','numeric_name','status','created_by', 'updated_by'];

    public function inquiry()
    {
        return $this->hasMany(Inquiry::class);
    }
    public function batch()
    {
        return $this->belongsToMany(Batch::class,'batch_classes','class_id','batch_id')
            ->withTimestamps();
    }
}
