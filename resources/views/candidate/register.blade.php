@extends('layouts.default1')

@section('content')
<style type="text/css">
  .Ereg a{
    color:#2da;
    font-size:16px;
    float:right;
    opacity:0.5;
    margin-right:2px;
    margin-bottom:0px;
    margin-top:0px;
    border:2px solid #2dffff;
    padding:3px;
  }
  .Ereg a:hover{
    color:#fff;
    border:2px ridge #333; 
    background-color:#33daff;
    padding:5px;
    text-decoration: none !important;
    opacity:1;
  }
  nav.navbar-webmaster ul.navbar-nav #active18 a{ background:#e0e0e0; border: 2px 0px 2px 0px #779c19; color:#0089ca;}
</style>


<script>

$(document).ready(function () {
    
  $("#Mobile_no").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 9 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });

    

    $("#Noticed_period").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 1 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });

    $("#Experience").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 1 ||event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if ((event.keyCode < 48 || event.keyCode > 57 ) && (event.keyCode < 96 || event.keyCode > 105)) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });

    $("#rate_from").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 10 ||event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if ((event.keyCode < 48 || event.keyCode > 57 ) && (event.keyCode < 96 || event.keyCode > 105)) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });

    $("#rate_to").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 10 ||event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if ((event.keyCode < 48 || event.keyCode > 57 ) && (event.keyCode < 96 || event.keyCode > 105)) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });

    $("#First_name").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 25 ||event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32)
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32)  {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if (event.keyCode < 65 || event.keyCode > 95 ) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });

    $("#Last_name").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 25 ||event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32)
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32)  {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if (event.keyCode < 65 || event.keyCode > 95 ) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });

   $("#Designation").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 50 ||event.keyCode == 46 || event.keyCode == 8
             || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 188 || event.keyCode == 189 || event.keyCode == 191 )
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 188 || event.keyCode == 189 || event.keyCode == 191)  {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if (event.keyCode < 65 || event.keyCode > 95 ) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });
   $("#Preffer_location").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 50 ||event.keyCode == 46 || event.keyCode == 8
             || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 188 || event.keyCode == 189 || event.keyCode == 191 )
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 188 || event.keyCode == 189 || event.keyCode == 191)  {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if (event.keyCode < 65 || event.keyCode > 95 ) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });

   $("#Basic_education").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 50 ||event.keyCode == 46 || event.keyCode == 8
             || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 188 || event.keyCode == 189 || event.keyCode == 191 )
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 188 || event.keyCode == 189 || event.keyCode == 191)  {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if (event.keyCode < 65 || event.keyCode > 95 ) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });

   $("#Masters").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 50 ||event.keyCode == 46 || event.keyCode == 8
             || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 188 || event.keyCode == 189 || event.keyCode == 191 )
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 188 || event.keyCode == 189 || event.keyCode == 191)  {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if (event.keyCode < 65 || event.keyCode > 95 ) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });
   $("#Certificates").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 50 ||event.keyCode == 46 || event.keyCode == 8
             || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 188 || event.keyCode == 189 || event.keyCode == 191 )
        {
            if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 188 || event.keyCode == 189 || event.keyCode == 191)  {
                // let it happen, don't do anything
            } else {
                // Ensure that it is a number and stop the keypress
                if (event.keyCode < 65 || event.keyCode > 95 ) {
                    event.preventDefault();
                }
            }
        }else{

            event.preventDefault();
        }          

    });


  });  

</script>

