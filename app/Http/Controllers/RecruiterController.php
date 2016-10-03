<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use App\Admin;
use App\Post;
Use App\Logo;

use App\Boutique;
use Auth;
use App\Recruiter;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash; 

class RecruiterController extends Controller
{
    

    public function dashboard(){
    		$auth = auth()->guard('recruiters');
		 
		 if($auth->check()){
		 	$id=$auth->user()->id;
		 	$profile= Recruiter::findOrFail($id);
                return \View::make('recruiter.dashboard')->with('title', 'Recruiter')->with('profile', $profile);

		 }
		else{

			return 'please Login to your account Or Contact your JoulestoWatts for futher queries';
		}
    }

	
	//creating the Client
	public function create_client(){
    		$rauth = auth()->guard('recruiters');
		 
		 if($rauth->check()){
		 	$id=$rauth->user()->id;
		 	$profile= Recruiter::findOrFail($id);
                return \View::make('recruiter.add_client')->with('title', 'Recruiter')->with('profile', $profile);

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

    }

    public function add_client(Request $request){
    	$rauth = auth()->guard('recruiters');
		 
		 if($rauth->check()){
		 	$id=$rauth->user()->id;

		 	$validator = Validator::make($request->all(), [
                'Person_name'   => 'required|unique:clients|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
               
                'email'         => 'required|email|unique:users|unique:clients|unique:admins|unique:recruiters',
                'password'      => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6',
                
                'Key_skills'    => 'required|min:3',
                'Mobile_no'     => 'required|numeric|min:8',
                'Location'      => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                'Brief_profile' => 'required|between:10,255',
               
            ]);
        

	      if($validator->passes())
	        {

	          Client::create(array(
                'Person_name' =>Input::get('Person_name'),
                'recruiter_id' => $id,
                'email' =>Input::get('email'),
                'password' =>Hash::make(Input::get('password')),
                'Type_of_opportunity' => Input::get('Type_of_opportunity'),
                'Key_skills' =>Input::get('Key_skills'),
                'Mobile_no' =>Input::get('Mobile_no'),
                'Location' =>Input::get('Location'),
                'Brief_profile' =>Input::get('Brief_profile')
                ));


		 	Session::flash('success', 'Client Profile Successfully created');
  					
		 	$profile= Recruiter::findOrFail($id);
                 return \View::make('recruiter.dashboard')->with('title', 'Recruiter')->with('profile', $profile);

		 }else{
			        	
			         return Redirect::back()
			         ->withInput()
			           ->withErrors($validator);
			            
	   }

	}
	else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

    }

    //adding candidates
    public function create_candidate(){
    	$rauth = auth()->guard('recruiters');
		 
		 if($rauth->check()){
		 	$id=$rauth->user()->id;
		 	$profile= Recruiter::findOrFail($id);
                return \View::make('recruiter.add_candidate')->with('title', 'Recruiter')->with('profile', $profile);

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
    }

    public function add_candidate(Request $request){
    	$rauth = auth()->guard('recruiters');
		 
		 if($rauth->check()){
		 	$id=$rauth->user()->id;

		 		 $validator = Validator::make($request->all(), [

			            'First_name' => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4|unique:users|max:45',
			            'Last_name'  => 'alpha',
			            'Dob'       => 'date|required',
			            'email'   =>  'required|email|unique:users|unique:clients|unique:admins|unique:recruiters',
			            'password'  =>  'required|min:6|confirmed', 
			            'password_confirmation' => 'required|min:6',
			            'Address'   => 'required|min:4',
			            'Mobile_no' => 'required',
			            'Key_skills' => 'required|min:3',
			            'Exp_ctc'   => 'integer',
			            'Preffer_location' => 'required',
			            'Designation' => 'required',
			            'Noticed_period' => 'integer',
			            'Experience' => 'regex:/[-+]?[0-9]*\.?[0-9]+/', 
			            'Basic_education' => 'required',
			            'Brief_profile' => 'required|between:4,255',
			            
			            ]);
			        if($validator->passes())
			        {
			        	User::create(array(
			                'recruiter_id' => $id,
			                'First_name' =>Input::get('First_name'),
			                'Last_name' =>Input::get('Last_name'),
			                'Dob' =>Input::get('Dob'),
			                'Gender' =>Input::get('Gender'),
			                'email' =>Input::get('email'),
			                'password' =>Hash::make(Input::get('password')),
			                'Type_opportunity' =>Input::get('Type_opportunity'),
			                'Address' =>Input::get('Address'),
			                'Mobile_no' =>Input::get('Mobile_no'),   
			                'Key_skills' =>Input::get('Key_skills'),
			                'Exp_ctc' =>Input::get('Exp_ctc'),
			                'Preffer_location' =>Input::get('Preffer_location'),
			                'Designation' =>Input::get('Designation'),
			                'Noticed_period' =>Input::get('Noticed_period'),
			                'Experience' =>Input::get('Experience'),
			                'Basic_education' =>Input::get('Basic_education'),
			                'Masters' =>Input::get('Masters'),
			                'Certificates' =>Input::get('Certificates'),
			                'Brief_profile' =>Input::get('Brief_profile')
			                ));

			        		Session::flash('success', 'Recruiter Profile Successfully created');
  					
						 	$profile= Recruiter::findOrFail($id);
				                 return \View::make('recruiter.dashboard')->with('title', 'Recruiter')->with('profile', $profile);

					}
			          else {

			          		return Redirect::back()
			            ->withInput($request->except('password'))
			            ->withErrors($validator);
			          }
		}			        
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

    }

    //Adding the boutique firm
    public function create_boutique(){
    		$rauth = auth()->guard('recruiters');
		 
		 if($rauth->check()){
		 	$id=$rauth->user()->id;
		 	$profile= Recruiter::findOrFail($id);
                return \View::make('recruiter.add_boutique')->with('title', 'Recruiter')->with('profile', $profile);

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

    }

    public function add_boutique(Request $request){
    	$rauth = auth()->guard('recruiters');
		 
		 if($rauth->check()){
		 	$id=$rauth->user()->id;

		 		$validator = Validator::make($request->all(), [

			            'name_firm' 			=> 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4|unique:boutiques|max:45',
			            'specialized_skills' 	=> 'required|min:3',
			            'address'   			=> 'required|min:4',
			            'website'				=> 'required',
			            'contact_name'			=> 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4|unique:boutiques|max:45',
			            'contact_no' 			=> 'required|between:8,12',
			            'email'  			 	=>  'required|email|unique:users|unique:boutiques|unique:clients|unique:admins|unique:recruiters',
			            'password'  			=>  'required|min:6|confirmed', 
			            'password_confirmation' => 'required|min:6',
			            'head_counts'			=>	'integer',	
			            'Brief_profile' 		=> 'required|between:4,255',
   
			            ]);

    		if($validator->passes())
			 {
			 	Boutique::create(array(
			                'recruiter_id'				=>$id,
			                'name_firm' 			=>Input::get('name_firm'),
			                'specialized_skills' 	=>Input::get('specialized_skills'),
			                'address' 				=>Input::get('address'),
			                'website' 				=>Input::get('website'),
			                'contact_name' 			=>Input::get('contact_name'),
			                'password' 				=>Hash::make(Input::get('password')),
			                'email'	 				=>Input::get('email'),
			                'contact_no' 			=>Input::get('contact_no'), 
			                'head_counts' 			=>Input::get('head_counts'),
			                'Brief_profile' 		=>Input::get('Brief_profile')
			      ));

			 	 Session::flash('success', 'Boutque Profile Successfully Created');
  					
						 	$profile= Recruiter::findOrFail($id);
				                 return \View::make('recruiter.dashboard')->with('title', 'Recrutier')->with('profile', $profile);
			 }
			 else {

			        return Redirect::back()
			            ->withInput($request->except('password'))
			            ->withErrors($validator);
			     }
		}
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

    
    }

 //Adding the post
    public function create_post(){
    		$rauth = auth()->guard('recruiters');
		 
		 if($rauth->check()){
		 	$id=$rauth->user()->id;
		 	$profile= Recruiter::findOrFail($id);
                return \View::make('recruiter.add_post')->with('title', 'Recruiter')->with('profile', $profile);

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

    }


    public function add_post(Request $request)
    {
        $rauth = auth()->guard('recruiters');
		 
		 if($rauth->check()){
		 	$id=$rauth->user()->id;

           $validator = Validator::make($request->all(), [
                'Job_title'         => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:3',
                'Experience_from'   => 'required',
                'Experience_to'     => 'required',
                'Type_of_opportunity'=> 'required',
                'Ctc_offer'         => 'numeric',
                'KeySkills'         => 'required|min:3',
                'Project_duration'  => 'numeric',
                'Location'          => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/',
                'No_of_vacancies'   => 'required',
                'Notice_period'     => 'numeric',
                'Brief_summary'     => 'required|between:10,255',
                'J2w_rate'          => 'required',
                'J2w_duration'      => 'required',
                
            ]);
        

          if($validator->passes())
            {
                
              Post::create(array(
                'recruiter_id'         	=>$id,
                'Job_title'         =>Input::get('Job_title'),
                'Experience_from'   =>Input::get('Experience_from'),
                'Experience_to'     =>Input::get('Experience_to'),
                'Type_of_opportunity' => Input::get('Type_of_opportunity'),
                'Ctc_offer'         =>Input::get('Ctc_offer'),
                'KeySkills'         =>Input::get('KeySkills'),
                'Project_duration'  =>Input::get('Project_duration'),
                'Location'          =>Input::get('Location'),
                'No_of_vacancies'   =>Input::get('No_of_vacancies'),
                'Notice_period'     =>Input::get('Notice_period'),
                'Brief_summary'     =>Input::get('Brief_summary'),
                'J2w_rate'          =>Input::get('J2w_rate'),
                'J2w_duration'      =>Input::get('J2w_duration'),
                ));
         
         Session::flash('success', 'Boutque Profile Successfully Created');
  					
						 	$profile= Recruiter::findOrFail($id);
				                 return \View::make('recruiter.dashboard')->with('title', 'Recruiter')->with('profile', $profile);
			 }
			 else {

			        return Redirect::back()
			            ->withInput($request->except('password'))
			            ->withErrors($validator);
			     }
		
		}
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

    }
  
}
