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
          <h1 class="title">Edit Your Profile</h1>
       
         
                        @if (session('failure'))
                            <div style="width:80%; height:25px; color:red; text-align:center;">
                             {{ session('failure') }}
                            </div>
                        @endif

         <form action="/client/update_profile" method="POST" class="form-horizontal form1" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      
              <div class="input-container1">
                <input type="text" name="Person_name" id="Person_name" value="@if(!empty(old('Person_name'))){{{old('Person_name')}}}@else{{$cauth->Person_name}}@endif" required="required"/>
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
                <input type="text" name="Key_skills" id="Key_skills" value="@if(!empty(old('Key_skills'))){{{old('Key_skills')}}}@else{{$cauth->Key_skills}}@endif" required="required"/>
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
                <input type="text" name="Mobile_no" id="Mobile_no" value="@if(!empty(old('Mobile_no'))){{{old('Mobile_no')}}}@else{{$cauth->Mobile_no}}@endif" required="required"/>
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
                <input type="text" name="Location" id="Location" value="@if(!empty(old('Location'))){{{old('Location')}}}@else{{$cauth->Location}}@endif" required="required"/>
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
               <span style="width:80%;font-size:15px; color:#808080;text-decoration:bolder;"> Brief Profile:</span><textarea rows="4" style="width:100%;" id="Brief_profile" name="Brief_profile"required="required">@if(!empty(old('Brief_profile'))){{{old('Brief_profile')}}}@else{{$cauth->Brief_profile}}@endif</textarea>
                
                
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


 






                     





@endsection

