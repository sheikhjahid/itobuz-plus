<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Meeting extends Model
{
    use SoftDeletes;
    protected $fillable = ['team','subject','initialised','start_meet','end_meet','status','attendance'];
}
