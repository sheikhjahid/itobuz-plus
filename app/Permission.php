<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable=['description'];

    public function role()
    {
    	return $this->belongsToMany(\App\Role::class,'permission_roles','permission_id','role_id');
    }
}
