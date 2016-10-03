@extends('layouts.default1')

@section('content')
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
   nav.navbar-webmaster ul.navbar-nav .active5 a { background:#e0e0e0; border: 2px 0px 2px 0px #779c19; color:#0089ca;}
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
         
           <h1 class="title" style="border-top:none;">Profile Edit</h1>
       
          
                        @if (session('failure'))
                            <div style="width:80%; height:25px; color:red; text-align:center;">
                             {{ session('failure') }}
                            </div>
                        @endif

         <form action="/boutique/edit_profile" method="POST" class="form-horizontal form1" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="input-container1">
                <input type="text" name="name_firm" id="name_firm" value="@if(!empty(old('name_firm'))){{{old('name_firm')}}}@else{{$bauth->name_firm}}@endif" required="required"/>
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
                <input type="text" name="email" id="email" value="@if(!empty(old('email'))){{{old('email')}}}@else{{$bauth->email}}@endif" required="required"/>
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
                <input type="text" name="website" id="website" value="@if(!empty(old('website'))){{{old('website')}}}@else{{$bauth->website}}@endif" required="required"/>
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
                <input type="text" name="contact_name" id="contact_name" value="@if(!empty(old('contact_name'))){{{old('contact_name')}}}@else{{$bauth->contact_name}}@endif" required="required"/>
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
                <input type="number" name="contact_no" id="contact_no" value="@if(!empty(old('contact_no'))){{{old('contact_no')}}}@else{{$bauth->contact_no}}@endif" required="required"/>
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
                <input type="number" name="head_counts" id="head_counts" value="@if(!empty(old('head_counts'))){{{old('head_counts')}}}@else{{$bauth->head_counts}}@endif" required="required"/>
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
                <input type="text" name="specialized_skills" id="specialized_skills" value="@if(!empty(old('specialized_skills'))){{{old('specialized_skills')}}}@else{{$bauth->specialized_skills}}@endif" required="required"/>
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
                <input type="text" name="address" id="address" value="@if(!empty(old('address'))){{{old('address')}}}@else{{$bauth->address}}@endif" required="required"/>
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
                <span style="width:80%;font-size:15px; color:#808080;text-decoration:bolder;"> Brief Summary:</span><textarea rows="4" style="width:100%;" id="Brief_profile" name="Brief_profile"required="required">@if(!empty(old('Brief_profile'))){{{old('Brief_profile')}}}@else{{$bauth->Brief_profile}}@endif</textarea>
                
                
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