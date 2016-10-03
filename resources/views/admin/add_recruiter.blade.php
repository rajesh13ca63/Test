@extends('layouts.default1')
@section('content')
<div class="row">
   @include('admin.default')
</div>

<style type="text/css">
  .Ereg a{
    color:#f7f5ff;
    font-size:16px;
    float:right;
    opacity:0.5;
    margin-right:25px;
    margin-bottom:30px;
  }
  .Ereg a:hover{
    color:#fff;
    border:2px ridge #fff;
    background-color:#f7f5ff;
    padding:5px;
    text-decoration: none !important;
    opacity:1;
  }
</style>

<div class="container1" style="margin-top:30px; ">
  <div class="card1"></div>
  <div class="card1">  
        <h1 class="title" style="border-top:none;">Recruiter Registration</h1>
            @if (session('failure'))
                <div style="width:80%; height:25px; color:red; text-align:center;">
                 {{ session('failure') }}
                </div>
            @endif

        <form action="/admin/create/recruiter" method="POST" class="form-horizontal form1" enctype    ="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="input-container1">
                <input type="text" name="User_name" id="User_name" value="{{ old('User_name') }}" required="required"/>
                <label for="User_name">Name of Recruiter</label>
                <div class="bar"></div>
            </div>
            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                       <li>{{$errors->first('User_name', ':message')}}</li>
                    </ul>
                </div>
            @endif

            <div class="input-container1">
                <input type="text" name="email" id="email" value="{{ old('email') }}" required="required"/>
                <label for="email">Email Id</label>
                <div class="bar"></div>
            </div>

            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('email', ':message')}}</li>
                    </ul>
                </div>
            @endif
            <div class="input-container1">
                <input type="password" name="password" id="password" required="required"/>
                <label for="password">Password</label>
                <div class="bar"></div>
            </div>

            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('password', ':message')}}</li>
                    </ul>
                </div>
            @endif

            <div class="input-container1">
                <input type="password" name="password_confirmation" id="password_confirmation" required="required"/>
                <label for="password_confirmation"> Confirm Password</label>
                <div class="bar"></div>
            </div>
 
            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('password_confirmation', ':message')}}</li>
                    </ul>
                </div>
            @endif
            
            <div class="input-container1">
                <input type="text" name="Contact_No" id="Contact_No" value="{{ old('Contact_No') }}" required="required"/>
                <label for="Contact_No">Contact No</label>
                <div class="bar"></div>
            </div>
       
  
            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('Contact_No', ':message')}}</li>
                    </ul>
                </div>
            @endif

            <div class="input-container1">
                <input type="text" name="Address" id="Address" value="{{ old('Address') }}" required="required"/>
                <label for="Address">Address</label>
                <div class="bar"></div>
            </div>

            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('Address', ':message')}}</li>
                    </ul>
                </div>
            @endif
              
            <div class = "row">
                <div class="col-md-5 col-md-offset-1">
                      <input type="submit" name="Submit" class="btn btn-primary btn-md" />
                </div>
                <div class="col-md-5">
                      <input type="reset" name="Reset" class="btn btn-info btn-md" >
                </div>
            </div><br>
        </form>
    </div>
</div>
@endsection