<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Logo extends Model
{
    use SearchableTrait;
    protected $fillable = [ 'client_id', 'name', 'logo_path', 'mime', 'size' ];

   public function client()
   {
   		return $this->belongsTo('App\Client');
   }
}
