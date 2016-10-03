
@extends('layouts.default')
@section('content')
<style type="text/css">
      .carousel{
          background: #2f4357;
          margin: 0px;
      }
      .carousel .item img{
          margin: 0 auto; /* Align slide image horizontally center */
      }
      .bs-example{
        margin: 0px 20px 0px 20px;
      }
      nav.navbar-webmaster ul.navbar-nav #active1 a { background:#e0e0e0; border: 2px 0px 2px 0px #779c19; color:#0089ca;}
</style>
<div  style="height:10px; background-color:#0089ca; border:1px outset #0089ca"class="container-fluid"></div>
<section  id="content">
     

        <div class="bs-example" >
            <div id="myCarousel" class="carousel slide" data-ride="carousel" >
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>   
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{ URL::asset('/images/slider1.jpg') }}"  style="width:100%;"alt="First Slide">
                    </div>
                    <div class="item">
                        <img src="{{ URL::asset('/images/slider2.jpg') }}" style="width:100%;"alt="Second Slide">
                    </div>
                    <div class="item">
                        <img src="{{ URL::asset('/images/slider3.jpg') }}" style="width:100%;" alt="Third Slide">
                    </div>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>


 <!--  empty divider bar -->       
    <div  style="height:25px; background-color:#0089ca; border:1px outset #0089ca"class="container-fluid"></div>
     @if (session('failure'))
                            <div style="width:80%; height:25px; color:red; text-align:center;">
                             {{ session('failure') }}
                            </div>
      @endif

      @if (session('success'))
                            <div style="width:80%; height:25px; color:green; text-align:center;">
                             {{ session('success') }}
                            </div>
      @endif

<!-- video section -->
        <div class="container-fluid">
          <div  class="row" style="background-color:white;">
              <div class="col-sm-2"></div>
              <div class="col-sm-4">
                  <h2 class="text-uppercase text-center" style=" color:black; border-bottom:2px solid #eee;padding:10px;margin:20px 20px 0px 20px;">How it works</h2>
                  <P class="text-justify">JoulestoWatts has designed this exclusive platform for experts in the Industry. A platform for privileged elite members who possess specialized skills and for the senior talent. Specialized and Senior talent need very exclusive treatment and approach, which only J2W Premier Lounge service provides.<br/>
                    <b>For Professionals:</b>
                    Sign up and choose the different working models. Our team will reach out to you to understand and explore the best opportunities suitable to your choice. You can search for wide range of opportunities after your profile is approved.<br/>
                    <b>For Boutique firms:</b>
                    Sign up and expand the reach with large number of opportunities to work on with minimal amount of paper work. Our management team will reach out to discuss and work through the agreements to engage and be part of the collaborative solutions. Your specialization is highly valued.<br/>
                    <b>For Clients:</b>
                    Sign up or email us to info@joulestowatts.com, our account management team will reach out to you discuss and develop a solution models to address.
                  </P>
              </div>
          
              <div class="col-sm-5" style="margin:30px 0px;">
                <object width="100%" height="355" data="https://www.youtube.com/v/zoaDw-VQosc">
                </object>
              </div>

              
            </div>
        </div>


