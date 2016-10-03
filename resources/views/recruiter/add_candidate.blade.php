
@extends('layouts.default1')


@section('content')
<div class="row">
  
    @include('recruiter.default')
  
</div>
<style type="text/css">
  .Ereg a{
    color:#f6f6f6;
    font-size:16px;
    float:right;
    opacity:0.5;
    margin-right:25px;
    
    margin-bottom:0px;
  }
  .Ereg a:hover{
    color:#fff;
    border:2px ridge #fff;
    background-color:#2a2;
    padding:5px;
    text-decoration: none !important;
    opacity:1;
  }
</style>

<div class="container1" style="margin-top:35px;">
  <div class="card1"></div>
  <div class="card1">  
        
           <h1 class="title" style="border-top:none;">Candidate Register</h1>
       
          
                        @if (session('failure'))
                            <div style="width:80%; height:25px; color:red; text-align:center;">
                             {{ session('failure') }}
                            </div>
                        @endif

         <form action="/recruiter/create/add_candidate" method="POST" class="form-horizontal form1"enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="input-container1">
                <input type="text" name="First_name" id="First_name" value="{{ old('First_name') }}" required="required"/>
                <label for="First_name">First Name</label>
                <div class="bar"></div>
              </div>
                                @if($errors->has())
                                    <div class="error text-center" style="color:red;">
                                            
                                              <ul>
                                                  <li>{{$errors->first('First_name', ':message')}}</li>
                                                  
                                              </ul>
                                              
                                    </div>
                                    @endif

              <div class="input-container1">
                <input type="text" name="Last_name" id="Last_name" value="{{ old('Last_name') }}" required="required"/>
                <label for="Last_name">Last Name</label>
                <div class="bar"></div>
              </div>

                                  @if($errors->has())
                                    <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('Last_name', ':message')}}</li>
                                                
                                            </ul>
                                           
                                    </div>
                                     @endif

              <div class="form-group" style="width:80%;margin-left:32px;font-size:15px; color:#808080;text-decoration:bolder;">
                         Date of Birth :<input type="date" name="Dob" value="{{ old('Dob') }}" />
                          
                </div>
                                    @if($errors->has())
                                    <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('Dob', ':message')}}</li>
                                                
                                            </ul>
                                          
                                    </div>
                                     @endif

               
               <div style="width:80%;margin-left:32px;font-size:15px; text-decoration:bolder;">
                 <span style="text-decoration:bolder;color:#808080;"> Gender     : </span>
                 <select name="Gender" id="male" value="{{ old('Gender') }}" style="height:30px; width:50%;" >
                    <option>Male</option>
                    <option>Female</option>
                    <option>Others</option>
                 
                </select>
               
              </div>


       
                      


              <div class="input-container1">
                <input type="text" name="email" id="email" value="{{ old('email') }}" required="required"/>
                <label for="email">Email</label>
                <div class="bar"></div>
              </div>
                                @if($errors->has())
                                    <div class="error text-center" style="color:red;" >
                                            
                                              <ul>
                                                  <li>{{$errors->first('email', ':message')}}</li>
                                                  
                                              </ul>
                                              
                                    </div>
                                  @endif


              <div class="input-container1">
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


              <div class="input-container1">
                <input type="password" name="password_confirmation"id="password_confirmation" required="required"/>
                <label for="password_confirmation">Confirm Password</label>
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

              <div class="input-container1">
                <input type="text" name="Mobile_no" id="Mobile_no" value="{{ old('Mobile_no') }}" required="required"/>
                <label for="Mobile_no">Contact Number</label>
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
                <input type="text" name="Designation" id="Designation" value="{{ old('Designation') }}" required="required"/>
                <label for="Designation">Designation</label>
                <div class="bar"></div>
              </div>
                              @if($errors->has())
                                           <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('Designation', ':message')}}</li>
                                                
                                            </ul>
                                            
                                        </div>
                                @endif

              <div class="input-container1">
                <input type="number" name="Noticed_period" id="Noticed_period" value="{{ old('Noticed_period') }}" required="required"/>
                <label for="Noticed_period">Notice Period<span style="font-size:12px;">(in Days)</span></label>
                <div class="bar"></div>
              </div>
                            @if($errors->has())
                                           <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('Noticed_period', ':message')}}</li>
                                                
                                            </ul>
                                            
                                        </div>
                              @endif
            <div style="width:80%;margin:15px 0px 15px 32px;font-size:15px; text-decoration:bolder;">
                 <span style="text-decoration:bolder;color:#808080;"> Type of Opportunity     : </span>
                 <select name="Type_opportunity" id="Consulting" value="{{ old('Type_opportunity') }}" style="height:30px; width:40%;" >
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
                                               
                                                <li>{{$errors->first('Type_opportunity', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                            @endif

            <div class="input-container1">
                <input type="number" name="Experience" id="Experience" value="{{ old('Experience') }}" required="required"/>
                <label for="Experience">Experience<span style="font-size:12px;">(in years)</span></label>
                <div class="bar"></div>
              </div>
                            @if($errors->has())
                                           <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('Experience', ':message')}}</li>
                                                
                                            </ul>
                                            
                                        </div>
                              @endif


            <div class="input-container1">
                <input type="text" name="Key_skills" id="Key_skills" value="{{ old('Key_skills') }}" required="required"/>
                <label for="Key_skills">Key Skills</label>
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
                <input type="number" name="Exp_ctc" id="Exp_ctc" value="{{ old('Exp_ctc') }}" required="required"/>
                <label for="Exp_ctc">Expected CTC</label>
                <div class="bar"></div>
            </div>

                          @if($errors->has())
                                           <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('Exp_ctc', ':message')}}</li>
                                                
                                            </ul>
                                            
                                        </div>
                            @endif
              <div class="input-container1">
                <input type="text" name="Preffer_location" id="Preffer_location" value="{{ old('Preffer_location') }}" required="required"/>
                <label for="Preffer_location">Preffer Location</label>
                <div class="bar"></div>
            </div>

                        @if($errors->has())
                                           <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('Preffer_location', ':message')}}</li>
                                                
                                            </ul>
                                            
                                        </div>
                         @endif

            <div class="input-container1">
                <input type="text" name="Basic_education" id="Basic_education" value="{{ old('Basic_education') }}" required="required"/>
                <label for="Basic_education">Basic Qualification</label>
                <div class="bar"></div>
            </div>
                        
            <div class="input-container1">
                <input type="text" name="Masters" id="Masters" value="{{ old('Masters') }}" Placeholder="Masters (if any)" />
                <div class="bar"></div>
            </div>

            <div class="input-container1">
                <input type="text" name="Certificates" id="Certificates" Placeholder="Certificates (if any)"value="{{ old('Certificates') }}"/>
                
                <div class="bar"></div>
            </div>


            <div class="input-container1">
                <span style="width:80%;font-size:15px; color:#808080;text-decoration:bolder;"> Brief Profile:</span><textarea rows="4" style="width:100%;" id="Brief_profile" name="Brief_profile"required="required">{{ old('Brief_profile') }}</textarea>
                
                
            </div>

                          @if($errors->has())
                                    <div class="error text-center" style="color:red;">
                                         
                                            <ul>
                                               
                                                <li>{{$errors->first('Brief_profile', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                            @endif


           
            <div class = "row">
                  <div class="col-sm-6">
                      <input type="submit" value="Register" class="btn btn-primary btn-md" />
                  </div>
                  <div class="col-sm-6">
                      <input type="reset" value="Clear" class="btn btn-primary btn-md" />
                  </div>
            </div>
        </form>

        
  </div>
 
</div>



@endsection