<?php

namespace App;
use Nicolaslopezj\Searchable\SearchableTrait;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Kyslik\ColumnSortable\Sortable;

class Client extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Sortable;
 
   use SearchableTrait;
 
    protected $searchable = [
        'columns' => [
            'posts.KeySkills' => 1,
            'posts.Experience_from' => 1,
            'posts.Experience_to' => 2,
            'posts.Job_title' => 5,
            'posts.Location' =>5,
            'posts.Type_of_opportunity' =>2, 
            'clients.Key_skills' => 2,
            'clients.Org_name' =>2,
            'clients.approve' =>2,
            
        ],
        'joins' => [
            'clients' => ['client.id','posts.client_id'],
        ],
    ];

    protected $sortable = ['id','Person_name', 'Org_name', 'email', 'Type_of_opportunity', 'Key_skills', 'Mobile_no','Location','Brief_profile', 'admin_id', 'recruiter_id','approve','created_at','updated_at'];



   public function posts()
    {
        return $this->hasMany('App\Post');
    }
  
  public function logo()
    {
        return $this->hasOne('App\Logo');
    }
    
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
    public function recruiter()
    {
        return $this->belongsTo('App\Recruiter');
    }

//many to many relationship using the pivote table post_user
     public function users()
    {
        return $this->belongsToMany('App\User')
                    ->withTimestamps();
    }

   //table fillable fields
    protected $fillable = [
        'Person_name', 'Org_name', 'email', 'password', 'Type_of_opportunity', 'Key_skills', 'Mobile_no','Location','Brief_profile', 'admin_id', 'recruiter_id','approve',
    ];

    // table hidden fields
    protected $hidden = [
        'password', 'remember_token',
    ];

    
}