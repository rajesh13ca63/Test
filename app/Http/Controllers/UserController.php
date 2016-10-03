<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Auth;
use App\User;
use App\Post;

use App\Resume;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 

use sortable;

use Response;

// This is a usere controller
class UserController extends Controller
{
    public function create()
    {
		return \View::make('candidate.register')->with('title', 'Register');
    }

	public function userlogin()
		{
			return \View::make('home.userLogin')->with('title', 'User Login');
		}
	public function store(Request $request)
		    {

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
			            'rate_from'   => 'integer',
			            'rate_to'	=> 'integer',
			            'Preffer_location' => 'required',
			            'Designation' => 'required',
			            'Noticed_period' => 'integer',
			            'Experience' => 'regex:/[-+]?[0-9]*\.?[0-9]+/', 
			            'Basic_education' => 'required',
			            'Brief_profile' => 'required|between:4,255',
			            'file'      => 'required|min:1|max:1000|mimes:doc,docx,pdf,txt' 
			            ]);
			        if($validator->passes())
			        {
			        	if(Input::hasFile('file')) {
			                User::create(array(
			                'First_name' =>Input::get('First_name'),
			                'Last_name' =>Input::get('Last_name'),
			                'Dob' =>Input::get('Dob'),
			                'Gender' =>Input::get('Gender'),
			                'email' =>Input::get('email'),
			                'password' =>Hash::make(Input::get('password')),
			                'Address' =>Input::get('Address'),
			                'Type_opportunity' =>Input::get('Type_opportunity'),
			                'Mobile_no' =>Input::get('Mobile_no'),   
			                'Key_skills' =>Input::get('Key_skills'),
			                'rate_from' =>Input::get('rate_from'),
			                'rate_to'	=>Input::get('rate_to'),
			                'frequency'	=>Input::get('frequency'),
			                'Preffer_location' =>Input::get('Preffer_location'),
			                'Designation' =>Input::get('Designation'),
			                'Noticed_period' =>Input::get('Noticed_period'),
			                'Experience' =>Input::get('Experience'),
			                'Basic_education' =>Input::get('Basic_education'),
			                'Masters' =>Input::get('Masters'),
			                'Certificates' =>Input::get('Certificates'),
			                'Brief_profile' =>Input::get('Brief_profile')
			                ));

						   $name=Input::get('First_name');
						   $user = User::where('First_name', $name)->firstOrFail();
						  
						  //storing physically 

						   $file= $request->file('file');
						   
						   
				
						   	
						 
						//$filename = uniqid() . Input::file('file')->getClientOriginalName();
						$filename = Input::file('file')->getClientOriginalName();
						$file->move('resumes', $filename);

						// save the file details into the database

						Resume::create(array(
						 	'name' => $filename,
						  	'user_id' => $user->id,
						 	'resume_path' => '/public/resumes/' . $filename,
						 	'size' => $file->getClientSize(),
						 	'mime' => $file->getClientMimeType(),
						));
				 			         	          
			            return redirect('/')
			                        ->with('title', 'home')
			                        ->with('message', 'Your profile has been created successfully, login to look for excellent opportunities');
			            }
			            else {

			          		return Redirect::back()
			                       ->withInput($request->except('password'))
			                       ->withErrors($validator);
			          }
			        }
			        else{

			            return Redirect::back()
			            ->withInput($request->except('password'))
			            ->withErrors($validator);
			            
			        }
			                    
			}

	public function userindex($id) { 
		$auth = auth()->guard('users');
		$jobs = DB::table('posts')->get();
		
		if($auth->check()) {
		    $userid = $auth->user()->id;

			if($userid == $id) {
			 	$profile = User::findOrFail($id);
	            return \View::make('candidate.index')->with('title', 'Profile')
	                                                 ->with('profile', $profile)
	                                                 ->with('jobs', $jobs);
	                                                 
	        }
		} else {

			return ('<html>
				<head><title>Error</title></head>
				<body>
				<h1 style="marign:40%; border:3px inset red; padding:15px;font-size:20px; color:red;">Please Login to Update your Profile</h1>
				</body>
				</html>');
		}
	}

	Public function editProfilePage(){

		return \View::make('candidate.edit_profile')->with('title', 'Edit Profile');
	}


	Public function editProfile(Request $request) {
		$uauth = auth()->guard('users');
		$userid = Input::get('user_id');
		$id = $uauth->user()->id;
		if($uauth->check()){
 	            $validator = Validator::make($request->all(), [

			            'First_name' => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4|max:45',
			            'Last_name'  => 'alpha',
			            'Dob'       => 'date|required',
			            //'email'   =>  'required|email|unique:users|unique:clients',
			            'Address'   => 'required|min:4',
			            'Mobile_no' => 'required|between:8,13',
			            'Key_skills' => 'required|min:3',
			            'rate_from'   => 'integer',
			            'rate_to'	=> 'integer',
			            'Preffer_location' => 'required',
			            'Designation' => 'required',
			            'Noticed_period' => 'integer',
			            'Experience' => 'integer', 
			            'Basic_education' => 'required',
			            'Brief_profile' => 'required|between:4,255'
			            // 'resume'      => 'required|mimes:doc,docs,pdf,txt' 
			            ]);
			        if($validator->passes())
			        {
			            $user = User::findOrFail($id);

			                $user->First_name = Input::get('First_name');
			                $user->Last_name = Input::get('Last_name');
			                $user->Dob = Input::get('Dob');
			                $user->Gender = Input::get('Gender');
			              //  $user->email = Input::get('email');
			               
			                $user->rate_from = Input::get('rate_from');
			                $user->rate_to = Input::get('rate_to');
			                $user->frequency = Input::get('frequency');
			                $user->Type_opportunity =Input::get('Type_opportunity');
			                $user->Address = Input::get('Address');
			                $user->Mobile_no = Input::get('Mobile_no'); 
			                $user->Key_skills = Input::get('Key_skills');
			            
			                $user->Preffer_location = Input::get('Preffer_location');
			                $user->Designation = Input::get('Designation');
			                $user->Noticed_period = Input::get('Noticed_period');
			                $user->Experience = Input::get('Experience');
			                $user->Basic_education = Input::get('Basic_education');
			                $user->Masters = Input::get('Masters');
			                $user->Certificates = Input::get('Certificates');
			                $user->Brief_profile =  Input::get('Brief_profile');
			                $user->save();
							
			            $uauth = auth()->guard('users');
  						$uid =$uauth->user()->id;
  						Session::flash('success', 'Your Profile Successfully updated.');
  					
  					return Redirect::route('Search_jobs', array('id' => $uid));


			             //return " successfully updated";// \View::make('candidate.index')->with('title', 'Profile')->with('message', 'Successfully Updated your profile');
   			       }
			        else{
			        	
			         return Redirect::back()
			         ->withInput()
			           ->withErrors($validator);
			            
			        }

		}
	else{

		Return '<html><head><title>Error</title></head><body><h1 style="marign:40%; border:3px inset red; padding:15px;font-size:20px; color:red;">Please Login to Update your Profile</h1></body></html>';
	    }


	}

	public function executeSearch() {
		/* $keywords =  Input::all();

		$posts = Post::all();

		$s = new \Illuminate\Database\Eloquent\Collection();
		foreach($posts as $p)
		{
			

			if(Str::contains( Str::lower($p->KeySkills), Str::lower($keywords))
				$s -> add ($p);
			
		}
	*/
		 return \View::make('candidate.searchindex')->with('serachPosts', $s);
	}
	
  public function sentInterests($post_id) {
  		$uauth = auth()->guard('users');
  		$uid =$uauth->user()->id;
  			
  			//adding user_id and post_id in the pivote table post_user
  			  $user=User::findOrFail($uid);
  		      $interests = $user->posts; 
		      $inte = collect([]);
		      foreach( $interests as $interest)
		      {
		             $inte->push($interest->id);
		      }

		      if($inte->contains($post_id)) {
			      	Session::flash('success', 'Your interest in this opportunity has been already shared with Premier Lounge team');
	  				return Redirect::back();
		      	}

		     else{
  			
  			$user=User::findOrFail($uid);

  			$user->posts()->attach($post_id);


  			$profile= User::findOrFail($uid);
  			Session::flash('success', 'Your interest in this opportunity has been shared with Premier Lounge team');
  			return Redirect::back();
  		}

  }
   public function userInterested(){
   			$uauth = auth()->guard('users');
           


        if($uauth->check()) {
   		
   			return \View::make('candidate.user_interested')->with('title', 'user interested');

   		  } else{
   			return \View::make('home.userLogin');
   			}
   }

   public function newJobs(){
   			$uauth = auth()->guard('users');
           


        if($uauth->check()){
   		
   			return \View::make('candidate.new_jobs')->with('title', 'new opportunities');

   		  } else{
   			return \View::make('home.userLogin')->with('title', 'Login Page');
   			}
   }

   public function  searching(Request $request){
   		
   			$query=Input::get('query');
   			if(isset($query) && !empty($query)) {
   		        return Redirect::route('searching', array('query' => $query));
   		    } else {
   		    	return \View::make('candidate.new_jobs')->with('title', 'new opportunities');
   		    }

   }

   public function searching_jobs($query){
   			$uauth = auth()->guard('users');

   		if($uauth->check()){
   				
   				$posts = Post::search($query)->sortable()->get();
		
		        $perPage = 12;
		        $currentPage = Input::get('page') - 1;
		        $pagedData= $posts->slice($currentPage * $perPage, $perPage)->all();
		        $Sposts=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($posts), $perPage);
		        $Sposts->setPath('');

		        return \View::make('candidate.search_posts')->with('title', 'Search opportunities')->with('Sposts', $Sposts);

   		  } else{
   			return \View::make('home.userLogin')->with('title', 'Login Page');
   			}
   }
}

