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
use sortable;

class AdminController extends Controller
{
    public function login()
    	{
            return \View::make('admin.login')->with('title', 'Admin Login');

    	}

    public function dashboard(){
    		$auth = auth()->guard('admins');
		 
		if($auth->check()){
		 	$id=$auth->user()->id;
		 	$profile= Admin::findOrFail($id);

               
		 		$perPage = 12;
		        $currentPage = Input::get('page') - 1;

		        $a_clients = Client::where('admin_id', '!=', '0')->sortable()->get();
		        $pagedData= $a_clients->slice($currentPage * $perPage, $perPage)->all();
		        $a_clients=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($a_clients), $perPage);
		        $a_clients->setPath('');

		        $a_Boutique = Boutique::where('admin_id', '!=', '0')->sortable()->get();
		        $pagedData= $a_Boutique->slice($currentPage * $perPage, $perPage)->all();
		        $a_Boutique=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($a_Boutique), $perPage);
		        $a_Boutique->setPath('');

		        $a_candidate = User::where('admin_id', '!=', '0')->sortable()->get();
		        $pagedData= $a_candidate->slice($currentPage * $perPage, $perPage)->all();
		        $a_candidate=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($a_candidate), $perPage);
		        $a_candidate->setPath('');

		        $a_posts = Post::where('admin_id', '!=', '0')->sortable()->get();
		        $pagedData= $a_posts->slice($currentPage * $perPage, $perPage)->all();
		        $a_posts=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($a_posts), $perPage);
		        $a_posts->setPath('');

		        return \View::make('admin.dashboard')
		        			->with('title', 'Admin')
		        			->with('profile', $profile)
		        			->with('a_posts', $a_posts)
		        			->with('a_candidate', $a_candidate)
		        			->with('a_Boutique', $a_Boutique)
		        			->with('a_clients', $a_clients);

		 }
		else{

			return 'Please Login to your account Or Contact your J2W for futher queries';
		}
 }


    

    //adding Recruiters

    public function create_recruiter(){
    		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	$id=$aauth->user()->id;
		 	$profile= Admin::findOrFail($id);
                return \View::make('admin.add_recruiter')->with('title', 'Admin')->with('profile', $profile);

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

    }

    public function add_recruiter(Request $request){
    	$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	$id=$aauth->user()->id;

		 	$validator = Validator::make($request->all(), [
                'User_name'   => 'required|unique:recruiters|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                'email'         => 'required|email|unique:users|unique:clients|unique:admins|unique:recruiters',
                'password'      => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6',
                'Contact_No'     => 'required|min:8|max:11',
              
                
                'Address'      => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                
            ]);
        

	      if($validator->passes())
	        {

	          Recruiter::create(array(
                'User_name' =>Input::get('User_name'),
                'email' =>Input::get('email'),
                'password' =>Hash::make(Input::get('password')),
                'Contact_No' => Input::get('Contact_No'),
                'Address' =>Input::get('Address'),
                'admin_id' => $id
                
                ));
         	Session::flash('success', 'Recruiter Profile Created Successfully');
  					
		 	$profile= Admin::findOrFail($id);
                 return \View::make('admin.dashboard')->with('title', 'Admin')->with('profile', $profile);

		 }

		else{
			        	
			         return Redirect::back()
			         ->withInput()
			           ->withErrors($validator);
			            
			        }


    }
    else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

}
	
	//creating the Client 
	public function create_client(){
    	$aauth = auth()->guard('admins');
		 
		if($aauth->check()){
		 	$id=$aauth->user()->id;
		 	$profile= Admin::findOrFail($id);
                return \View::make('admin.add_client')->with('title', 'Admin')->with('profile', $profile);

		}
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
    }

    public function add_client(Request $request){
    	$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	$id=$aauth->user()->id;

		 	$validator = Validator::make($request->all(), [
                'Person_name'   => 'required|unique:clients|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                'email'         => 'required|email|unique:users|unique:clients|unique:admins|unique:recruiters',
                'password'      => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6',
                'Key_skills'    => 'required|min:3',
                'Mobile_no'     => 'required|min:8|max:11',
                'Location'      => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                'Brief_profile' => 'required|between:10,255',
               
            ]);
        

	      if($validator->passes())
	        {

	          Client::create(array(
                'Person_name' =>Input::get('Person_name'),
                'admin_id' => $id,
                'email' =>Input::get('email'), 
                'password' =>Hash::make(Input::get('password')),
                'Type_of_opportunity' => Input::get('Type_of_opportunity'),
                'Key_skills' =>Input::get('Key_skills'),
                'Mobile_no' =>Input::get('Mobile_no'),
                'Location' =>Input::get('Location'),
                'Brief_profile' =>Input::get('Brief_profile'),
                'approve'=> 1
                ));


		 	Session::flash('success', 'Client Profile Successfully created');
  					
		 	return Redirect::route('aDashboard');


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
    	$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	$id=$aauth->user()->id;
		 	$profile= Admin::findOrFail($id);
                return \View::make('admin.add_candidate')->with('title', 'Admin')->with('profile', $profile);

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
    }

    public function add_candidate(Request $request){
    	$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	$id=$aauth->user()->id;

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
			                'admin_id' => $id,
			                'First_name' =>Input::get('First_name'),
			                'Last_name' =>Input::get('Last_name'),
			                'Dob' =>Input::get('Dob'),
			                'Gender' =>Input::get('Gender'),
			                'email' =>Input::get('email'),
			                'password' =>Hash::make(Input::get('password')),
			                'Address' =>Input::get('Address'),
			                'Mobile_no' =>Input::get('Mobile_no'),   
			                'Key_skills' =>Input::get('Key_skills'),
			                'Type_opportunity' =>Input::get('Type_opportunity'),
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
  					
						 	$profile= Admin::findOrFail($id);
				                 return \View::make('admin.dashboard')->with('title', 'Admin')->with('profile', $profile);

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
    		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	$id=$aauth->user()->id;
		 	$profile= Admin::findOrFail($id);
                return \View::make('admin.add_boutique')->with('title', 'Admin')->with('profile', $profile);

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

    }

    public function add_boutique(Request $request){
    	$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	$id=$aauth->user()->id;

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
			                'admin_id'				=>$id,
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

			 	 Session::flash('success', 'Boutque Profile Successfully created');
  					
						 	$profile= Admin::findOrFail($id);
				                 return \View::make('admin.dashboard')->with('title', 'Admin')->with('profile', $profile);
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
    		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	$id=$aauth->user()->id;
		 	$profile= Admin::findOrFail($id);
                return \View::make('admin.add_post')->with('title', 'Admin')->with('profile', $profile);

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

    }


    public function add_post(Request $request)
    {
        $aauth = eauth()->guard('admins');
		 
		 if($aauth->check()){
		 	$id=$aauth->user()->id;

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
                'admin_id'         	=>$id,
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
         
         Session::flash('success', 'Boutque Profile Successfully created');
  					
						 	$profile= Admin::findOrFail($id);
				                 return \View::make('admin.dashboard')->with('title', 'Admin')->with('profile', $profile);
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
 

  public function posted_recruiter_list(){
  	$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	$aid=$aauth->user()->id;
		 	$admin = Admin::findOrFail($aid);
		 	$a_recruiters= Recruiter::sortable()->paginate(10);
		 	
                return \View::make('admin.admin_recruiters_list')->with('title', 'Admin')->with('a_recruiters', $a_recruiters);

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
  }

  public function edit_recruiter(Request $request, $id){
  		$aauth = auth()->guard('admins');
		 $rec=Recruiter::findOrFail($id);
		 if($aauth->check()){
		 	$validator = Validator::make($request->all(), [
                'User_name'   => 'Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
               
                'password'      => 'min:6',
               
                'Address'      => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                
            ]);
        

	      if($validator->passes())
	        {
				$rec=Recruiter::findOrFail($id);

				$rec->User_name = Input::get('User_name');
				$rec->email =Input::get('email');
				if( Input::get('password'))
					{
						$rec->password=Hash::make(Input::get('password'));
					}
				$rec->Contact_No=Input::get('Contact_No');
				$rec->Address=Input::get('Address');
				$rec->save();

				$msg ="Recruiter ". $id ." profile Successfully updated";
				Session::flash('success', $msg);
				return redirect::back();
			}
			else{
				$msg ="Recruiter ". $id ." profile updation failure..";
				 Session::flash('failure', $msg);
				 return redirect::back()->withErrors($validator);
			}

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
  }

  public function delete_recruiter($id){
  		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	
		 	
		 	$a_recruiters= Recruiter::findOrFail($id);

		 	 $a_recruiters->delete();

		 	 $msg ="Recruiter ". $id ." profile Successfully deleted";
				Session::flash('success', $msg);
				return redirect::back();
		 	
                
		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
  }


  public function recruiter_client_details($id){
  		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	
		 	
		 	$recruiter= Recruiter::findOrFail($id);
		 	$r_clients = $recruiter->clients->sortBy('Person_name');

		 	
		
		        $perPage = 12;
		        $currentPage = Input::get('page') - 1;
		        $pagedData= $r_clients->slice($currentPage * $perPage, $perPage)->all();
		        $r_clients=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($r_clients), $perPage);
		        $r_clients->setPath('');

				return \View::make('admin.recruiter_details')->with('title', 'Recruiter Details')->with('recruiter', $recruiter)->with('r_clients', $r_clients); 
		 	
                
		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
  }

  public function edit_recruiter_client(Request $request, $id){
  	$aauth = auth()->guard('admins');
		
		 if($aauth->check()){
		 	$validator = Validator::make($request->all(), [
                'Person_name'   => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
               
                'email'         => 'required|email|unique:users|unique:admins|unique:recruiters',
                'password'      => 'min:6',
                'Key_skills'    => 'required|min:3',
                'Mobile_no'     => 'required|min:8|max:11',
                'Location'      => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                'Brief_profile' => 'required|between:10,255',
                               
            ]);
        

	      if($validator->passes())
	        {
				$client=Client::findOrFail($id);

				$client->Person_name = Input::get('Person_name');
				$client->email =Input::get('email');
				if( Input::get('password'))
					{
						$client->password=Hash::make(Input::get('password'));
					}
				$client->Org_name=Input::get('Org_name');
				$client->Type_of_opportunity=Input::get('Type_of_opportunity');
				$client->Key_skills=Input::get('Key_skills');
				$client->Mobile_no=Input::get('Mobile_no');
				$client->Location=Input::get('Location');
				$client->Brief_profile=Input::get('Brief_profile');
				$client->approve=Input::get('approve');

				$client->save();

				$msg ="Client ". $id ." profile Successfully updated";
				Session::flash('success', $msg);
				return redirect::back();
			}
			else{
				$msg ="Client ". $id ." profile updation failure..";
				 Session::flash('failure', $msg);
				 return redirect::back()->withErrors($validator);
			}

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
  }

  public function delete_recruiter_client($id){
  		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	
		 	
		 	$client= Client::findOrFail($id);

		 	 $client->delete();

		 	 $msg ="Client id =". $id ." profile has been Successfully deleted";
				Session::flash('success', $msg);
				return redirect::back();
		 	
                
		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
  }

  public function recruiter_posts(Request $request, $id){
  	$aauth = auth()->guard('admins');
  	 		 
		 if($aauth->check()){
		 	
		 	
		 	$post = Input::get('r_post');
		 	if($post == "Client"){
		 		return Redirect::route('rClients', array('id' => $id));

		 	}
		 	if($post == "Boutique"){
		 		
		 		return Redirect::route('rBoutique', array('id' => $id));

		 	}

		 	if($post == "Candidate"){
		 		return Redirect::route('rCandidate', array('id' => $id));
		 	}
		 	if($post == "Opportunity"){
		 		return Redirect::route('rOpportunity', array('id' => $id));

		 	}
		 	else{
		 		return \View::make('home.index')->with('title', 'J2W PL');
		 	}

                
		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
  }

  public function recruiter_boutique_details($id){
  		$recruiter= Recruiter::findOrFail($id);
		 		$r_Boutique = $recruiter->boutiques->sortBy('name_firm');
	
		
		        $perPage = 12;
		        $currentPage = Input::get('page') - 1;
		        $pagedData= $r_Boutique->slice($currentPage * $perPage, $perPage)->all();
		        $r_Boutique=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($r_Boutique), $perPage);
		        $r_Boutique->setPath('');

		        return \View::make('admin.recruiter_boutique')->with('title', 'Recruiters Boutique')->with('recruiter', $recruiter)->with('r_Boutique', $r_Boutique);

  }

  public function edit_recruiter_boutique( Request $request, $id){
  		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	
		 	
		 	$boutique= Boutique::findOrFail($id);

		 	$validator = Validator::make($request->all(), [

			            'name_firm' 			=> 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4|max:45',
			            'specialized_skills' 	=> 'required|min:3',
			            'address'   			=> 'required|min:4',
			            'website'				=> 'required',
			            'contact_name'			=> 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4|max:45',
			            'contact_no' 			=> 'required|between:8,12',
			            'email'  			 	=>  'required|email|unique:users|unique:clients|unique:admins|unique:recruiters',
			            'password'  			=>  'min:6', 
			            'head_counts'			=>	'integer',	
			            'Brief_profile' 		=> 'required|between:4,255',
   
			            ]);

    		if($validator->passes())
			 {
			 		$boutique =Boutique::findOrFail($id);
			               
			                $boutique->name_firm = Input::get('name_firm');
			                $boutique->specialized_skills =Input::get('specialized_skills');
			                $boutique->address 			=Input::get('address');
			                $boutique->website 			=Input::get('website');
			                $boutique->contact_name 	=Input::get('contact_name');
			                if( Input::get('password'))
								{
									$boutique->password=Hash::make(Input::get('password'));
								}
			                $boutique->contact_no 		=Input::get('contact_no'); 
			                $boutique->head_counts 		=Input::get('head_counts');
			                $boutique->Brief_profile 	=Input::get('Brief_profile');
			      			$boutique->save();
		 				
		 		$msg ="Boutique-". $id ." profile Successfully updated, execpt email address";
				Session::flash('success', $msg);
				return redirect::back();
            }
            else{
				$msg ="Boutique-". $id ." profile updation failure..";
				 Session::flash('failure', $msg);
				 return redirect::back()->withErrors($validator);
			}

		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
    }

	public function delete_recruiter_boutique($id) {
  		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()) {
		 	
		 	
		 	$boutique= Boutique::findOrFail($id);

		 	$boutique->delete();

		 	$msg ="Boutique id =". $id ." profile has been Successfully deleted";
				Session::flash('success', $msg);
				return redirect::back();
		 	
                
		}
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
    }

  public function recruiter_candidate_details($id){
  			$recruiter= Recruiter::findOrFail($id);
		 		$r_candidate = $recruiter->candidates->sortBy('First_name');
		        $perPage = 12;
		        $currentPage = Input::get('page') - 1;
		        $pagedData= $r_candidate->slice($currentPage * $perPage, $perPage)->all();
		        $r_candidate=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($r_candidate), $perPage);
		        $r_candidate->setPath('');

		        return \View::make('admin.recruiter_candidates')->with('title', 'Recruiters Candidates')->with('recruiter', $recruiter)->with('r_candidate', $r_candidate);
  }

  public function edit_recruiter_candidate(Request $request, $id){
  		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	

		 		 $validator = Validator::make($request->all(), [

			            'First_name' => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4|max:45',
			            'password'  =>  'min:6', 
			            'Mobile_no' => 'required',
			            'Key_skills' => 'required|min:3',
			            'Experience' => 'regex:/[-+]?[0-9]*\.?[0-9]+/', 
			            'Brief_profile' => 'required|between:4,255',
			            
			            ]);
			        if($validator->passes())
			        {
			        	$user=User::findOrFail($id);

			        	$user->First_name=Input::get('First_name');
			        	if( Input::get('password'))
								{
									$user->password=Hash::make(Input::get('password'));
								}
			        	$user->Mobile_no=Input::get('Mobile_no');
			        	$user->Designation=Input::get('Designation');
			        	$user->Experience=Input::get('Experience');
			        	$user->Preffer_location=Input::get('Preffer_location');
			        	$user->Type_opportunity=Input::get('Type_opportunity');
			        	$user->Key_skills=Input::get('Key_skills');
			        	$user->Basic_education=Input::get('Basic_education');
			        	$user->Brief_profile=Input::get('Brief_profile');
			        	$user->j2w_rate=Input::get('j2w_rate');
			        	$user->frequency=Input::get('frequency');
			        	$user->save();


						$msg ="Candidate-". $id ." profile Successfully updated";
						Session::flash('success', $msg);
						return redirect::back();	
					}
			     else{
						$msg ="Candidate-". $id ." profile updation failure..";
						 Session::flash('failure', $msg);
						 return redirect::back()->withErrors($validator);
					}
		}			        
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

  }
 public function delete_recruiter_candidate($id){
  		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	
		 	
		 	$User= User::findOrFail($id);

		 	 $User->delete();

		 	 $msg ="Candidate = ". $id ." profile has been Successfully deleted";
				Session::flash('success', $msg);
				return redirect::back();
		 	
                
		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
  }


  public function recruiter_opportunity_details($id){
  		$recruiter= Recruiter::findOrFail($id);
		 		$r_posts = $recruiter->posts->sortBy('Job_title');

		 	
		
		        $perPage = 12;
		        $currentPage = Input::get('page') - 1;
		        $pagedData= $r_posts->slice($currentPage * $perPage, $perPage)->all();
		        $r_posts=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($r_posts), $perPage);
		        $r_posts->setPath('');

		        return \View::make('admin.recruiter_posts')->with('title', 'Recruiters Opportunities')->with('recruiter', $recruiter)->with('r_posts', $r_posts);

  }

  public function edit_recruiter_opportunity( Request $request, $id){
  		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	

           $validator = Validator::make($request->all(), [
                'Job_title'         => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:3',
                'Experience_from'   => 'required',
                'Experience_to'     => 'required',
                'Type_of_opportunity'=> 'required',
                
                'KeySkills'         => 'required|min:3',
                
                'Location'          => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/',
                'No_of_vacancies'   => 'required',
                
               
                'j2w_rate'          => 'required',
                'frequency'      => 'required',
                
            ]);
        

          if($validator->passes())
            {
            	$post=Post::findOrFail($id);

            	$post->Job_title=Input::get('Job_title');
            	$post->Experience_from=Input::get('Experience_from');
            	$post->Experience_to=Input::get('Experience_to');
            	$post->Type_of_opportunity=Input::get('Type_of_opportunity');
            	$post->KeySkills=Input::get('KeySkills');
            	$post->Location=Input::get('Location');
            	$post->No_of_vacancies=Input::get('No_of_vacancies');
            	$post->Brief_summary=Input::get('Brief_summary');
            	$post->budget_from=Input::get('budget_from');
            	$post->budget_to=Input::get('budget_to');
            	$post->j2w_rate=Input::get('j2w_rate');
            	$post->frequency=Input::get('frequency');
            	$post->approve=Input::get('approve');
            	$post->save();

            	$msg ="Opportunity-". $id ." profile Successfully updated";
						Session::flash('success', $msg);
						return redirect::back();	
					}
			 
			 else {

			        $msg ="Opportunity-". $id ." profile updation failure..";
						 Session::flash('failure', $msg);
						 return redirect::back()->withErrors($validator);
			     }
		
		}
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}

  }
  public function delete_recruiter_opportunity($id){
  		$aauth = auth()->guard('admins');
		 
		 if($aauth->check()){
		 	
		 	
		 	$post= Post::findOrFail($id);

		 	 $post->delete();

		 	 $msg ="Opportunity - ". $id ." profile has been Successfully deleted";
				Session::flash('success', $msg);
				return redirect::back();
		 	
                
		 }
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
  }

  public function recuiter_details($id){
  		$recruiter= Recruiter::findOrFail($id);
		 		$perPage = 12;
		        $currentPage = Input::get('page') - 1;

		        $r_clients = $recruiter->clients->sortBy('Person_name');
		        $pagedData= $r_clients->slice($currentPage * $perPage, $perPage)->all();
		        $r_clients=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($r_clients), $perPage);
		        $r_clients->setPath('');

		        $r_Boutique = $recruiter->boutiques->sortBy('name_firm');
		        $pagedData= $r_Boutique->slice($currentPage * $perPage, $perPage)->all();
		        $r_Boutique=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($r_Boutique), $perPage);
		        $r_Boutique->setPath('');

		        $r_candidate = $recruiter->candidates->sortBy('First_name');
		        $pagedData= $r_candidate->slice($currentPage * $perPage, $perPage)->all();
		        $r_candidate=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($r_candidate), $perPage);
		        $r_candidate->setPath('');

		        $r_posts = $recruiter->posts->sortBy('Job_title');
		        $pagedData= $r_posts->slice($currentPage * $perPage, $perPage)->all();
		        $r_posts=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($r_posts), $perPage);
		        $r_posts->setPath('');

		        return \View::make('admin.recruiter_dashboard')
		        			->with('title', 'Recruiters Opportunities')
		        			->with('recruiter', $recruiter)
		        			->with('r_posts', $r_posts)
		        			->with('r_candidate', $r_candidate)
		        			->with('r_Boutique', $r_Boutique)
		        			->with('r_clients', $r_clients);

  }

