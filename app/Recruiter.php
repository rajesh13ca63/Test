<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Kyslik\ColumnSortable\Sortable;

class Recruiter extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Sortable;

   	
     use SearchableTrait;
     
   	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
   
   protected $searchable = [
        'columns' => [ 
            'User_name' => 1,
            'email' => 1,
            'Contact_No' => 2,
            'Address' => 5,
            
        ],
        
    ];

 protected $sortable = ['id','User_name', 'email','Contact_No', 'Address', 'admin_id', 'created_at','updated_at'];


   public function amdin()
    {
        return $this->belongsTo('App\Admin');
    }
    public function clients()
    {
        return $this->hasMany('App\Client');
    }

    
    public function candidates()
    {
        return $this->hasMany('App\User');
    }
    public function boutiques()
    {
        return $this->hasMany('App\Boutique');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }


     protected $fillable = [
        'User_name', 'email', 'password', 'Contact_No', 'Address', 'admin_id',
    ];
 
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   // protected $guard = "recruiter";
}