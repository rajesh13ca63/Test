@extends('layouts.default1')

@section('content')
<style type="text/css">
  .Ereg a{
    color:#2dfff3;
    font-size:16px;
    float:right;
    opacity:0.5;
    margin-right:4px;
    margin-bottom:0px;
    margin-top:0px;
    border:2px solid #2da;
    padding:5px;
  }
  .Ereg a:hover{
    color:#ffffff;
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
            
            // name ristrictions

             $("#name_firm").keydown(function (event) {
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
          // name ristrictions

             $("#contact_name").keydown(function (event) {
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


         // rectrict to enter only 10 digit in Mobile number input  field
            $("#contact_no").keydown(function (event) {
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

          // Allow to only insert 2 digits for Head Counts 
            $("#head_counts").keydown(function (event) {
                // Allow only backspace and delete

                if($(this).val().length <= 2 ||event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )
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

        });
         

</script>



<div class="container1" style="margin-top:35px;">
  <div class="card1"></div>
  <div class="card1">  
         <span class="Ereg"><a href="/client/register">Register as Employer </a></span>
          <span class="Ereg"><a href="/candidate/register">Register as Employee </a></span>
           <h1 class="title" style="border-top:none;">Boutique Registration</h1>
       
          
                        @if (session('failure'))
                            <div style="width:80%; height:25px; color:red; text-align:center;">
                             {{ session('failure') }}
                            </div>
                        @endif

         <form action="/boutique/register" method="POST" class="form-horizontal form1" onsubmit="return checkform(this);" enctype="multipart/form-data">
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
                <label for="website">Website</label>
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
                <input type="text" name="contact_name" id="contact_name" 
                value="{{ old('contact_name') }}" required="required"/>
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
                <label for="contact_no">Contact Number</label>
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
                <label for="head_counts">Head Count</label>
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
                <span style="width:80%;font-size:15px; color:#808080;text-decoration:bolder;"> Brief Summary:</span><textarea rows="4" style="width:100%;" id="Brief_profile" name="Brief_profile"required="required">{{ old('Brief_profile') }}</textarea>
                
                
            </div>

                          @if($errors->has())
                                    <div class="error text-center" style="color:red;">
                                         
                                            <ul>
                                               
                                                <li>{{$errors->first('Brief_profile', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                            @endif

             <div class="row" style="margin:25px 0px 15px 0px;">
                         <div class="col-sm-4 text-right" style="margin-right:10px;margin-top:10px;">
                           
                            <span id="txtCaptchaDiv" style="color:blue"></span> 
                            <input type="hidden" id="txtCaptcha" />
                          </div>
                          <div class="col-sm-6 test-center">
                            <input type="text" name="txtInput" id="txtInput" placeholder="enter the Captcha Value"size="20" style="height:50px;"/>
                            <span id="errors" style="color:red"></span>
                            
                         </div> 
                     
              </div>

            
            <div class = "row">
                  <div class="col-sm-6">
                      <input type="submit" value="Register" class="btn btn-primary btn-md" />
                  </div>
                  <div class="col-sm-6">
                      <input type="reset" value="Reset" class="btn btn-primary btn-md" />
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