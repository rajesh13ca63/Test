@extends('layouts.default')


@section('content')
  @include('client.default') 

                          @if(Session::has('success'))
                                <div class="alert alert-success" style="width:100%; height:35px;">
                                    {{ Session::get('success') }}
                                </div>
                           @endif
                           @if(Session::has('failure'))
                                <div class="alert alert-success" style="width:100%; height:35px;">
                                    {{ Session::get('failure') }}
                                </div>
                           @endif
    <style>
            .container {

                border:2px ridge #555;
                margin-top:10px;
                padding-top:10px;
                background-color:#f9f9f9;
                padding-bottom:20px;
                margin-bottom:20px;
                width:60%;        
            }
            .postbtn{
                    float:left;
                    margin:15px;
                    width:150px;
            }
            input{margin-top:10px;}
              .error{ color:red; padding:4px;}
              nav.navbar-webmaster ul.navbar-nav .active5 a { background:#e0e0e0; border: 2px 0px 2px 0px #779c19; color:#0089ca;}
    </style>
    

    <!-- index content -->
    <div class="container" style="min-height:400px;">
     
           
            @if(!is_null($cauth->posts))   
                
                @foreach($cauth->posts as $post)
                    <?php
                      $id= $post->id;
                      ?>
                  <div  id="tagging"class="hidding display{{$id}}" style="width:95%; padding:0px; margin-left:0px;display:block; clear:both; border:2px ridge #f8f8f8;">
                      <ul style="margin:0px; padding:0px;">
                      <li style="background-color:#0067a9;margin-top:0px; border:2px outset #0067a9;padding:10px;color:white;" > <span class="text-center text-uppercase " >  {{ $post->Job_title }} </span></li>
                      <li style="padding-left:10px;"><span class="sub_title">Key Skills :</span> {{ $post->KeySkills }} </li>
                      <li style="padding-left:10px;"><span class="sub_title">Experience: </span> {{ $post->Experience_from}}-{{ $post->Experience_to}}  </li>
                      <li style="padding-left:10px;"><span class="sub_title">Type of Opportunity: </span> {{ $post->Type_of_opportunity}} </li>
                      
                      <li style="padding-left:10px;"><span class="sub_title">Project Duration :</span> {{ $post->Project_duration }} </li>
                      <li style="padding-left:10px;"><span class="sub_title">Posting Location: </span> {{ $post->Location}}  </li>
                      <li style="padding-left:10px;"><span class="sub_title">No.of Positions:  </span>{{ $post->No_of_vacancies}}  </li>
                      <li style="padding-left:10px;"><span class="sub_title">Join within:  </span>{{ $post->Notice_period}}  </li>
                      <li style="padding-left:10px;"><span class="sub_title">Budget: </span> {{ $post->budget_from}} - {{ $post->budget_to}} {{ $post->frequency}} </li>
                      <li style="padding-left:10px;"><span class="sub_title">Summary: </span> {{ $post->Brief_summary}}  </li>
                      <li class="text-right" style="padding-left:10px;"><a href="/client/post/profiles/{{ $post->id }}" class="btn btn-primary">  Interested Experts <span class="badge">{{ count($post->users)}}</sapn></a>
                      <a href="/client/post_edit/{{ $post->id }}" class="btn btn-primary"> Edit Posted Opportunity</a> </li>


                    </ul>
                  </div>
                  <div>
                      <button id="button" class="postbtn{{$id}} postbtn btn btn-primary">{{$post->Job_title}}</button>
                  </div>
                  <script>
                        $(document).ready(function(){
                            
                                $(".display{{ $id }}").hide();
                           
                            $(".postbtn{{ $id }}").click(function(){
                                $(".postbtn{{ $id }}").add
                                $(".display{{$id }}").show(2000);
                                $( ".hidding" ).not(".display{{$id}}").hide(2000); 
                                //$(".postbtn{{ $id }}").hide(1500); 
                               
                            });
                        });
                  </script>

                @endforeach


           @endif
           @if(count($cauth->posts)==0)
                <div style="height:500px; width:100%;">
                    <h1 style="color:#b0b0b0;margin-top:200px; margin-left:30%;"> You did't post any opportunities</h1>
              </div>
           @endif

    </div>

@endsection
  			
		  			
  		