<!-- feature positions section -->
        @if( !empty($cauth) )
            <div style="margin-top:2px; min-height:350px;background-color:#0089ca;;  border:1px outset #0089ca; box-shadow: 3px 3px -5px #000000;"class="container-fluid">

                 <div class="row" >
                      <div class="col-sm-3"></div>
                      <div class="col-sm-6 text-center">
                        <h2 class="text-uppercase text-center" style="margin-top:5px; border-top:none;margin-bottom:20px;padding-bottom:15px; border-bottom:3px solid #c8c8c8;color:white;font-size:36px;">
                            Open Positions
                        </h2>
                      </div>
                  </div>
                  <div class="row container-fluid" style="color:#000;">

                              <div id="jssor_1" style="position: relative; margin: 0 auto;
                                                    margin-bottom:10px; 
                                                    top: 0px; left: 0px;
                                                    width: 700px; 
                                                    height: 350px; 
                                                    overflow: hidden; 
                                                    visibility: hidden; 
                                                    background-color:#000;
                                                 /*   border-top-left-radius:2em;
                                                    border-top-right-radius:2em; */
                                                    box-shadow:2px 2px 2px 2px #202020;
                                                    
                                                    padding:0px; ">
                 <!-- Loading Screen -->
                                          <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                                         
                                             
                                          </div>
                                          <div data-u="slides" style="cursor: default; 
                                                position: relative; 
                                                top: 0px; left: 0px; 
                                                width: 700px; 
                                                height: 350px; 
                                                overflow: hidden;">

                                                @foreach ($dprofiles as $profile)
                                                    <div data-p="144.50" style="display: none; 
                                                                    padding:25px;margin:0px; 
                                                                    
                                                                    background-color:#000;">
                                                        <div data-u="image"> 
                                                              <div style="height:350px;letter-spacing:1.5px;" border="0">
                                                                  <p> <span class="text-capitalize" style="text-align:center;color:#00abec;font-size:25px;font-weight:bold;font-weight:lighter;font-family:century Gothic;"> {{ $profile->Designation }}</span><br/>

                                                                   <span  style="color:#00abec;font-size:16px;font-weight:bold;font-family:century Gothic;"> {{ $profile->Preffer_location}}, {{ $profile->Type_opportunity }}</span> 
                                                                   </p>
                                                                    <p style="font-family:arial;padding-left:15px;">
                                                                   <span style="color:#a0a0a0;"> Experinece : </span><span style="color:white;">{{ $profile->Experience}} </span> <br/>
                                                                   <span style="color:#a0a0a0;"> Key Skills : </span><span style="color:white;">{{ $profile->Key_skills }}</span><br/>
                                                                    
                                                                    
                                                                   
                                                                  <span style="color:#a0a0a0;">Profile Description : </span><span style="color:white;">{{ $profile->Brief_profile }} </span>
                                                                  </p><br/>

                                                                   <div class="text-right"> <a href="/client/interested/{{ $profile->id }}" class="btn btn-primary" style="color:white;"> Send Interest  </a></div>
                                                              </div>


                                                        </div>

                                                        <div data-u="thumb" style="color:#000;padding:5px;">
                                                            <span> {{ $profile->Designation }} </span>
                                                        </div>

                                                    </div>
                                                 @endforeach
                                             
                                          </div>

                                          <!-- Thumbnail Navigator -->
                                          <div data-u="thumbnavigator" class="jssort01" style="background-color:red;color:white;position:absolute;left:0px;bottom:0px;padding:36px;" data-autocenter="1">
                                              <!-- Thumbnail Item Skin Begin -->
                                              <div data-u="slides" style="cursor: default;margin:0px;background-color:#101010;color:white;box-shadow:8px 8px 15px 8px #505050;">
                                                  <div data-u="prototype" class="p" style="color:white;margin:0px;width:133px;">
                                                      <div class="w">
                                                          <div data-u="thumbnailtemplate" class="t" style="font-weight:normal;font-family:Times;vertical-align:center;padding:25px 2px 2px 2px; margin:0px;color:#f0f0f0;text-align:center;"></div>
                                                      </div>
                                                      <div class="c" style="color:white;margin:0px;width:133px;"></div>
                                                  </div>
                                              </div>
                                              <!-- Thumbnail Item Skin End -->
                                          </div>

                                          <!-- Arrow Navigator -->
                                          <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
                                          <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
                                         <a href="http://www.jssor.com" style="display:none">Slideshow Maker</a>
                            </div>
                                      <script>
                                          jssor_1_slider_init();
                                      </script>

                  </div>
           

          </div>


        @else


          <div style="margin-top:2px; min-height:350px;background-color:#0089ca;  border:1px outset #0089ca; box-shadow: 3px 3px -5px #000000;"class="container-fluid">

                 <div class="row" >
                      <div class="col-sm-3"></div>
                      <div class="col-sm-6 text-center">
                        <h2 class="text-uppercase text-center" style="margin-top:5px; border-top:none;margin-bottom:20px;padding-bottom:15px; border-bottom:3px solid #c8c8c8;color:white;font-size:36px;">
                            Feature Positions
                        </h2>
                      </div>
                  </div>
                  <div class="row container-fluid" style="color:#000;">

                              <div id="jssor_1" style="position: relative; margin: 0 auto;
                                                    margin-bottom:10px; 
                                                    top: 0px; left: 0px;
                                                    width: 700px; 
                                                    height: 350px; 
                                                    overflow: hidden; 
                                                    visibility: hidden; 
                                                    background-color:#000;
                                                 /*   border-top-left-radius:2em;
                                                    border-top-right-radius:2em; */
                                                    box-shadow:2px 2px 2px 2px #202020;
                                                    
                                                    padding:0px; ">
                 <!-- Loading Screen -->
                                          <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                                         
                                             
                                          </div>
                                          <div data-u="slides" style="cursor: default; 
                                                position: relative; 
                                                top: 0px; left: 0px; 
                                                width: 700px; 
                                                height: 350px; 
                                                overflow: hidden;">

                                                @foreach ($dposts as $post)
                                                    <div data-p="144.50" style="display: none; 
                                                                    padding:25px;margin:0px; 
                                                                    
                                                                    background-color:#000;">
                                                        <div data-u="image"> 
                                                              <div style="height:350px;letter-spacing:1.5px;" border="0">
                                                                  <p> <span class="text-capitalize" style="text-align:center;color:#00abec;font-size:25px;font-weight:bold;font-weight:lighter;font-family:century Gothic;"> {{ $post->Job_title }}</span><br/>

                                                                   <span  style="color:#00abec;font-size:16px;font-weight:bold;font-family:century Gothic;"> {{ $post->Location}}, {{ $post->Type_of_opportunity }}</span> 
                                                                   </p>
                                                                    <p style="font-family:arial;padding-left:15px;">
                                                                   <span style="color:#a0a0a0;"> Experinece : </span><span style="color:white;">{{ $post->Experience_from}} - {{ $post->Experience_to }}</span> <br/>
                                                                   <span style="color:#a0a0a0;"> Key Skills Required : </span><span style="color:white;">{{ $post->KeySkills }}</span><br/>
                                                                    
                                                                    
                                                                   <span style="color:#a0a0a0;"> NO. of Posts : </span><span style="color:white;">{{ $post->No_of_vacancies }} </span><br/>
                                                                  </p><div style="height:20px; overflow:hidden;"><span style="color:#a0a0a0;">Opportunity Description : </span><span style="color:white;">{{ $post->Brief_summary }} </span>
                                                                  </div><br/>

                                                                   <div class="text-right"> <a href="/user/interested/{{ $post->id }}" class="btn btn-primary" style="color:white;">I am Interested  </a></div>
                                                              </div>

  
                                                        </div>

                                                        <div data-u="thumb" style="color:#000;padding:5px;">
                                                            <span> {{ $post->Job_title }} </span>
                                                        </div>

                                                    </div>
                                                 @endforeach
                                             
                                          </div>

                                          <!-- Thumbnail Navigator -->
                                          <div data-u="thumbnavigator" class="jssort01" style="background-color:red;color:white;position:absolute;left:0px;bottom:0px;padding:36px;" data-autocenter="1">
                                              <!-- Thumbnail Item Skin Begin -->
                                              <div data-u="slides" style="cursor: default;margin:0px;background-color:#101010;color:white;box-shadow:8px 8px 15px 8px #505050;">
                                                  <div data-u="prototype" class="p" style="color:white;margin:0px;width:133px;">
                                                      <div class="w">
                                                          <div data-u="thumbnailtemplate" class="t" style="font-weight:normal;font-family:Times;vertical-align:center;padding:25px 2px 2px 2px; margin:0px;color:#f0f0f0;text-align:center;"></div>
                                                      </div>
                                                      <div class="c" style="color:white;margin:0px;width:133px;"></div>
                                                  </div>
                                              </div>
                                              <!-- Thumbnail Item Skin End -->
                                          </div>

                                          <!-- Arrow Navigator -->
                                          <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
                                          <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
                                         <a href="http://www.jssor.com" style="display:none">Slideshow Maker</a>
                            </div>
                                      <script>
                                          jssor_1_slider_init();
                                      </script>

                  </div>
           

          </div>
        @endif
       

