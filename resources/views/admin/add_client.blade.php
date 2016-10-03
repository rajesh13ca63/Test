@extends('layouts.default1')
@section('content')

<div class="row">
    @include('admin.default')
</div>
<style type="text/css">
  .Ereg a {
    color:#f6f6f6;
    font-size:20px;
    float:right;
    opacity:0.5;
    margin-right:25px;
    margin-bottom:0px;
  }
  .Ereg a:hover {
    color:#fff;
    border:2px ridge #fff;
    background-color:#22d;
    padding:5px;
    text-decoration: none !important;
    opacity:1;
  }
</style>

<div class="container1" style="margin-top:35px; background-color:#fff;">
    <div class="card1"></div>
        <div class="card1" >  
            <h1 class="title" style="border-top:none;">Employer Registration</h1>
                @if (session('failure'))
                    <div style="width:80%; height:25px; color:red; text-align:center;">
                     {{ session('failure') }}
                    </div>
                @endif

        <form action="/admin/create/client" method="POST" class="form-horizontal form1"    enctype="multipart/form-data" style="background-color:#fff;margin:10px; padding:10px;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="input-container1">
                <input type="text" name="Person_name" id="Person_name" value="{{ old('Person_name') }}" required="required"/>
                <label for="Person_name">Point of Contact</label>
                <div class="bar"></div>
            </div>
            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                       <li>{{$errors->first('Person_name', ':message')}}</li>
                    </ul>
                </div>
            @endif

            <div class="input-container1">
                <input type="text" name="email" id="email" value="{{ old('email') }}" 
                required="required"/>
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
           
            <p><strong style="font-size:20px;border-bottom:1px solid #c0c0c0; margin-left:25px">  Enter Basic Details</strong></p>
                      
            <div class="input-container1">
                <input type="text" name="Org_name" id="Org_name" value="{{ old('Org_name') }}" required="required"/>
                <label for="Org_name">Organization Name</label>
                <div class="bar"></div>
            </div>
       
            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('Org_name', ':message')}}</li>
                    </ul>
                </div>
            @endif
           
            <div style="width:80%;margin:15px 0px 15px 32px;font-size:15px; text-decoration:bolder;">
                <div style="text-decoration:bolder;color:#808080;font-size:15px;">Type of Opportunity: </div>
                <select name="Type_of_opportunity" id="Consulting" value="{{ old('Type_of_opportunity') }}" style="height:30px; width:40%;" >
                    <option value="Full time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Consulting">Consulting</option>
                    <option value="Assignment Based">Assignment Based</option>
                    <option value="Out Sourcing">Out Sourcing</option>
                </select>
                <div class="bar"></div>
            </div>

            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('Type_of_opportunity', ':message')}}</li>
                    </ul>
                </div>
            @endif

            <div class="input-container1">
                <input type="text" name="Key_skills" id="Key_skills" value="{{ old('Key_skills') }}" required="required"/>
                <label for="Key_skills"> Key Skills Required </label>
                <div class="bar"></div>
            </div>

            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('Key_skills', ':message')}}</li>
                    </ul>
                </div>
            @endif

            <div class="input-container1">
                <input type="text" name="Mobile_no" id="Mobile_no" value="{{ old('Mobile_no') }}" required="required"/>
                <label for="Mobile_no"> Contact Number </label>
                <div class="bar"></div>
            </div>

            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('Mobile_no', ':message')}}</li>
                    </ul>
                </div>
            @endif

            <div class="input-container1">
                <input type="text" name="Location" id="Location" value="{{ old('Location') }}" required="required"/>
                <label for="Location"> Location </label>
                <div class="bar"></div>
            </div>
                    
            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('Location', ':message')}}</li>
                    </ul>
                </div>
            @endif
     
            <div class="input-container1">
                <div style="width:80%;font-size:15px; color:#808080;text-decoration:bolder;"> Brief Profile:
                </div>
                <textarea rows="4" style="width:100%;" id="Brief_profile" name="Brief_profile"required="required">{{ old('Brief_profile') }}</textarea>
            </div>

            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('Brief_profile', ':message')}}</li>
                    </ul>
                </div>
            @endif

            <div class = "row">
                <div class="col-sm-5 col-sm-offset-1">
                    <input type="submit" name="Submit" class="btn btn-primary btn-md" />
                </div>
                <div class="col-sm-5">
                    <input type="reset" name="Reset" class="btn btn-info btn-md" />
                </div>
            </div>
        </form>
   </div>
</div>
@endsection