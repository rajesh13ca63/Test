<?php

namespace App\Http\Controllers;

use DB;
use App\Quotation;
use App\admins;

use Auth;
use App\User;
use App\Admin;
use App\Client;
use App\Recruiter;
use App\Http\Requests;
use App\Boutique;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
//use App\Http\Controllers\DB;

class LoginController extends Controller
{
 

    //---------------------------------------------
    //              USER LOG'S
    //---------------------------------------------

    public function userindex() {
            $auth = auth()->guard('users');
            $id = $auth->user()->id;


            if($auth->check()){

                
                $profile= User::findOrFail($id);
                return \View::make('candidate.index')->with('title', 'Profile')->with('profile', $profile);

            } 
        }

    public function usersLogin(Request $request){
        //This is admin login part
        // $email = $request['email'];
        // $password =$request['password'];//Hash::make(Input::get('password'));
        // $admin = DB::table('admins')
        //            ->where('email', $email)
        //            ->where('password', $password)
        //            ->where('admin', '1')
        //            ->first();

        
        // if(!empty($admin)) {

        //     return redirect('admin');
        // }
        
        //Create Session variable for access one page to another page


        $aauth = auth()->guard('admins');
        $rauth = auth()->guard('recruiters');
        $bauth = auth()->guard('boutiques');
        // Candidate Auth Checking and redirecting
        $uauth = auth()->guard('users');

        if($uauth->check()) {
            $id = $uauth->user()->id;
                return redirect('/user/Search_jobs/$id');
        }

        // Client Auth checking and redirecting
        $cauth= auth()->guard('clients');

        if($cauth->check()) {
            $id = $cauth->user()->id;
            $url = '/client/Search_profiles/'.$id;
            return redirect($url);
        }


        //attempt to login eight candidate or client
        $validator = Validator::make($request->all(), [
                'email'         => 'required|email',
                'password'      => 'required',
            ]);


        if($validator->passes()) {
            $input = Input::all();

            $credentials = [
                'email' =>  $input['email'],
                'password' =>  $input['password'],
            ];

            //candidate auth attempt
             $uauth->attempt($credentials); 
             $cauth->attempt($credentials);
             $aauth->attempt($credentials);
         
             $rauth->attempt($credentials);
             $bauth->attempt($credentials);
            

            if($uauth->check()){
                $id = auth()->guard('users')->user()->id;               
                $uurl ='/user/Search_jobs/'. $id;
                return redirect($uurl);
            }

            if ($cauth->check()) {
                 $id = $cauth->user()->id;              
                 $curl = '/client/Search_profiles/'.$id;
                 return redirect($curl);
             }

             if($aauth->check()){
                return redirect('/');
             }
             if($rauth->check()){
                return redirect('/');
             }
             if($bauth->check()){
              return redirect('/');
             }

            else{
            //redirect back
            Session::flash('failure', 'Email And Password Mismatch');
                return Redirect::back()
                       ->withInput($request->except('password'));

            }
        }
        
        else {
            return Redirect::back()
               ->withInput($request->except('password'))
               ->withErrors($validator);
            }
        } 



    public function userLogout(){
        $auth = auth()->guard('users');
        $auth->logout();
        if($auth->check()){
            return "You are Still loged in ";
        }else{
            return redirect('/')->with('message', 'Logged Out Successfully');
        }
    }

     public function userprofile(){
        if(auth()->guard('users')->check()){
             return auth()->guard('users')->user()->toArray();
        }else{
            return 'Please login to see your profile';
        }         
        
    }

    //---------------------------------------------
    //              CLIENTS LOG'S
    //---------------------------------------------

    public function clientLogin(Request $request) {


        $auth = auth()->guard('clients');

        $input = Input::all();
        if(count($input) > 0) {
            
            $credentials = [
                'email' =>  $input['email'],
                'password' =>  $input['password'],
            ];

            $auth->attempt($credentials)
            ; 
            if($auth->check()) {
                $id = $auth->user()->id;
                $url = '/client/profile/'.$id;
                return redirect($url);
            } else {
                echo 'Error';
            }
        } else {
            return view('home.index');
        }
    }


    public function clientLogout(){
        $auth = auth()->guard('clients');
        $auth->logout();
        if($auth->check()){
            return "You are Still loged in ";
        }else{
            return redirect('/')->with('message', 'Logged Out Successfully');
        }
    }

