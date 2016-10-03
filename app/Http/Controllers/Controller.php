<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use View;
use Auth;
use App\User;
use App\Admin;
use App\Client;
use App\Recruiter;
use File;
use App\Post;
use App\Resume;
use App\Logo;
use App\Boutique;
use App\Binterest;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
	  public function __construct()
		  {
		    //its just a dummy data object.
		    $uauth = auth()->guard('users');
    		$cauth = auth()->guard('clients');
    		$aauth = auth()->guard('admins');
    		$rauth = auth()->guard('recruiters');
    		$bauth = auth()->guard('boutiques');

    		$dposts = Post::orderBy('created_at', 'asc')->take(15)
                ->get();
            $dprofiles = User::orderBy('created_at', 'asc')->take(15)
                ->get();

            $user="";
            $admin="";
            $client="";
            $recruiter="";
            $boutique="";

            	if($uauth->check())
            	  {
		            $id = $uauth->user()->id;
		            $user= User::findOrFail($id);
		           }
		         if($cauth->check())
		          {
		            $id = $cauth->user()->id;
		            $client= Client::findOrFail($id);
		          }
		         if($aauth->check())
		          {
		            $id = $aauth->user()->id;
		            $admin= Admin::findOrFail($id);
		          }
		         if($rauth->check())
		          {
		            $id = $rauth->user()->id;
		            $recruiter= Recruiter::findOrFail($id);
		           }
		         if($bauth->check())
		          {
		            $id = $bauth->user()->id;
		            $boutique= Boutique::findOrFail($id);
		           }

		       //Searching posts related to boutique key skills
		       if($bauth->check()){
			        $boutiqueid = $bauth->user()->id;
					$boutique = Boutique::findOrFail($boutiqueid);
					// User interested Posted Opportunities
			        $posts = $boutique->posts;
			        $perPage = 12;
			        $currentPage = Input::get('page') - 1;
			        $pagedData= $posts->slice($currentPage * $perPage, $perPage)->all();
			        
			        $bposts=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($posts), $perPage);
			        $bposts->setPath('');
			        View::share('bposts', $bposts);
			        
			        // User key skills matching posted opportunities
			        $matchingPosts = Post::search($boutique->specialized_skills)->get();
			        $perPage = 12;
			        $currentPage = Input::get('page') - 1;
			        $pagedData= $matchingPosts->slice($currentPage * $perPage, $perPage)->all();
			        
			        $mposts=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($matchingPosts), $perPage);
			        $mposts->setPath('');
			        View::share('mposts', $mposts);
			        

		        }  

		        
		        // Searching default posts related to candidate skills

		        if($uauth->check()){
			        $userid = $uauth->user()->id;
					$user = User::findOrFail($userid);
					// User interested Posted Opportunities
			        $posts = $user->posts;
			        $perPage = 12;
			        $currentPage = Input::get('page') - 1;
			        $pagedData= $posts->slice($currentPage * $perPage, $perPage)->all();
			        
			        $uposts=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($posts), $perPage);
			        $uposts->setPath('');
			        View::share('uposts', $uposts);
			        
			        // User key skills matching posted opportunities
			        $matchingPosts = Post::search($user->Key_skills)->get();
			        $perPage = 12;
			        $currentPage = Input::get('page') - 1;
			        $pagedData= $matchingPosts->slice($currentPage * $perPage, $perPage)->all();
			        
			        $mposts=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($matchingPosts), $perPage);
			        $mposts->setPath('');
			        View::share('mposts', $mposts);


			           

		        } 
		     // Searching default profiels related to client skills
		        if($cauth->check()){
			        $clientid = $cauth->user()->id;
					$client = Client::findOrFail($clientid);
					// User interested Posted Opportunities
			        $profiles = $client->users;
			        $perPage = 12;
			        $currentPage = Input::get('page') - 1;
			        $pagedData= $profiles->slice($currentPage * $perPage, $perPage)->all();
			        
			        $cprofiles=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($profiles), $perPage);
			        $cprofiles->setPath('');
			        View::share('cprofiles', $cprofiles);
			        
			        // User key skills matching posted opportunities
			        $mprofiles = User::search($client->Key_skills)->get();
			        $perPage = 12;
			        $currentPage = Input::get('page') - 1;
			        $pagedData= $mprofiles->slice($currentPage * $perPage, $perPage)->all();
			        
			        $mprofiles=new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($mprofiles), $perPage);
			        $mprofiles->setPath('');
			        View::share('mprofiles', $mprofiles);
			        

		        }


			    
               // Sharing is caring
		    	View::share('uauth', $user);
		    	View::share('cauth', $client);
		    	View::share('aauth', $admin);
		    	View::share('rauth', $recruiter);
		    	View::share('bauth', $boutique);
		    
		    	
		    	View::share('dposts', $dposts);
		    	View::share('dprofiles', $dprofiles);
		    	


		  }
	
}


