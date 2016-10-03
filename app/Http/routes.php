<?php
use App\Admin;
use App\User;
use App\Client;
use App\Recruiter;
use App\Post;
use Illuminate\Support\Facades\Input;



Route::group(['middleware' => 'web'], function () {
//Route::get('/', function () {
//    return view('welcome');
// });
// This route is work for forget password link
Route::get('candidate/forgotpassword', 'ResetPasswordController@resetPassword');
Route::post('candidate/sendpasswordlink', 'ResetPasswordController@sendPasswordLink');
  

// Main Route
Route::get('/' , 'defaultController@defaultMenu');
Route::get('/FAQ', 'defaultController@faq');
Route::get('/advantages', 'defaultController@advantages');
Route::get('/user/password_reset', 'LoginController@password_reset');
Route::put('/user/password_update', 'LoginController@password_update'); 
Route::put('/recruiter/password_update', 'LoginController@recruiter');
Route::get('/user/interested/{id}', 'defaultController@user_interest');

// User Related
Route::get('/candidate/register', 'UserController@create');
Route::get('/user/Search_jobs/{id}', array('as' => 'Search_jobs', 
                                            'uses' => 'UserController@userindex'));
Route::get('/candidatelogin', 'UserController@userlogin');
Route::get('/candidate/interested_jobs', 'UserController@userInterested');
Route::get('/candidate/new_jobs', 'UserController@newJobs');
Route::get('/candidate/interest/{postid}', 'UserController@sentInterests');
Route::get('/userlogout', 'LoginController@userLogout');
Route::get('/userprofile', 'LoginController@userprofile');
Route::get('/candidate/editProfilePage', 'UserController@editProfilePage');


Route::put('/candidate/edit_profile', 'UserController@editProfile', [ 'except' => ['userindex', 'create', 'store'] ]);
Route::resource('/candidate/password/edit', 'UserController@PasswordEdit');



Route::post('/candidate/store', 'UserController@store');
Route::post('/candidateLogin', 'LoginController@usersLogin');
Route::post('/candidate/login', 'UserController@login');
Route::post('/candidate/offer_jobs/search', 'UserConteroller@executeSearch');
Route::post('/searching/offer/opportunities', 'UserController@searching');
Route::get('/searching/offer/opportunities/{query}', array('as' => 'searching',
                                          'uses' => 'UserController@searching_jobs'));



//Client Related 
Route::get('/clientprofile', 'LoginController@clientprofile');
Route::get('/clientlogout', 'LoginController@clientLogout');
Route::get('/client/Search_profiles/{id}', array('as' => 'Search_profiles',
                                                  'uses' => 'ClientController@clientindex'));
Route::get('/client/interested/{id}', 'ClientController@interests');
Route::get('/client/register',  'ClientController@create');  
Route::get('/client/post_job', 'ClientController@new_post');
Route::get('/client/post_job/index', 'ClientController@posted_jobs');
Route::get('/client/edit_profile', 'ClientController@edit_profile');
Route::get('/client/post_edit/{id}', 'ClientController@edit_post'); 
Route::get('/client/interested_profiles', 'ClientController@interested_profiles');
Route::get('/client/new_profiles', 'ClientController@new_profiles');
Route::get('/client/post/profiles/{id}', 'clientController@interested_experts');


Route::post('/client/store', 'ClientController@store');
Route::post('/client/login', 'ClientController@login');
Route::post('/client/post', 'ClientController@post_job');
Route::put('/client/update_profile', 'ClientController@update_profile');
Route::put('/client/post/{id}', 'ClientController@update_post');


Route::post('/search/profiles', 'ClientController@searching');
Route::get('/search/profiles/{query}', array('as' => 'sprofiles',
                                          'uses' => 'ClientController@searching_profiles'));


// Admin Related
Route::get('/adminlogout', 'LoginController@adminLogout');
Route::get('/admin/dashboard', array('as' => 'aDashboard',
                              'uses'=>'AdminController@dashboard'));

Route::get('/admin/create/recruiter', 'AdminController@create_recruiter');
Route::get('/admin/create/client', 'AdminController@create_client');
Route::get('/admin/create/candidate', 'AdminController@create_candidate');
Route::get('/admin/create/boutique', 'AdminController@create_boutique');
Route::get('/admin/create/post', 'AdminController@create_post');
Route::get('/admin/posted/recruiter/list', 'AdminController@posted_recruiter_list');
Route::get('/admin/recruiter/details/{id}', array('as' => 'rClients',
                                                   'uses' => 'AdminController@recruiter_client_details' ));
Route::get('/admin/recruiter/boutique/{id}', array('as' => 'rBoutique',
                                                   'uses' => 'AdminController@recruiter_boutique_details' ));
// Route::get('/admin/recruiter/details/{id}', array('as' => 'rClients',
//                                                    'uses' => 'AdminController@recruiter_details' ));
Route::get('/admin/recruiter/candidate/{id}', array('as' => 'rCandidate',
                                                   'uses' => 'AdminController@recruiter_candidate_details' ));
Route::get('/admin/recruiter/opportunity/{id}', array('as' => 'rOpportunity',
                                                   'uses' => 'AdminController@recruiter_opportunity_details' ));
Route::get('/admin/recruiter/{id}', 'AdminController@recuiter_details');
Route::get('/admin/client/list', 'AdminController@client_list');
Route::get('/admin/clint/dashboard/{id}/posts', 'AdminController@client_dashboard_posts');
Route::get('/admin/clint/dashboard/{id}/users', 'AdminController@client_dashboard_users');


Route::post('/admin/create/recruiter', 'AdminController@add_recruiter');
Route::post('/admin/create/client', 'AdminController@add_client');
Route::post('/admin/create/add_candidate', 'AdminController@add_candidate');
Route::post('/admin/create/boutique', 'AdminController@add_boutique');
Route::post('/admin/create/post', 'AdminController@add_post');
Route::post('/admin/recruiter/posts/{id}', 'AdminController@recruiter_posts');

Route::put('/admin/recruiter/edit_profile/{id}', 'AdminController@edit_recruiter' );
Route::put('/admin/recruiter/client/edit_profile/{id}', 'AdminController@edit_recruiter_client');
Route::put('/admin/recruiter/boutique/edit_profile/{id}', 'AdminController@edit_recruiter_boutique');
Route::put('/admin/recruiter/candidate/edit_profile/{id}', 'AdminController@edit_recruiter_candidate');
Route::put('/admin/recruiter/opportunity/edit_profile/{id}', 'AdminController@edit_recruiter_opportunity');
Route::put('/admin/client/approve/{id}', 'AdminController@client_approve');


Route::delete('/admin/recruiter/delete_profile/{id}', 'AdminController@delete_recruiter');
Route::delete('/admin/recruiter/client/delete_profile/{id}', 'AdminController@delete_recruiter_client');
Route::delete('/admin/recruiter/boutique/delete_profile/{id}', 'AdminController@delete_recruiter_boutique');
Route::delete('/admin/recruiter/candidate/delete_profile/{id}', 'AdminController@delete_recruiter_candidate');
Route::delete('/admin/recruiter/opportunity/delete_profile/{id}', 'AdminController@delete_recruiter_opportunity');


//Recruiter Related
Route::get('/recruiterlogout', 'LoginController@recruiterLogout');
Route::get('//recruiter/dashboard', 'RecruiterController@dashboard');
Route::get('/recruiter/create/client', 'RecruiterController@create_client');
Route::get('/recruiter/create/candidate', 'RecruiterController@create_candidate');
Route::get('/recruiter/create/boutique', 'RecruiterController@create_boutique');
Route::get('/recruiter/create/post', 'RecruiterController@create_post');

Route::post('/recruiter/create/client', 'RecruiterController@add_client');
Route::post('/recruiter/create/add_candidate', 'RecruiterController@add_candidate');
Route::post('/recruiter/create/boutique', 'RecruiterController@add_boutique');
Route::post('/recruiter/create/post', 'RecruiterController@add_post');

//Boutique Related
Route::get('/boutique/register', 'BoutiqueController@get_register');
Route::get('/boutiquelogout', 'LoginController@boutiqueLogout' );
Route::get('/boutique/edit/profile', 'BoutiqueController@edit_profile');
Route::get('/boutique/Search_jobs', array('as' => 'boutique_earch_jobs', 
                                            'uses' => 'BoutiqueController@index'));
Route::get('/boutique/interest/{postid}', 'BoutiqueController@sentInterests');
Route::get('/boutique/interested_jobs', 'BoutiqueController@boutiqueInterested');
Route::get('/boutique/new_jobs', 'BoutiqueController@new_jobs');


Route::post('/boutique/register', 'BoutiqueController@boutique_store');
Route::put('/boutique/edit_profile', 'BoutiqueController@update_profile');

Route::post('/searching/opportunities', 'BoutiqueController@searching');
Route::get('/searching/opportunities/{query}', array('as' => 'searching_posts',
                                          'uses' => 'BoutiqueController@searching_jobs'));




Route::get('/posting', 'defaultController@demo');

Route::post('/logo/upload', function(){
  return "successfully testing auto complete form after file is selected";
});


//Route::put('/candidate/edit', 'UserController@editProfile');
Route::get('admindashbord', 'AdminController@dashboard');

//Route::get('/admin', function() {
    // $auth = auth()->guard('admins');
   
    // $credentials = [
    //     'email' =>  'vikas@gmail.com',
    //     'password' =>  'vikas',
    //  ];
    //     $auth->attempt($credentials);
    // if ($auth->check()) {
        //return redirect('admin/dashboard');
    //} else {
    //    return 'Not Success';    
    //}
   //return redirect('admin/dashboard');
//});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('/test', function(){
 $post=Client::where('admin_id', '!=', '0')->get();
 foreach($post as $p){
  echo $p. "<br/>";
 }
});

Route::get('/insert', 'ClientController@insert');

Route::auth();

Route::get('/home', 'HomeController@index');

//These routes are used for get candidates list
/*Rout for All Student Information */
Route::get('allcandidates', function(){
    return view('admin/candidatelist');
});
Route::post('/getCandidateList', 'ListController@AllCandidateInfo');

});