<div  class=" container-fluid text-center" style="background-color:#353535;overflow:hidden;box-shadow: 1px 1px 10px 2px #252525;height:50px;">
                             <h2 style="margin:0px 0px 5px 0px;padding-bottom:5px;color:#fff;border-top:none;"> Testimonials </h2>
</div>                            



          <div class="containter-fluid" >
                  <div class="sim-slider" data-width="3550" data-height="1000" data-animation="250" data-current="true" data-progress="true" >

                    <div class="sim-slider-inner" style="text-align:center; margin-top:20px;height: 350.701px; width: 100%;">
                       
                        
                      
                        
                      <div class="sim-slider-slide">
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="973" data-height="900" data-left="275" data-top="20"><img src="{{ URL::asset('/images/client1.png') }}"  /></div> 
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="873" data-height="800" data-left="1347" data-top="90"><img src="{{ URL::asset('/images/boutique1.png') }}"  /></div> 
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="973" data-height="900" data-left="2322" data-top="20"><img src="{{ URL::asset('/images/employee1.png') }}"  /></div> 
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="360" data-height="38" data-left="590" data-top="680"><img src="{{ URL::asset('/images/clientText.png') }}"  /></div> 
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="373" data-height="43" data-left="1600" data-top="670"><img src="{{ URL::asset('/images/boutiqueText.png') }}"/></div> 
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="373" data-height="44" data-left="2626" data-top="680"><img src="{{ URL::asset('/images/employeeText.png') }}"  alt="Employee"/></div>     
                      </div>
                      
                      <div class="sim-slider-slide">
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="973" data-height="900" data-left="275" data-top="20"><img src="/images/client2.png" /></div> 
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="873" data-height="800" data-left="1347" data-top="90"><img src="/images/boutique2.png" /></div> 
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="973" data-height="900" data-left="2322" data-top="20"><img src="/images/employee2.png" /></div> 
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="373" data-height="43" data-left="590" data-top="700"><img src="/images/clientText.png" /></div> 
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="373" data-height="43" data-left="1600" data-top="690"><img src="/images/boutiqueText.png" /></div> 
                      <div class="sim-slider-layer" data-effect="rollIn" data-width="373" data-height="44" data-left="2626" data-top="700"><img src="/images/employeeText.png" /></div>     
                      </div>
                        
                        

                    </div>  
                      
                      
                  </div>

          </div>

<div  class=" container-fluid text-center" style="background-color:#0067a9;overflow:hidden;box-shadow: 1px 1px 10px 2px #0067a9;height:10px;"></div>  


          

</section>


@endsection