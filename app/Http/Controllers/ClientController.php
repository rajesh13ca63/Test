<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use App\Admin;
use App\Post;
Use App\Logo;

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


class clientController extends Controller
{
    
    //redirect to client register page
    public function create()
    	{
            return \View::make('client.register')->with('title', 'Register');

    	}
    public function new_post()
        {
            if(auth()->guard('clients')->check()){
             $id= auth()->guard('clients')->user()->id;
             $users = User::all();
             $profile= Client::findOrFail($id);
             $posts = $profile->posts->where('client_id', $id);
           
             $profile= Client::findOrFail($id);
             return \View::make('client.post_job')
             ->with('title', 'Post JOb')
             ->with( 'profile', $profile)
            
             ->with('users', $users);
         }
            else{
                return ('<html>
                <head><title>Error</title></head>
                <body>
                <h1 style="marign:40%; border:3px inset red; padding:15px;font-size:20px; color:red;">Please Login to Update your Profile</h1>
                </body>
                </html>');
            }
        }        

    // client register success them redirect post-opportunity page
   
    public function store(Request $request)
    {
           
           $validator = Validator::make($request->all(), [
                'Person_name'   => 'required|unique:clients|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                'Org_name'      => 'required|unique:clients|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                'email'         => 'required|email|unique:users|unique:clients|unique:admins|unique:recruiters',
                'password'      => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6',
                
                'Key_skills'    => 'required|min:3',
                'Mobile_no'     => 'required|numeric|min:8',
                'Location'      => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                'Brief_profile' => 'required|between:10,255',
                'file'          => 'max:3000|mimes:tif,jpg,png,gif,jpeg', 
            ]);
        

	      if($validator->passes())
	        {

	          Client::create(array(
                'Person_name' =>Input::get('Person_name'),
                'Org_name' =>Input::get('Org_name'),
                'email' =>Input::get('email'),
                'password' =>Hash::make(Input::get('password')),
                'Type_of_opportunity' => Input::get('Type_of_opportunity'),
                'Key_skills' =>Input::get('Key_skills'),
                'Mobile_no' =>Input::get('Mobile_no'),
                'Location' =>Input::get('Location'),
                'Brief_profile' =>Input::get('Brief_profile')
                ));
         
                  $name=Input::get('Person_name');
                           $user = Client::where('Person_name', $name)->firstOrFail();
                          
                          //storing physically 

                           $file= $request->file('file');
                           
                           
                
                            
                         
                         // $filename = uniqid() . Input::file('file')->getClientOriginalName();
                         $filename = Input::file('file')->getClientOriginalName();
                         $file->move('logos', $filename);

                           // save the file details into the database

                         Logo::create(array(
                            'name' => $filename,
                            'client_id' => $user->id,
                            'logo_path' => '/logos/' . $filename,
                            'size' => $file->getClientSize(),
                            'mime' => $file->getClientMimeType(),
                            ));

                         Session::flash('success', 'Thanks for register with us. Premier Lounge Team will reach out to you shortly');
                 return redirect('/');
            }

          else{
                      Session::flash('failure', 'Please make Corrections');
                  return Redirect::back()
                   ->withInput($request->except('password'))
                   ->withErrors($validator);
                    
                }             
   
    }

    public function clientindex($id){
          if(auth()->guard('clients')->check()){
             $clientid= auth()->guard('clients')->user()->id;
        
                 if($clientid==$id){
                    $users = User::all();
                     $profile= Client::findOrFail($id);
                   $posts = $profile->posts->where('client_id', $id);
                 
                    $profile= Client::findOrFail($id);

                   
                        return \View::make('client.index')
                        ->with('title', 'Profile')
                        ->with('profile', $profile)
                        
                        ->with('users', $users);

                    }
            }
                else{

                    return ('please Login to search your opportunuties');
                }
        }


        //---------------------------------------------//
        //              Posting New Opportunity
        //---------------------------------------------//
public function post_job(Request $request)
    {
           
           $validator = Validator::make($request->all(), [
                'Job_title'         => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:3',
                'Experience_from'   => 'required',
                'Experience_to'     => 'required',
                'Type_of_opportunity'=> 'required',
                
                'KeySkills'         => 'required|min:3',
                'Project_duration'  => 'numeric',
                'Location'          => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/',
                'No_of_vacancies'   => 'required',
                'Notice_period'     => 'numeric',
                'Brief_summary'     => 'required|between:10,255',
                'budget_from'       => 'numeric',
                'budget_to'         => 'numeric',
                'frequency'         => 'required',
                
            ]);
        

          if($validator->passes())
            {
                $id= auth()->guard('clients')->user()->id;
              Post::create(array(
                'client_id'         =>$id,
                'Job_title'         =>Input::get('Job_title'),
                'Experience_from'   =>Input::get('Experience_from'),
                'Experience_to'     =>Input::get('Experience_to'),
                'Type_of_opportunity' => Input::get('Type_of_opportunity'),
                
                'KeySkills'         =>Input::get('KeySkills'),
                'Project_duration'  =>Input::get('Project_duration'),
                'Location'          =>Input::get('Location'),
                'No_of_vacancies'   =>Input::get('No_of_vacancies'),
                'Notice_period'     =>Input::get('Notice_period'),
                'Brief_summary'     =>Input::get('Brief_summary'),
                'budget_from'         =>Input::get('budget_from'),
                'budget_to'          =>Input::get('budget_to'),
                'frequency'      =>Input::get('frequency'),
                ));
         
        
                 if(auth()->guard('clients')->check()){
             $clientid= auth()->guard('clients')->user()->id;
        
                 if($clientid==$id){
                    $users = User::all();
                    $profile= Client::findOrFail($id);
                    
                   
                    $profile= Client::findOrFail($id);
                   
                        Session::flash('success', 'you are successfully uploaded the new opportunity post');

                        return \View::make('client.index')
                            ->with('title', 'Profile')
                            ->with('profile', $profile)
                          
                            ->with('users', $users);
                        

                    }
                 }
            }

          else{

                  return Redirect::back()
                   ->withInput()
                   ->withErrors($validator);
                    
                }             
   
    }


    //posted opportunities index
    public function posted_jobs(){
        if(auth()->guard('clients')->check()){
             $id= auth()->guard('clients')->user()->id;
        
                    $profile= Client::findOrFail($id);
                    
                     
                    $users = User::all();
                  
                        return \View::make('client.posted_job_index')
                        ->with('title', 'Posted Opportunities')
                        ->with('profile', $profile)
                      
                        ->with('users', $users);
        }
         else{
            return ( 'please login to see your posts');
         }   
    }
     
public function editProfile(Request $request, $id){
      if(auth()->guard('clients')->check()){
             $clientid= auth()->guard('clients')->user()->id;
        
                 if($clientid==$id){
                         $validator = Validator::make($request->all(), [
                            'Person_name'   => 'required|unique:clients|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                                                       
                            'Key_skills'    => 'required|min:3',
                            'Mobile_no'     => 'required|numeric|min:8',
                            'Location'      => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                            'Brief_profile' => 'required|between:10,255',
                            //'file'          => 'max:3000|mimes:tif,jpg,png,gif,jpeg', 
                        ]);
                        if($validator->passes()){
                                $client=Client::findOrFail($clientid);
                                $client->Person_name = Input::get('Person_name');
                                
                                $client->Type_of_opportunity = Input::get('Type_of_opportunity');
                                $client->Key_skills = Input::get('Key_skills');
                                $client->Mobile_no = Input::get('Mobile_no');
                                $client->Location = Input::get('Location');
                                $client->Brief_profile = Input::get('Brief_profile');
                                $client->save();


                        $users = User::all();
                        $profile= Client::findOrFail($id);
                        
                     

                        Session::flash('success', 'Your profile Successfully Updated.');


                        return \View::make('client.index')
                              ->with('title', 'Profile')
                              ->with('profile', $profile)
                              ->with('users', $users);
                    }
                    Return "Error while updating";
                 }
            Return "Please Login to update your profile.";
             }
      }
  public function interests($user_id){
      
                
            $cauth = auth()->guard('clients');
            $cid =$cauth->user()->id;
                
                //adding user_id and post_id in the pivote table post_user
                $client=Client::findOrFail($cid);
                 $interests = $client->users; 
                  $inte = collect([]);
                  foreach( $interests as $interest)
                  {
                         $inte->push($interest->id);
                  }

                  if($inte->contains($user_id)){
                        Session::flash('success', 'Your interest in this opportunity has been already shared with Premier Lounge team');
                        return Redirect::back();
                    }

                 else{
                
               

                $client->users()->attach($user_id);


                
                Session::flash('success', 'Your interest in this opportunity has been shared with Premier Lounge team');
                return Redirect::back();
            }
}





     
  public function edit_profile(){
        return \View::make('client.edit_profile')->with('title', 'Edit Profile');
  }

  public function update_profile(Request $request){
     
     $cauth = auth()->guard('clients');

        
         $cid = $cauth->user()->id;
         if($cauth->check()){

                 $validator = Validator::make($request->all(), [
                   'Person_name'   => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                                                       
                    'Key_skills'    => 'required|min:3',
                    'Mobile_no'     => 'required|numeric|min:8',
                    'Location'      => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4',
                    'Brief_profile' => 'required|between:10,255',
                            //'file'          => 'max:3000|mimes:tif,jpg,png,gif,jpeg', 
                        ]);
                if($validator->passes()){
                    $client=Client::findOrFail($cid);
                    $client->Person_name = Input::get('Person_name');
                    $client->Type_of_opportunity = Input::get('Type_of_opportunity');
                    $client->Key_skills = Input::get('Key_skills');
                    $client->Mobile_no = Input::get('Mobile_no');
                    $client->Location = Input::get('Location');
                    $client->Brief_profile = Input::get('Brief_profile');
                    $client->save();
                         //return " successfully updated";// \View::make('candidate.index')->with('title', 'Profile')->with('message', 'Successfully Updated your profile');
                        Session::flash('success', 'Your Profile Successfully Updated');
                        $url = '/client/Search_profiles/'.$cid;
                            return redirect($url);
                        
                   }
                    else{
                         return Redirect::back()
                            ->withInput()
                            ->withErrors($validator);
                        
                    }

         }
    else{

        Return \View::make('home.userLogin')->with('title', 'Login');
        }


    }
public function edit_post($id){
    $cauth = auth()->guard('clients');
    $cid = $cauth->user()->id;
    if($cauth->check()){
        $pid=Post::findOrFail($id);

            if($cid == $pid->client_id){
                return \View::make('client.post_edit')->with('title', 'Edit Post')->with('post', $pid);
            }
            else{
                return \View::make('home.userLogin')->with('title', 'Login');
            }
    }
     else{
                return \View::make('home.userLogin')->with('title', 'Login');
          }      
    }

public function update_post(Request $request, $post_id){
         $cauth = auth()->guard('clients');
    $cid = $cauth->user()->id;
    if($cauth->check()){
        $pid=Post::findOrFail($post_id);

        if($cid == $pid->client_id){
                $validator = Validator::make($request->all(), [
                        'Job_title'         => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:3',
                        'Experience_from'   => 'required',
                        'Experience_to'     => 'required',
                        'Type_of_opportunity'=> 'required',
                       
                        'KeySkills'         => 'required|min:3',
                        'Project_duration'  => 'numeric',
                        'Location'          => 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/',
                        'No_of_vacancies'   => 'required',
                        'Notice_period'     => 'numeric',
                        'Brief_summary'     => 'required|between:10,255',
                        'budget_from'       => 'numeric',
                        'budget_to'         => 'numeric',
                        'frequency'         => 'required',
                        
                    ]);
                if($validator->passes())
                    {
                        $pid->Job_title  =Input::get('Job_title');
                        $pid->Experience_from =Input::get('Experience_from');
                        $pid->Experience_to     =Input::get('Experience_to');
                        $pid->Type_of_opportunity =Input::get('Type_of_opportunity');
                       
                        $pid->KeySkills         =Input::get('KeySkills');
                        $pid->Project_duration  =Input::get('Project_duration');
                        $pid->Location          =Input::get('Location');
                        $pid->No_of_vacancies   =Input::get('No_of_vacancies');
                        $pid->Notice_period     =Input::get('Notice_period');
                        $pid->Brief_summary     =Input::get('Brief_summary');
                        $pid->budget_from       =Input::get('budget_from');
                        $pid->budget_to         =Input::get('budget_to');
                        $pid->frequency         =Input::get('frequency');
                        $pid->save();
                        
                 
                            $users = User::all();
                            $profile= Client::findOrFail($cid);
                            $posts = $profile->posts->where('client_id', $cid);
                            
                            $profile= Client::findOrFail($cid);
                           
                                Session::flash('success', 'Post updation successfull');

                                return \View::make('client.index')
                                    ->with('title', 'Profile')
                                    ->with('profile', $profile)
                                    
                                    ->with('users', $users);
                                

                          
                    }
                    else{
                        return Redirect::back()
                            ->withInput()
                            ->withErrors($validator);
                     }

                }

              else{

                       return \View::make('home.userLogin')->with('title', 'Login');
                        
                    }


        }
        else{
                    return \View::make('home.userLogin')->with('title', 'Login');
              } 

 }

 public function interested_profiles(){

    $cauth = auth()->guard('clients');
    $cid = $cauth->user()->id;
    if($cauth->check()){
        return \View::make('client.client_interested')->with('title', 'Interested profiles');
     }
     else{
                    return \View::make('home.userLogin')->with('title', 'user Login');
            }

 }
 public function new_profiles(){
    $cauth = auth()->guard('clients');
    
    if($cauth->check()){
        return \View::make('client.new_profiles')->with('title', 'New Profiles');
     }
     else{
                    return \View::make('home.userLogin')->with('title', 'user Login');
            }

 }

  public function  searching(Request $request){
        
            $query=Input::get('query');
        return Redirect::route('sprofiles', array('query' => $query));

   }

   public function searching_profiles($query){
            $cauth = auth()->guard('clients');

        if($cauth->check()){
                
                $profiles = User::search($query)->get();
        
                $perPage = 12;
                $currentPage = Input::get('page') - 1;
                $pagedData= $profiles->slice($currentPage * $perPage, $perPage)->all();
                $Sprofiles=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($profiles), $perPage);
                $Sprofiles->setPath('');

                return \View::make('client.search_profiles')->with('title', 'Search opportunities')->with('Sprofiles', $Sprofiles);

          } else{
            return \View::make('home.userLogin')->with('title', 'Login Page');
            }
   }

public function interested_experts($id){
      $cauth = auth()->guard('clients');

        if($cauth->check()){
                
                $post= Post::findOrFail($id);
                $posts_experts = $post->users;
        
                $perPage = 12;
                $currentPage = Input::get('page') - 1;
                $pagedData= $posts_experts->slice($currentPage * $perPage, $perPage)->all();
                $posts_experts=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($posts_experts), $perPage);
                $posts_experts->setPath('');

                return \View::make('client.post_experts')->with('title', 'Post Experts')->with('posts_experts', $posts_experts);

          } else{
            return \View::make('home.userLogin')->with('title', 'Login Page');
            }
}
  
}