<div class="container1" style="margin-top:35px;">   
  <div class="card1"></div>
  <div class="card1">  
         <span class="Ereg"><a href="/client/register">Register as Employer </a></span>
          <span class="Ereg"><a href="/boutique/register">Register as Boutique Firm </a></span>
           <h1 class="title" style="border-top:none;">Candidate Register</h1>
       
          
                        @if (session('failure'))
                            <div style="width:80%; height:25px; color:red; text-align:center;">
                             {{ session('failure') }}
                            </div>
                        @endif

         <form action="/candidate/store" method="POST" class="form-horizontal form1" onsubmit="return checkform(this);" enctype="multipart/form-data">
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
                <div class="row">
                <div class="col-sm-5 form-group">                
                <div class="form-group" style="width:40%;margin-left:45px;font-size:15px; color:#808080;text-decoration:bolder;">
                Date of Birth :</div></div>
                <div class="col-sm-5 form-group">
                <input type="date" name="Dob" value="{{ old('Dob') }}" style="color:black; background-color:pink; height:35px; "/>
                </div>
                @if($errors->has())
                    <div class="error text-center" style="color:red;">
                        <ul>
                            <li>{{$errors->first('Dob', ':message')}}</li>
                        </ul>
                    </div>
                @endif
                </div>
               
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
                <input type="text" name="Mobile_no" id="Mobile_no" value="{{ old('Mobile_no') }}" required="required" size="10"/>
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
                <input type="number" name="Noticed_period" id="Noticed_period" value="{{ old('Noticed_period') }}" required="required" maxlength="2" max="80" min="00" size="2" />
                <label for="Noticed_period">Join within<span style="font-size:12px;">(in Days)</span></label>
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
                                                
                                            </ul>de
                                            
                                    </div>
                            @endif

            <div class="input-container1">
                <input type="number" name="Experience" id="Experience" value="{{ old('Experience') }}" min="0" required="required"/>
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

                    <div class="form-group">
                        <div class="col-sm-2 text-right" style="margin-top:22px; margin-left:5px">
                            <span style="width:80%;font-size:15px; color:#808080;text-decoration:bolder; margin-left:25px;">Expected Salary:</span>
                        </div>

                        <div class="col-sm-3">
                            From:<input type="number" placeholder="Rs."name="rate_from" id="rate_from" value="{{ old('rate_from') }}" min="0" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            To:<input type="number" placeholder="Rs."name="rate_to" id="rate_to" value="{{ old('rate_to') }}" min="0"class="form-control">
                        </div>
                                                  
                        <div class="col-sm-3" style="margin-top:18px;">
                              <select name="frequency" id="Consulting" value="{{ old('frequency') }}" style="height:35px; width:80%;" >
                                <!-- <option value="" style ="color:#f0f0f0;">Frequency</option> -->
                                <option value="annually">Annually</option>
                                <option value="hourly">Hourly</option>
                                <option value="monthly">Monthly</option>
                                <option value="weekly">Weekly</option>
                                <option value="one time">One Time</option>
                            </select>
                        </div>
                    </div>

                    @if($errors->has())
                        <div class="error text-center">
                            <ul>
                                <li>{{$errors->first('rate_from', ':message')}}</li>
                            </ul>
                        </div>
                    @endif

                    @if($errors->has())
                        <div class="error text-center">
                            <ul>
                               <li>{{$errors->first('rate_to', ':message')}}</li>
                            </ul>
                        </div>
                    @endif

                    @if($errors->has())
                        <div class="error text-center">
                            <ul>
                                <li>{{$errors->first('frequency', ':message')}}</li>
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
                <span style="width:80%;font-size:15px; color:#808080;text-decoration:bolder;"> Brief Profile(four line pitch for employers to understand about you):</span><textarea rows="4" style="width:100%;" id="Brief_profile" name="Brief_profile"required="required">{{ old('Brief_profile') }}</textarea>
                
                
            </div>

                          @if($errors->has())
                                    <div class="error text-center" style="color:red;">
                                         
                                            <ul>
                                               
                                                <li>{{$errors->first('Brief_profile', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                            @endif

            <div class="row" style="margin-top:25px;">
                <div class="col-sm-4 text-right" style="margin-right:10px;margin-top:10px;">
                   
                    <span id="txtCaptchaDiv" style="color:blue"></span> 
                    <input type="hidden" id="txtCaptcha" />
                  </div>
                  <div class="col-sm-6 test-center">
                    <input type="text" name="txtInput" id="txtInput" placeholder="enter the Captcha Value"size="20" style="height:50px;"/>
                    <span id="errors" style="color:red"></span>
                </div> 
            </div>

            <div class="row" style="margin:25px 0px 25px 0px;">
              <span style="font-weight:bold; "> Upload your Resume</span>
               <input type="file" name="file" id="choose-file" />
             
              
                              @if($errors->has())
                                          <div class=" col-sm-5 error test-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('file', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                                @endif
              </div>
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

                   

<script type="text/javascript">
    

      function checkform(theform){
      var why = "";

      if(theform.txtInput.value == ""){
      why += " Security Code Should not be empty";
      }
      if(theform.txtInput.value != ""){
      if(ValidCaptcha(theform.txtInput.value) == false){
      why += "Security code did not match.";
      }
      }
      if(why != ""){
      document.getElementById("errors").innerHTML = why;
      return false;
      }
      }

      //Generates the captcha function
      var code = "";
          var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

          for( var i=0; i < 7; i++ )
              code += possible.charAt(Math.floor(Math.random() * possible.length));

      document.getElementById("txtCaptcha").value = code;
      document.getElementById("txtCaptchaDiv").innerHTML = code;

      // Validate the Entered input aganist the generated security code function
      function ValidCaptcha(){
      var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
      var str2 = removeSpaces(document.getElementById('txtInput').value);
      if (str1 == str2){
      return true;
      }else{
      return false;
      }
      }

      // Remove the spaces from the entered and generated code
      function removeSpaces(string){
      return string.split(' ').join('');
      }

    
</script>



@endsection