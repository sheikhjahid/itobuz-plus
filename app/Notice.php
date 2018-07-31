<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Notice extends Model
{
    use SoftDeletes;
    protected $fillable=['subject','body','status','start_notice','end_notice'];
}
