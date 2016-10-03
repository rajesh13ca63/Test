
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
       
           <h1 class="title" style="border-top:none;">Boutique Registration</h1>
       
          
                        @if (session('failure'))
                            <div style="width:80%; height:25px; color:red; text-align:center;">
                             {{ session('failure') }}
                            </div>
                        @endif

         <form action="/recruiter/create/boutique" method="POST" class="form-horizontal form1" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="input-container1">
                <input type="text" name="name_firm" id="name_firm" value="{{ old('name_firm') }}" required="required"/>
                <label for="name_firm">Name of Firm</label>
                <div class="bar"></div>
              </div>
                                @if($errors->has())
                                    <div class="error text-center" style="color:red;">
                                            
                                              <ul>
                                                  <li>{{$errors->first('name_firm', ':message')}}</li>
                                                  
                                              </ul>
                                              
                                    </div>
                                    @endif

            
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
                <input type="text" name="website" id="website" value="{{ old('website') }}" required="required"/>
                <label for="website">Websites</label>
                <div class="bar"></div>
              </div>
                            @if($errors->has())
                                          <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('website', ':message')}}</li>
                                                
                                            </ul>
                                            
                                          </div>
                            @endif

              <div class="input-container1">
                <input type="text" name="contact_name" id="contact_name" value="{{ old('contact_name') }}" required="required"/>
                <label for="contact_name">Contact Person</label>
                <div class="bar"></div>
              </div>
                               @if($errors->has())
                                      <div class="error text-center" style="color:red;">                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('contact_name', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                                  @endif

              <div class="input-container1">
                <input type="number" name="contact_no" id="contact_no" value="{{ old('contact_no') }}" required="required"/>
                <label for="contact_no">contact Number</label>
                <div class="bar"></div>
              </div>
                              @if($errors->has())
                                           <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('contact_no', ':message')}}</li>
                                                
                                            </ul>
                                            
                                        </div>
                                @endif

              <div class="input-container1">
                <input type="number" name="head_counts" id="head_counts" value="{{ old('head_counts') }}" required="required"/>
                <label for="head_counts">Head Counts</label>
                <div class="bar"></div>
              </div>
                            @if($errors->has())
                                           <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('head_counts', ':message')}}</li>
                                                
                                            </ul>
                                            
                                        </div>
                              @endif
            <div class="input-container1">
                <input type="text" name="specialized_skills" id="specialized_skills" value="{{ old('specialized_skills') }}" required="required"/>
                <label for="specialized_skills">Specialized Skills</label>
                <div class="bar"></div>
              </div>
                            @if($errors->has())
                                           <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('specialized_skills', ':message')}}</li>
                                                
                                            </ul>
                                            
                                        </div>
                              @endif


            <div class="input-container1">
                <input type="text" name="address" id="address" value="{{ old('address') }}" required="required"/>
                <label for="address">Address</label>
                <div class="bar"></div>
            </div>
                             @if($errors->has())
                                           <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('address', ':message')}}</li>
                                                
                                            </ul>
                                            
                                        </div>
                              @endif
             

            <div class="input-container1">
                Brief Summary:<textarea rows="4" style="width:100%;" id="Brief_profile" name="Brief_profile"required="required">{{ old('Brief_profile') }}</textarea>
                
                
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
                      <input type="reset" value="Reset" class="btn btn-info btn-md" />
                  </div>
            </div>
        </form>

        
  </div>
 
</div>




@endsection