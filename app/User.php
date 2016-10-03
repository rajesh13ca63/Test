<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Kyslik\ColumnSortable\Sortable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Sortable;
   
    use SearchableTrait;
    
    protected $searchable = [
        'columns' => [
            'Key_skills' => 1,
            'Type_opportunity' => 1,
            'Preffer_location' => 2,
            'Basic_education' => 5,
            'Experience' =>5,
            'Designation' =>1,
      
            
            
        ],
        
    ];

    public $sortable = ['id','admin_id','recruiter_id','First_name', 'Last_name', 'email', 'Dob', 'Gender', 'Address', 'Mobile_no', 'Designation', 'Experience', 'Noticed_period', 'rate_from','rate_to','frequency','j2w_rate','approve', 'Currrent_location', 'Preffer_location', 'Type_opportunity', 'Key_skills', 'Brief_profile', 'Basic_education', 'Masters','Certificates','created_at','updated_at'];




    public function resume()
    {
        return $this->hasOne('App\Resume');
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
     public function posts()
    {
        return $this->belongsToMany('App\Post')
                    ->withTimestamps()
                    ->orderBy('created_at', 'desc');
    }
    
    protected $fillable = ['admin_id','recruiter_id','First_name', 'Last_name', 'email', 'password', 'Dob', 'Gender', 'Address', 'Mobile_no', 'Designation', 'Experience', 'Noticed_period', 'rate_from','rate_to','frequency','j2w_rate','approve', 'Currrent_location', 'Preffer_location', 'Type_opportunity', 'Key_skills', 'Brief_profile', 'Basic_education', 'Masters','Certificates',
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

     
    /*This Method is used for show all records of Candidates in bootgrid */
    public function ShowAllCandidateRecords($request, $order_by_column, $order_by_value)
    {
        //$studenttotal = Student::wStudentTotal_cn;
        //dd($studenttotal);exit;        
                        
        $current = $request['current'];
        $row = $request['rowCount'];
       
        $i = 0;
        $results = User::orderBy($order_by_column, $order_by_value)
                            //->skip($current)->limit($row)->get();
                           ->get();
       
        foreach($results as $result ) {
            $response[] = $result['attributes'];
            $i++;
        }
       
        $data = array(
            'current' => $current,
            'rowCount' => $i,
            'rows' => $response,
            'total'=> count($results)
        );
        
        echo json_encode($data); 
       
    }
    
}
