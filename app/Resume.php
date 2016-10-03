<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Resume extends Model
{
  
   use SearchableTrait;

    protected $fillable = [ 'name', 'user_id', 'resume_path', 'mime', 'size' ];

   public function user()
   {
   		return $this->belongsTo('App\User');
   }
}
