<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\Uinterest;
use App\Resume;
use App\Boutique;
use App\Binterest;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Response;

class BoutiqueController extends Controller
{
    //get Registration form 
    public function get_register(){
    	return \View::make('boutique.register')->with('title', 'Boutique Register');
    }

    //New Boutique Register
    public function boutique_store(Request $request){

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
			            'Brief_profile' => 'required|between:4,255',
   
			            ]);

    		if($validator->passes())
			 {
			 	Boutique::create(array(
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

			 	 return redirect('/')
			               ->with('title', 'home')
			               ->with('message', 'Thank You for Registering, Premier Lounge team will reach out to you shortly');
			 }
			 else {

			        return Redirect::back()
			            ->withInput($request->except('password'))
			            ->withErrors($validator);
			     }

    }

    public function edit_profile(){
        return \View::make('boutique.edit_profile')->with('title', 'Profile Edit');
    }

    public function update_profile(Request $request){

    			$validator = Validator::make($request->all(), [

			            'name_firm' 			=> 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4|max:45',
			            'specialized_skills' 	=> 'required|min:3',
			            'address'   			=> 'required|min:4',
			            'website'				=> 'required',
			            'contact_name'			=> 'required|Regex:/\A(?!.*[:;]-\))[ -~]+\z/|min:4|max:45',
			            'contact_no' 			=> 'required|between:8,12',
			            'head_counts'			=>	'integer',	
			            'Brief_profile' 		=> 'required|between:4,255',
   			            ]);

    		if($validator->passes())
			 {
			 	$bauth = auth()->guard('boutiques');
				$id = $bauth->user()->id;
				if($bauth->check()){

							$boutique = Boutique::findOrFail($id);

			                $boutique->name_firm = Input::get('name_firm');
			                $boutique->specialized_skills = Input::get('specialized_skills');
			                $boutique->address = Input::get('address');
			                $boutique->website = Input::get('website');
			                $boutique->contact_name = Input::get('contact_name');
			                $boutique->contact_no = Input::get('contact_no'); 
			                $boutique->head_counts = Input::get('head_counts');
			                $boutique->Brief_profile = Input::get('Brief_profile');
			                $boutique->update();
			         
			            return \view::make('/boutique/edit_profile')->with('title', 'Offered Opportunities');

				}
				else{
					return \View::make('home.userLogin')->with('title', 'Login');
				}
			 }

			else {

			        return Redirect::back()
			            ->withInput($request->except('password'))
			            ->withErrors($validator);
			}

    }

  public function index(){

  		return \view::make('boutique.index')->with('title', 'Offered Opportunities');
  }

  public function sentInterests($post_id){
  		$bauth = auth()->guard('boutiques');
  		$bid =$bauth->user()->id;
  			
  			//adding user_id and post_id in the pivote table post_user
  			$boutique=Boutique::findOrFail($bid);
  		     $interests = $boutique->posts; 
		      $inte = collect([]);
		      foreach( $interests as $interest)
		      {
		             $inte->push($interest->id);
		      }

		      if($inte->contains($post_id)){
			      	Session::flash('success', 'Your interest in this opportunity has been already shared with Premier Lounge team');
	  				return Redirect::back();
		      	}

		     else{
  			
  			
		    //adding user_id and post_id in the pivote table boutique_post
  			$boutique->posts()->attach($post_id);

  			
  			Session::flash('success', 'Your interest in this opportunity has been shared with Premier Lounge team');
  			return Redirect::back();
  		}
  }

  public function boutiqueInterested(){
  	$bauth = auth()->guard('boutiques');
           


        if($bauth->check()){
   		
   			return \View::make('boutique.boutique_interested')->with('title', 'Interested Offers');

   		  } else{
   			return \View::make('home.userLogin')->with('title', 'Login');
   			}
  }

  public function new_jobs(){
   			$bauth = auth()->guard('boutiques');
           


        if($bauth->check()){
   		
   			return \View::make('boutique.new_jobs')->with('title', 'New Opportunities');

   		  } else{
   			return \View::make('home.userLogin')->with('title', 'Login Page');
   			}
   }

   public function  searching(Request $request){
   		
   			$query=Input::get('query');
   		return Redirect::route('searching_posts', array('query' => $query));

   }

   public function searching_jobs($query){
   			$bauth = auth()->guard('boutiques');

   		if($bauth->check()){
   				
   				$posts = Post::search($query)->get();
		
		        $perPage = 12;
		        $currentPage = Input::get('page') - 1;
		        $pagedData= $posts->slice($currentPage * $perPage, $perPage)->all();
		        $Sposts=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($posts), $perPage);
		        $Sposts->setPath('');

		        return \View::make('boutique.search_posts')->with('title', 'Search opportunities')->with('Sposts', $Sposts);

   		  } else{
   			return \View::make('home.userLogin')->with('title', 'Login Page');
   			}
   }
}
