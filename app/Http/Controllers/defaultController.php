<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Admin;
use App\Client;
use App\Recruiter;

use App\Post;
use App\Resume;
use App\Boutique;
use App\Binterest;
use App\Logo;
use Searchy;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class defaultController extends Controller
{
    public function defaultMenu(){

       		return view('home.index')->with('title', 'J2W PL');
        }

    public function faq(){
        return view('home.faqs')->with('title', 'J2W FAQs');
    }
    public function advantages(){
        return view('home.advantages')->with('title', 'J2W PL Advantage');
    }

    public function user_interest($post_id){
    	  $aauth = auth()->guard('admins');
        $rauth = auth()->guard('recruiters');
        $uauth = auth()->guard('users');
        $cauth = auth()->guard('clients');
        $bauth = auth()->guard('boutiques');

       if($bauth->check()){
            
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

       if($uauth->check()){
                        
                
                $uid =$uauth->user()->id;
                  
                  //adding user_id and post_id in the pivote table post_user
                  $user=User::findOrFail($uid);
                     $interests = $user->posts; 
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
                  
                  $user=User::findOrFail($uid);

                  $user->posts()->attach($post_id); 


                  $profile= User::findOrFail($uid);
                  Session::flash('success', 'Your interest in this opportunity has been shared with Premier Lounge team');
                  return Redirect::back();
                }
          }

      /*  if($uauth->check()){
        	   
           $uid =$uauth->user()->id;
            Uinterest::create(array(
                          'user_id' => $uid,
                          'post_id' => $pid,
                          ));
            $profile= User::findOrFail($uid);
            Session::flash('success', 'You are Successfully sent interest');
            return Redirect::route('Search_jobs', array('id' => $uid));

          }

*/



         if($rauth->check()){
         	  return redirect::back(); 
         }


        if($aauth->check()){
        	return redirect::back(); 
        }

        if($cauth->check()){
        	$id = $cauth->user()->id;
               $url = '/client/Search_profiles/'.$id;
                return redirect($url);
        }


        else {
        	return \View::make('home.userLogin')->with('title', 'Login');
        }
    }   

}
