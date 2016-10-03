
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
         
           <h1 class="title" style="border-top:none;">Employer Registration</h1>


        

         
       
          
                        @if (session('failure'))
                            <div style="width:80%; height:25px; color:red; text-align:center;">
                             {{ session('failure') }}
                            </div>
                        @endif

         <form action="/recruiter/create/client" method="POST" class="form-horizontal form1" enctype="multipart/form-data">
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


                      <hr />

                     

                      <p><strong style="font-size:180%;border-bottom:1px solid #c0c0c0;">  Enter Basic Details</strong></p>
                      

              

              <div class="input-container1">
                <input type="text" name="Type_of_opportunity" id="Type_of_opportunity" value="{{ old('Type_of_opportunity') }}" required="required"/>
                <label for="Type_of_opportunity"> Type of Opportunity</label>
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
                Brief Profile:<textarea rows="4" style="width:100%;" id="Brief_profile" name="Brief_profile"required="required">{{ old('Brief_profile') }}</textarea>
                
                
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
                      <input type="submit" name="Submit" class="btn btn-primary btn-md" />
                  </div>
                  <div class="col-sm-6">
                      <input type="reset" name="Reset" class="btn btn-info btn-md" />
                  </div>
            </div>

      </form>
   </div>
 
</div>




@endsection