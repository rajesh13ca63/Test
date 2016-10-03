<?php
 
namespace App;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class Admin extends Authenticatable 

{
	
    use SearchableTrait;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
 
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function clients()
    {
        return $this->hasMany('App\Client');
    }

    public function recruiters()
    {
        return $this->hasMany('App\Recruiter');
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
    
}