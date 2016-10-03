<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<!--========================================================
                          HEADER
=========================================================-->
<header id="header">
        <nav class="navbar navbar-webmaster" >
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/" ><img src="{{ URL::asset('/images/logo.jpg') }}" alt="Logo" style="position:absolute;left:15;top:0;bottom:0;width:8%;background:IMAGEURL;height:IMAGEHEIGHT;z-index:1;box-shadow:1px 1px 5px  #cccaca" /></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li id="active1"><a href="/">Home<span class="sr-only">(current)</span></a></li>
                        <li id="active2"><a href="/FAQ">FAQ's </a></li>
                        <li id="active3"><a href="/advantages">Advantage</a></li>
                        <li><a href="http://www.joulestowatts.com/" target="_blank">About Us</a></li>
                        @if( !empty($uauth) )
                            
                            <li id="active4"> <a href="/user/Search_jobs/{{ $uauth->id }}"> Search Opportunities</a></li>

                            <li class="dropdown active5">
                                <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i>{{ $uauth->First_name }} {{ $uauth->Last_name }} <span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                    <li><a href="#"><span id="pop"class="profileView glyphicon glyphicon-log-in" style="margin-left:5px;"> View Profile</span></a>
                                    </li>
                                    <li><a href="/candidate/editProfilePage"><span id="pop "class="profileEdit glyphicon glyphicon-log-in" style="margin-left:5px;"> Edit Profile</span></a></li>
                                    <li><a href="/user/password_reset"><span id="pop "class="changePassword glyphicon glyphicon-log-in" style="margin-left:5px;"> Change Password</span></a></li>
                                    
                                    <li><a href="/userlogout"><span class="glyphicon glyphicon-log-in" style="margin-left:5px;"> Logout</span></a>
                                    </li>
                                </ul>
                            </li>
                        @elseif( !empty($bauth) )
                            
                            <li class="active7"> <a href="/boutique/Search_jobs"> Search Opportunities</a></li>

                            <li class="dropdown active5">
                                <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i>{{ $bauth->name_firm }}  <span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                    <li><a href="#"><span id="pop"class="bprofileView glyphicon glyphicon-log-in" style="margin-left:5px;"> View Profile</span></a>
                                    </li>
                                    <li><a href="/boutique/edit/profile"><span id="pop "class="profileEdit glyphicon glyphicon-log-in" style="margin-left:5px;"> Edit Profile</span></a></li>
                                    <li><a href="/user/password_reset"><span id="pop "class="changePassword glyphicon glyphicon-log-in" style="margin-left:5px;"> Change Password</span></a></li>
                                    
                                    <li><a href="/boutiquelogout"><span class="glyphicon glyphicon-log-in" style="margin-left:5px;"> Logout</span></a>
                                    </li>
                                    
                                                      
                                </ul>
                            </li>
                        @elseif( !empty($aauth))

                         <li class="active9"> <a href="/admin/dashboard"> Admin Dashboard</a></li>
                            <li class="dropdown active5">
                                <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i>{{ $aauth->name }}<span class="caret"></span></a>
                               
                                <ul class="dropdown-menu">
                                                                                   
                                    <li><a href="/user/password_reset"><span id="pop "class="changePassword glyphicon glyphicon-log-in" style="margin-left:5px;"> Change Password</span></a></li>
                                    
                                    <li><a href="/adminlogout"><span class="glyphicon glyphicon-log-in" style="margin-left:5px;"> Logout</span></a>
                                    </li>
                                    
                                                      
                                </ul>
                            </li>
                        @elseif( !empty($rauth))

                        <li class="active11"> <a href="/recruiter/dashboard"> Recruiter Dashboard</a></li>
                            <li class="dropdown active5">
                                <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i>{{ $rauth->User_name }} <span class="caret"></span></a>
                                
                                <ul class="dropdown-menu">
                                                                                   
                                    <li><a href="/user/password_reset"><span id="pop "class="changePassword glyphicon glyphicon-log-in" style="margin-left:5px;"> Change Password</span></a></li>
                                    
                                    <li><a href="/recruiterlogout"><span class="glyphicon glyphicon-log-in" style="margin-left:5px;"> Logout</span></a>
                                    </li>
                                    
                                                      
                                </ul>
                            </li>
                        @elseif( !empty($cauth))
                            <li class="active13"> <a href="/client/Search_profiles/{{ $cauth->id}}">Search Profiles</a></li>
                            <li class="active14"> <a href="/client/post_job">Post Opportunities</a></li>
                            <li class="active15"> <a href="/client/post_job/index"> Posted Opportunities</a></li>
                            <li class="dropdown active5">
                                <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i>{{ $cauth->Org_name }} <span class="caret"></span></a>
                                
                                <ul class="dropdown-menu">
                                    <li><a href="#"><span id="pop "class="cprofileView glyphicon glyphicon-log-in" style="margin-left:5px;"> View Profile</span></a>
                                    </li>
                                    <li><a href="/client/edit_profile"><span id="pop "class="orgProfileEdit glyphicon glyphicon-log-in" style="margin-left:5px;"> Edit Profile</span></a></li>
                                    <li><a href="/user/password_reset"><span id="pop "class="ochangePassword glyphicon glyphicon-log-in" style="margin-left:5px;"> Change Password</span></a></li>
                                    
                                    <li><a href="/clientlogout"><span class="glyphicon glyphicon-log-in" style="margin-left:5px;"> Logout</span></a>
                                    </li>
                                    
                                                      
                                </ul>
                            </li>
                        @else
                            <li id="active17"><a href="/candidatelogin"><span class=" glyphicon glyphicon-log-in"> </span> Login</a></li>
                            <li id="active18"><a href="/candidate/register"><span class="glyphicon glyphicon-user"> </span> Register</a></li>
                        @endif

                      </ul>
                    
                </div>
            </div>
        </nav>
</header>
<!-- This is simple form reset password form-->
<hr>
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Forgot Password?</h2>
                          <p>You can reset your password here.</p>
                            <div class="panel-body">
                              
                             <form action="sendpasswordlink" method="POST">
                                <input type="hidden" name="_method" value="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                      
                                      <input id="emailInput" placeholder="email address" class="form-control" oninvalid="setCustomValidity('Please enter a valid email address!')" onchange="try{setCustomValidity('')}catch(e){}" required="" type="email">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
                                  </div>
                                </fieldset>
                              </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


