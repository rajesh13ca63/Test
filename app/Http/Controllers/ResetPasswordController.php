<?php
namespace App\Http\Controllers;

use App\User;
use App\Admin;
use App\Client;
use App\Recruiter;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Http\Requests;

class ResetPasswordController extends Controller
{
    public function resetPassword() {
        return view('resetpassword');

    }

    /* This method is used for send resetpassword link tp the register user 
     * at click on forgot password
     */
    public function sendPasswordLink() {

		// foreach ($emails as $email) {
		//    echo'<pre>'; print_r($email); echo '<pre>';

		// }
        // exit;
          	
        $data = array(
        'name' => "Joules to Watts",
        );

      	Mail::send('resetpasswordlink', $data, function ($message) {
       
        $message->from('rajeshkumargupta001@gmail.com', 'Joulestowatts');
       
        $message->to($emails)->subject('Joulestowatts');
        
        });
    }
}
