@extends('layouts.default1')

@section('content')
<style type="text/css">
  .Ereg a{
    color:#f6f6f6;
    font-size:16px;
    float:right;
    opacity:0.5;
    margin-right:25px;
    
    margin-bottom:25px;
  }
  .Ereg a:hover{
    color:#fff;
    border:2px ridge #fff;
    background-color:#2a2;
    padding:10px;
    text-decoration: none !important;
    opacity:1;
  }
    
  nav.navbar-webmaster ul.navbar-nav .active5 a { background:#e0e0e0; border: 2px 0px 2px 0px #779c19; color:#0089ca;}

</style>

<script>

$(document).ready(function () {
    

    // Allow to only insert 2 digits for noticed period within 

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

    // rectrict to enter only 10 digit in Mobile number input  field
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
    
    // Allow to only insert 2 digits for experience 
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

    // name ristrictions

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

  //Last Name ristrictions
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

//Designation ristrictions
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

//Preffered Location ristrictions
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

//Basic Education ristrictions
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
//Masters ristrictions
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

//Certificates ristrictions
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
          <h1 class="title">Edit Your Profile</h1>
       
         
                        @if (session('failure'))
                            <div style="width:80%; height:25px; color:red; text-align:center;">
                             {{ session('failure') }}
                            </div>
                        @endif

         <form action="/candidate/edit_profile" method="POST" class="form-horizontal form1" onsubmit="return checkform(this);" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      


              <div class="input-container1">
                <input type="text" name="First_name" id="First_name"
                             value="@if(!empty(old('First_name'))){{{old('First_name')}}}@else{{$uauth->First_name}}@endif" required="required"/>
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
                <input type="text" name="Last_name" id="Last_name" value="@if(!empty(old('Last_name'))){{{old('Last_name')}}}@else{{$uauth->Last_name}}@endif"required="required"/>
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

             <div class="form-group" style="width:40%;margin-left:32px;font-size:15px; color:#808080;text-decoration:bolder;">
                         Date of Birth :<input type="date" name="Dob" value="{{$uauth->Dob}}" style="height:35px" />
                          
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
                 <select name="Gender" id="male" value="@if(!empty(old('Gender'))){{{old('Gender')}}}@else{{$uauth->Gender}}@endif" style="height:30px; width:100px;" >
                    <option>Male</option>
                    <option>Female</option>
                    <option>Others</option>
                 
                </select>
               
              </div>


               
                      


           <!--   <div class="input-container1">
                <input type="text" name="email" id="email" value="@if(!empty(old('email'))){{{old('email')}}}@else{{$uauth->email}}@endif" required="required"/>
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

        -->
              
              <div class="input-container1">
                <input type="text" name="Address" id="Address" value="@if(!empty(old('Address'))){{{old('Address')}}}@else{{$uauth->Address}}@endif" required="required"/>
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
                <input type="text" name="Mobile_no" id="Mobile_no" value="@if(!empty(old('Mobile_no'))){{{old('Mobile_no')}}}@else{{$uauth->Mobile_no}}@endif" required="required"/>
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
                <input type="text" name="Designation" id="Designation" value="@if(!empty(old('Designation'))){{{old('Designation')}}}@else{{$uauth->Designation}}@endif" required="required"/>
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
                <input type="number" name="Noticed_period" id="Noticed_period" value="@if(!empty(old('Noticed_period'))){{{old('Noticed_period')}}}@else{{$uauth->Noticed_period}}@endif" required="required"/>
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
                 <select name="Type_opportunity" id="Consulting" value="@if(!empty(old('Type_opportunity'))){{{old('Type_opportunity')}}}@else{{$uauth->Type_opportunity}}@endif" style="height:30px; width:40%;" >
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
                <input type="number" name="Experience" id="Experience" value="@if(!empty(old('Experience'))){{{old('Experience')}}}@else{{$uauth->Experience}}@endif"required="required"/>
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
                <input type="text" name="Key_skills" id="Key_skills" value="@if(!empty(old('Key_skills'))){{{old('Key_skills')}}}@else{{$uauth->Key_skills}}@endif" required="required"/>
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
                        <div class="col-sm-4 text-right" style="margin-top:22px;">
                          <div style="width:80%;font-size:15px; color:#808080;text-decoration:bolder; margin-left:25px;">Expected Bill Range :</div>
                          </div>

                          <div class="col-sm-3">
                              From:<input type="number" placeholder="Rs."name="rate_from" value="@if(!empty(old('rate_from'))){{{old('rate_from')}}}@else{{$uauth->rate_from}}@endif" class="form-control">
                          </div>
                      

                             
                          <div class="col-sm-3">
                              To:<input type="number" placeholder="Rs."name="rate_to" value="@if(!empty(old('rate_to'))){{{old('rate_to')}}}@else{{$uauth->rate_to}}@endif" class="form-control">
                          </div>
                      

                            
                        <div class="col-sm-2" style="margin-top:18px;">
                              <select name="frequency" id="Consulting" value="@if(!empty(old('frequency'))){{{old('frequency')}}}@else{{$uauth->frequency}}@endif" style="height:35px; width:80%;" >
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
                                          <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('rate_from', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                            @endif

                              @if($errors->has())
                                          <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('rate_to', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                            @endif

                            @if($errors->has())
                                          <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('frequency', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                            @endif

              <div class="input-container1">
                <input type="text" name="Preffer_location" id="Preffer_location" value="@if(!empty(old('Preffer_location'))){{{old('Preffer_location')}}}@else{{$uauth->Preffer_location}}@endif" required="required"/>
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
                <input type="text" name="Basic_education" id="Basic_education" value="@if(!empty(old('Basic_education'))){{{old('Basic_education')}}}@else{{$uauth->Basic_education}}@endif" required="required"/>
                <label for="Basic_education">Basic Qualification</label>
                <div class="bar"></div>
            </div>
                        
            <div class="input-container1">
                <input type="text" name="Masters" id="Masters" value="@if(!empty(old('Masters'))){{{old('Masters')}}}@else{{$uauth->Masters}}@endif" Placeholder="Masters (if any)" />
                <div class="bar"></div>
            </div>

            <div class="input-container1">
                <input type="text" name="Certificates" id="Certificates" Placeholder="Certificates (if any)"value="@if(!empty(old('Certificates'))){{{old('Certificates')}}}@else{{$uauth->Certificates}}@endif" />
                
                <div class="bar"></div>
            </div>


            <div class="input-container1">
                <span style="width:80%;font-size:15px; color:#808080;text-decoration:bolder;"> Brief Profile (four line pitch for employers to understand about you):</span><textarea rows="4" style="width:100%;" id="Brief_profile" name="Brief_profile"required="required">@if(!empty(old('Brief_profile'))){{{old('Brief_profile')}}}@else{{$uauth->Brief_profile}}@endif</textarea>
                
                
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
                      <input type="submit" value="Update" class="btn btn-primary btn-md" />
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

