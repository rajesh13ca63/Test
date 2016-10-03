<?php

namespace App;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use App\Client;
use Kyslik\ColumnSortable\Sortable;


class Post extends Model
{

   use SearchableTrait;
   use Sortable;

	public function client()
    {
        return $this->belongsTo('App\Client'); 
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

   //many to many relationship using the pivote table boutique_post
    public function boutiques()
    {
        return $this->belongsToMany('App\Boutique')
                      ->withTimestamps();
    }

protected $searchable = [
        'columns' => [
            'KeySkills' => 1,
            'Experience_from' => 1,
            'Experience_to' => 2,
            'Job_title' => 5,
            'Location' =>5,
            'Type_of_opportunity' =>2,
            
            
        ],
        
    ];
 public $sortable = ['id',
                            'admin_id',
                            'client_id',
                            'recruiter_id',
                           'Job_title',
                            'Experience_from',
                            'Experience_to',
                           'KeySkills',
                           'Type_of_opportunity',
                            
                            'Project_duration',
                           'Location',
                            'No_of_vacancies',
                            'Notice_period',
                           'Brief_summary',
                            'budget_from',
                            'budget_to',
                            'frequency',
                            'j2w_rate',
                            'approve',


                           'created_at',
                           'updated_at'];


    protected $fillable = [
                    
            'admin_id',
            'client_id',
            'recruiter_id',
           'Job_title',
            'Experience_from',
            'Experience_to',
           'KeySkills',
           'Type_of_opportunity',
            
            'Project_duration',
           'Location',
            'No_of_vacancies',
            'Notice_period',
           'Brief_summary',
            'budget_from',
            'budget_to',
            'frequency',
            'j2w_rate',
            'approve',
    ];
}
