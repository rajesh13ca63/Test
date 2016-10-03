@extends('layouts.default1')

@section('content')

<style type="text/css">

  nav.navbar-webmaster ul.navbar-nav #active17 a{ background:#e0e0e0; border: 2px 0px 2px 0px #779c19; color:#0089ca;}

</style>
<div style="width:100%;background-image:  url('/images/background.jpg');background-repeat:repeat-y;">
<div  style="height:10px; background-color:#0089ca; border:1px outset #0089ca; margin-bottom:75px;"class="container-fluid"></div>
<div class="container" style="margin-bottom:0px; padding-bottom:75px;">
  <div class="card"></div>
  <div class="card">
        <h1 class="title">Login</h1>

                        @if (session('failure'))
                            <div style="width:80%; height:25px; color:red; text-align:center;">
                             {{ session('failure') }}
                            </div>
                        @endif

        <form action="/candidateLogin" method="POST" class="form-horizontal form">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="input-container">
                <input type="text" name="email" id="Username" value="{{ old('email') }}" required="required"/>
                <label for="Username">Email</label>
                <div class="bar"></div>
              </div>
                                @if($errors->has())
                                    <div class="error text-center" style="color:red;" >
                                            
                                              <ul>
                                                  <li>{{$errors->first('email', ':message')}}</li>
                                                  
                                              </ul>
                                              
                                    </div>
                                    @endif

              <div class="input-container">
                <input type="password" name="password"id="Password" required="required"/>
                <label for="Password">Password</label>
                <div class="bar"></div>
              </div>
                            @if($errors->has())
                                    <div class="error text-center" style="color:red;">
                                            
                                              <ul>
                                                  <li>{{$errors->first('password', ':message')}}</li>
                                                  
                                              </ul>
                                              
                                    </div>
                            @endif

              <div class="text-align:center">
               <span style="width:100px;margin-left:75px;padding-right:15px;float:left;"> <input type="submit" value="Login" class="btn btn-primary" /></span>
               <span style="width:100px;margin-right:15px;float:left;"><input type="reset" value="reset" class="btn btn-primary"  /> </span>
             </div><br/>

              <div class="footer"><a href="candidate/forgotpassword">Forgot your password?</a></div>
        </form>

        <p><span style="color:#e0e0e0;float:right;text-align:center;padding-top:15px 0px 15px 0px; margin-right:25px;"><a href="/candidate/register" style="color:#71ccb0">New User Please Register With Us</a></span></p>
  </div>
 
</div>

</div>


@endsection

 
