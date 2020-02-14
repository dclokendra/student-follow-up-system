<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    protected $table='follow_ups';
    protected $fillable=['inquiry_id','follow_up_date','follow_up_time','description','status','created_by', 'updated_by'];
    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }
}
