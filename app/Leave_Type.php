<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Leave_Type extends Model
{
    use SoftDeletes;
    protected $fillable=['name'];
   protected $table="leave_types";
}