public function client_list(){
  				// $clients=Client::where('admin_id', '=', '0')->where('recruiter_id', '=', '0')->get();

  				// $perPage = 15;
		    //     $currentPage = Input::get('page') - 1;

		    //     $pagedData= $clients->slice($currentPage * $perPage, $perPage)->all();
		    //     $clients=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($clients), $perPage);
		    //     $clients->setPath('');
  				$clients = Client::sortable()->paginate(20);

		        return \View::make('admin.client_list')->with('title', 'Client List')->with('clients', $clients);
  }

public function client_approve($id){
  	$aauth = auth()->guard('admins');
		 
		if($aauth->check()){
		 	
		 	
		 	$post= Post::findOrFail($id);

		 	 $post->approve = 1;
		 	 $post->save();

		 	 $msg ="Opportunity - ". $id ." profile has been Approved";
				Session::flash('success', $msg);
				return redirect::back();
		 	
                
		}
		else{

			return \View::make('home.userLogin')->with('title', 'User Login');
		}
}

public function client_dashboard_posts($id){
  	$client=Client::findOrFail($id);
  	
  				
  	$client_posts=Post::where('client_id', '=', $client->id)->sortable()->paginate(10);
  	return \View::make('admin.client_dashboard_posts')->with('client_posts', $client_posts)->with('title', 'Client Dashboard')->with('client', $client);
}

public function client_dashboard_users($id){

  		$client=Client::findOrFail($id);
  		$client_users=$client->users()->sortable()->paginate(10);	
  
  	return \View::make('admin.client_dashboard_users')->with('client_users', $client_users)->with('title', 'Client Dashboard')->with('client', $client);
}

}


$aauth = auth()->guard('admins');
$aid =$aauth->user()->id;
$admin = Admin::findOrFail($aid);
return $admin->recruiters;