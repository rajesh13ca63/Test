<?php

namespace App;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Kyslik\ColumnSortable\Sortable;

class Boutique extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Sortable;

   	 use SearchableTrait;
     
    protected $fillable = ['admin_id', 'recruiter_id','name_firm', 'specialized_skills', 'address', 'website', 'contact_name', 'contact_no', 'email', 'password', 'head_counts','Brief_profile', 'approve',
    ];

    protected $searchable = [ 
        'columns' => [
            'specialized_skills' => 1,
            'website' => 1,
            'contact_name' => 2,
            'approve' => 5,
            'name_firm' =>5,
            
        ],
         
    ];

    protected $sortable = ['id','admin_id', 'recruiter_id','name_firm', 'specialized_skills', 'address', 'website', 'contact_name', 'contact_no', 'email', 'password', 'head_counts','Brief_profile', 'approve','created_at', 'updated_at'];



    protected $hidden = [
        'password', 'remember_token',
    ];

   
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
    public function recruiter()
    {
        return $this->belongsTo('App\Recruiter');
    }

    //many to many relationship using the pivote table boutique_post
    public function posts()
    {
        return $this->belongsToMany('App\Post')
                    ->withTimestamps()
                    ->orderBy('created_at', 'desc');
    }
}
