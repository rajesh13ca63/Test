@extends('layouts.default1')

@section('content')
<style type="text/css">
  .Ereg a {
    color:#2da;
    font-size:20px;
    float:right;
    opacity:0.5;
    margin-right:2px;
    margin-bottom:0px;
    margin-top:0px;
    border:2px solid #222;
    padding:7px;
  }

  .Ereg a:hover {
    color:#fff;
    border:2px ridge #fff;
    background-color:#2da;
    padding:5px;
    text-decoration: none !important;
    opacity:1;
  }
  nav.navbar-webmaster ul.navbar-nav #active18 a{ background:#e0e0e0; border: 2px 0px 2px 0px #779c19; color:#0089ca;}
</style>

<script>

$(document).ready(function () {
    

      // name ristrictions

     $("#Person_name").keydown(function (event) {
        // Allow only backspace and delete

        if($(this).val().length <= 30 ||event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32)
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

 //Org Name ristrictions
     $("#Org_name").keydown(function (event) {
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

 
//Org Name ristrictions
     $("#Org_name").keydown(function (event) {
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
            <span class="Ereg"><a href="/candidate/register"><sub>Register as Employee </a></span>
          <span class="Ereg"><a href="/boutique/register"><sub>Register as Boutique Firm </a></span>
           <h1 class="title" style="border-top:none;">Employer Registration</h1>
          
                        @if (session('failure'))
                            <div style="width:80%; height:25px; color:red; text-align:center;">
                             {{ session('failure') }}
                            </div>
                        @endif

         <form action="/client/store" method="POST" class="form-horizontal form1" onsubmit="return checkform(this);" enctype="multipart/form-data">
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

                     

                      <p><strong style="font-size:20px;border-bottom:1px solid #c0c0c0; margin-left:25px">  Enter Basic Details</strong></p>
                      

              <div class="input-container1">
                <input type="text" name="Org_name" id="Org_name" value="{{ old('Org_name') }}" required="required"/>
                <label for="Org_name"> Organization Name</label>
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
                 <span style="text-decoration:bolder;color:#808080;"> Type of Opportunity     : </span>
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
                <span style="width:80%;font-size:15px; color:#808080;text-decoration:bolder;"> Brief Profile:</span><textarea rows="4" style="width:100%;" maxlength="255"
                id="Brief_profile" name="Brief_profile"required="required">{{ old('Brief_profile') }}</textarea>
                
                
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
                <span style="font-weight:bold; "> Upload Organization Logo </span>
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