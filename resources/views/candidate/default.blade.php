<?php $interests = $uauth->posts; 
    $inte = collect([]);
    foreach( $interests as $interest)
    {
        $inte->push($interest->post_id);
    }
?>

<style type="text/css">
  .sorting::before{
    clear:both;
    } 
  .sorting{
      float:right;
      margin-right:5%;

    }

    .sorting::after{
      clear:both;
    } 
</style>

<div class="container-fluid" style="height:10px; background-color:#0089ca; border:1px outset #0089ca;"></div>
<div class="conatainer" style="margin:0px 0px 0px 0px; background-image:url('/images/bg1.jpg'); padding:50px;">
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
	
          	<a href="/candidate/interested_jobs" class="userDashboard"><span class="badge" style="font-size:25px;background-color:#0089ca;border:1px solid #004596;">{{ count($uauth->posts)}}</span> Interested Opportunities </a>
                <a href="/candidate/new_jobs" class="userDashboard"><span class="badge" style="font-size:25px;background-color:#0089ca;border:1px solid #004596;">{{ count($mposts) }}</span> Matching Opportunities </a>
        </div>			
    </div>
</div>
<div class="container-fluid" style="height:12px; background-color:#0089ca; border:3px outset #0089ca;margin-bottom:20px; ">
    
</div>

<div style="margin-left:20%; width:70%;height:auto;padding-top:0px;">  
   
        <div class="row" >
            <form class="text-center" action ="/searching/offer/opportunities" method="POST" style="margin:0px 0px 20px 0px;width:100%;padding:20px;height:70px;">
                
                <input type="text" id="search-input" name="query" style="width:70%;
                margin-left:5%;margin-right:15px;margin-top:0px;float:left;height:40px;padding:10px;margin-bottom:10px;" class="form-control" placeholder="search"  />
                     
                <input class="btn btn-primary" style="width:auto;margin-top:0px;float:left;padding:10px;margin-bottom:10px;" type="submit" value="Search">
                 
            </form>
        </div>
        </div>
<!--<div class="container">
    <div class="row text-left">
        <ul>
            <li class="dropdown active5">
                <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i>Sort By <span class="caret"></span></a>

                <ul class="dropdown-menu">
                    <li><sapn>@sortablelink ('Experience_from', 'Experience')</sapn></li>
                    <li><sapn>@sortablelink ('Job_title', 'Title')</sapn></li>
                    <li><sapn>@sortablelink ('Location', 'Location')</sapn></li>
                    <li><sapn>@sortablelink ('No_of_vacancies', 'No.of Positions')</sapn></li>
                                    
                </ul>
            </li>
        </ul>
    </div>
</div> -->

  
<script type="text/javascript">
var timer;
function up()
{
    timer = setTimeout(function(){
          var keywords = $('#search-input').val();

          if (keywords.length > 0 )
            {
                $.post('/candidate/offer_jobs/search', {keywords: keywords}, function(markup)
                {
                      $('#search-results').html(markup);
                });
            }

}, 500);
    }
    function down()
    {
        clearTimeout(timer);
    }
</script>