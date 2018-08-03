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
     return $this->belongsToMany(\App\User::class,'user_roles','role_id','user_id');
    }

    public function permission()
    {
    	return $this->belongsToMany(\App\Permission::class,'permission_role','role_id','permission_id');
    }

}
