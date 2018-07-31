<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Leave extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id','leave_id','start_date','end_date','apply_date','approved_rejected_date','comments','status','seen'];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
    public function type()
    {
    	return $this->hasMany('App\LeaveType','leave_id');
    }
}