    public function clientprofile(){
        if(auth()->guard('clients')->check()){
             return auth()->guard('clients')->user()->toArray();
        }else{
            return 'Please login to see your profile';
        }         
        
    }


    //---------------------------------------------
    //              ADMIN LOG'S
   //---------------------------------------------
   public function adminLogin(){
        $auth = auth()->guard('admins');

        if($auth->check()){
            return redirect('/admin/dashboard');
            }


       $input = Input::all();
        if(count($input) > 0){
            
            $credentials = [
                'email' =>  $input['email'],
                'password' =>  $input['password'],
            ];

             $auth->attempt($credentials); 
             if($auth->check()){
                
                return redirect('/admin/dashboard');
            } else {
                echo 'Error';
            }
        } else {
            return view('home.index');
        }
    } 

    public function adminLogout(){
        $auth = auth()->guard('admins');
        $auth->logout();
        if($auth->check()){
            return "You are Still loged in ";
        }else{
            return redirect('/')->with('message', 'Logged Out Successfully');
        }
    }


    public function profile(){
        if(auth()->guard('admin')->check()){
             pr(auth()->guard('admin')->user()->toArray());
        }         
        if(auth()->guard('user')->check()){
            pr(auth()->guard('user')->user()->toArray());
        } 
    }

public function recruiterLogout(){
        $auth = auth()->guard('recruiters');
        $auth->logout();
        if($auth->check()){
            return "You are Still loged in ";
        }else{
            return redirect('/')->with('message', 'Logged Out Successfully');
        }
    }
public function boutiqueLogout(){
        $auth = auth()->guard('boutiques');
        $auth->logout();
        if($auth->check()){
            return "You are Still loged in ";
        }else{
            return redirect('/')->with('message', 'Logged Out Successfully');
        }
    }

public function password_reset(){

      return \View::make('home.password')->with('title', 'Password Reset');
}
public function password_update(Request $request){

        $validator = Validator::make($request->all(), [
                  'password'  =>  'required|min:6|confirmed', 
                  'password_confirmation' => 'required|min:6',
                  ]);
        if($validator->passes())
              {
                      $aauth = auth()->guard('admins');
                      $rauth = auth()->guard('recruiters');
                      $uauth = auth()->guard('users');
                      $cauth = auth()->guard('clients');
                      $bauth = auth()->guard('boutiques');

                    
                       if($uauth->check()){
                              $id = auth()->guard('users')->user()->id;
                             $user = User::findOrFail($id);

                             $user->password = Hash::make(Input::get('password'));
                             $user->save();

                             Session::flash('success', 'Your New Password Is Updated');
            
                              return Redirect::route('Search_jobs', array('id' => $id));
                          }

                          //client auth attempt 
                           

                          if ($cauth->check()) {
                               $id = $cauth->user()->id;
                               $client = Client::findOrFail($id);

                             $client->password = Hash::make(Input::get('password'));
                             $client->save();
                            Session::flash('success', 'Your New Password Is Updated');
                             $curl = '/client/Search_profiles/'.$id;
                              return redirect($curl);
                           }

                           if($aauth->check()){
                              $id = $aauth->user()->id;
                               $admin = Admin::findOrFail($id);

                             $admin->password = Hash::make(Input::get('password'));
                             $admin->save();
                             Session::flash('success', 'Your New Password Is Updated');
                             return redirect('/'); 
                            }


                           if($rauth->check()){
                              $id = $rauth->user()->id;
                               $recruiter = Recruiter::findOrFail($id);

                             $recruiter->password = Hash::make(Input::get('password'));
                             $recruiter->save();
                             Session::flash('success', 'Your New Password Is Updated');
                             return redirect('/'); 
                           }

                           if($bauth->check()){
                              $id = $bauth->user()->id;
                              $boutique = Boutique::findOrFail($id);

                             $boutique->password = Hash::make(Input::get('password'));
                             $boutique->save();
                             Session::flash('success', 'Your New Password Is Updated');
                             return redirect('/'); 
                           }


                           else{
                           //redirect back

                           Session::flash('failure', 'Athentication Resticted, Please Contact JoulestoWatts.');
                                return redirect('/');
                          }

                      }
                      
                      else {
                               return Redirect::back()
                                 ->withInput($request->except('password'))
                                 ->withErrors($validator);
                          }

        }

}