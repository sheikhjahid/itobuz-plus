<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{
    use SoftDeletes;
    protected $fillable=['name','status'];

    public function user()
    {
     return $this->hasMany(\App\User::class);
    }

    public function permission()
    {
    	return $this->belongsToMany(\App\Permission::class,'permission_role','role_id','permission_id');
    }

}
