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

  nav.navbar-webmaster ul.navbar-nav .active14 a { background:#e0e0e0; border: 2px 0px 2px 0px #779c19; color:#0089ca;}

</style>

<script>

$(document).ready(function () {
    
  //Job title ristrictions
     $("#Job_title").keydown(function (event) {
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


// Allow to only insert 2 digits for experience 
    $("#Experience_from").keydown(function (event) {
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
        } else {

            event.preventDefault();
        }          

    });
// Allow to only insert 2 digits for experience 
    $("#Experience_to").keydown(function (event) {
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

    $("#Project_duration").keydown(function (event) {
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
   $("#Location").keydown(function (event) {
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

  $("#No_of_vacancies").keydown(function (event) {
          // Allow only backspace and delete

          if($(this).val().length <= 3 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )
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
  $("#Notice_period").keydown(function (event) {
          // Allow only backspace and delete

          if($(this).val().length <= 3 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )
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
});
 

</script>
<div class="container1" style="margin-top:35px;">
  <div class="card1"></div>
  <div class="card1">
          <h1 class="title">Post New Opportunity</h1>
       
         
                        

         <form action="/client/post" method="POST" class="form-horizontal form1" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      
              <div class="input-container1">
                <input type="text" name="Job_title" id="Job_title" value="{{ old('Job_title') }}" required="required"/>
                <label for="Job_title">Opportunity Title</label>
                <div class="bar"></div>
              </div>
                                @if($errors->has())
                                    <div class="error text-center" style="color:red;">
                                            
                                              <ul>
                                                  <li>{{$errors->first('Job_title', ':message')}}</li>
                                                  
                                              </ul>
                                              
                                    </div>
                                    @endif

              
                <div class="form-group" style="margin-top:15px;">
                    <div class="col-sm-4 text-right" style="margin-top:6px;">
                        <span style="font-size:15px; color:#808080;text-decoration:bolder;padding-top:0px;margin-top:5px; ">Experience(in years) :</span>
                          </div>

                          <div class="col-sm-4">
                              <input type="number" step="0.1" placeholder="From"name="Experience_from" value="{{ old('Experience_from') }}" class="form-control">
                          </div>
                      

                              @if($errors->has())
                                    <div class="error text-center">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('Experience_from', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                              @endif
                        <div class="col-sm-4">
                              <input type="number" step="0.1" name="Experience_to" placeholder="To"value="{{ old('Experience_to') }}" class="form-control">
                          </div>
                    

                              @if($errors->has())
                                    <div class="error text-center">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('Experience_to', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                              @endif
                </div>


                



            <div class="input-container1">
                <input type="text" name="KeySkills" id="KeySkills" value="{{ old('KeySkills') }}" required="required"/>
                <label for="KeySkills"> Key Skills </label>
                <div class="bar"></div>
            </div>

            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('KeySkills', ':message')}}</li>
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
                <input type="text" name="Project_duration" id="Project_duration" value="{{ old('Project_duration') }}" required="required"/>
                <label for="Project_duration"> Project Duration (in months)</label>
                <div class="bar"></div>
            </div>
                            

            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('Project_duration', ':message')}}</li>
                    </ul>
                </div>
            @endif
            
            <div class="input-container1">
                <input type="text" name="Location" id="Location" value="{{ old('Location') }}" required="required"/>
                <label for="Location"> Posting Location</label>
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
                <input type="text" name="No_of_vacancies" id="No_of_vacancies" value="{{ old('No_of_vacancies') }}" required="required"/>
                <label for="No_of_vacancies"> No. of Positions</label>
                <div class="bar"></div>
            </div>
                            

            @if($errors->has())
                <div class="error text-center" style="color:red;">
                    <ul>
                        <li>{{$errors->first('No_of_vacancies', ':message')}}</li>
                    </ul>
                </div>
            @endif

            <div class="input-container1">
                <input type="number" name="Notice_period" id="Notice_period" value="{{ old('Notice_period') }}" required="required"/>
                <label for="Notice_period"> Join within (in days)</label>
                <div class="bar"></div>
            </div>
                            

                            @if($errors->has())
                                          <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('Notice_period', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                            @endif






              <div class="input-container1">
                <span style="width:80%;font-size:15px; color:#808080;text-decoration:bolder;">Opportunity Description:</span><textarea rows="4" style="width:100%;" id="Brief_summary" name="Brief_summary"required="required"> {{ old('Brief_summary') }} </textarea>
                
                
            </div>

                          @if($errors->has())
                                    <div class="error text-center" style="color:red;">
                                         
                                            <ul>
                                               
                                                <li>{{$errors->first('Brief_summary', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                            @endif

            
              <div class="form-group">
                        <div class="col-sm-2 text-right" style="margin-top:22px;">
                          <span style="width:80%;font-size:15px; color:#808080;text-decoration:bolder;">Budget :</span>
                          </div>

                          <div class="col-sm-3">
                              From:<input type="number" placeholder="Rs."name="budget_from" value="{{ old('budget_from') }}" class="form-control">
                          </div>
                      

                             
                          <div class="col-sm-3">
                              To:<input type="number" placeholder="Rs."name="budget_to" value="{{ old('budget_to') }}" class="form-control">
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
                                          <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('budget_from', ':message')}}</li>
                                                
                                            </ul>
                                            
                                    </div>
                            @endif

                              @if($errors->has())
                                          <div class="error text-center" style="color:red;">
                                          
                                            <ul>
                                               
                                                <li>{{$errors->first('budget_to', ':message')}}</li>
                                                
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

                  
            <div class = "row">
                  <div class="col-sm-6">
                      <input type="submit" value="Post Opportunity" class="btn btn-primary btn-md" />
                  </div>
                  <div class="col-sm-6">
                      <input type="reset" value="Clear" class="btn btn-primary btn-md" />
                  </div>
            </div>
        </form>

        
  </div>
 
</div>

@endsection



                 
                          
                      

                     


                                          

                   
                     


                     


                     

                       
                   
