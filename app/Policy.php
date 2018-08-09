<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Policy extends Model
{
    use SoftDeletes;
    protected $fillable=['name'];

   public function user()
   {
   	  return $this->hasMany(\App\User::class);
   }
}
