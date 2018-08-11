<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','status','image','team_id','polcy_id','role_id','parent_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    public function team()
    {
        return $this->belongsTo(\App\Team::class,'team_id');
    }
    public function role()
    {
        return $this->belongsTo(\App\Role::class,'role_id');
    }
    public function policy()
    {
        return $this->belongsTo(\App\Policy::class,'policy_id');
    } 
    public function parent()
    {
        return $this->hasOne(\App\User::class,'id','parent_id');
    }
    public function children()
    {
        return $this->hasMany(\App\User::class,'parent_id','id');
    }
    
}
