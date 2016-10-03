
<?php $interests = $cauth->users; 
      $inte = collect([]);
      foreach( $interests as $interest)
      {
             $inte->push($interest->post_id);
      }

?>



<div class="container-fluid" style="height:10px; background-color:#0089ca; border:1px outset #0089ca;"></div>
<div class="conatainer" style="margin:0px 0px 0px 0px; background-image:url('/images/bg1.jpg'); padding:50px;">

      
      <div class="row">


          <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        
              <a href="/client/interested_profiles" class="userDashboard"><span class="badge" style="font-size:25px;background-color:#0089ca;border:1px solid #004596;">{{ count($cprofiles)}}</span> Interested Experts </a> 
                 <a href="/client/new_profiles" class="userDashboard"><span class="badge"  style="font-size:25px;background-color:#0089ca;border:1px solid #004596;">{{ count($mprofiles) }}</span> Matching Experts </a>
                  
          
                                  
            </div>      

      </div>
</div>
<div class="container-fluid" style="height:12px; background-color:#0089ca; border:1px outset #0089ca;margin-bottom:10px;"></div>

<div style="margin-left:10%; width:80%;height:auto;padding-top:0px;">
   
     
        <div class="row" >
          <form class="text-center"action ="/search/profiles" method="POST" style="margin:0px 0px 20px 0px;width:100%;padding:20px;height:70px;">
                
                  <input type="text" id="search-input" name="query"style="width:70%;margin-left:5%;margin-right:15px;margin-top:0px;float:left;height:40px;padding:10px;margin-bottom:10px;" class="form-control" placeholder="search"  />
                
                     
                      <input class="btn btn-primary" style="width:auto;margin-top:0px;float:left;padding:10px;margin-bottom:10px;" type="submit" value="Search">
                 
          </form>
        </div>
              
    
</div>

