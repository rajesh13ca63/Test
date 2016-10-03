<div class="container-fluid" style="height:25px; background-color:#0089ca; border:1px outset #0089ca;"></div>
<div class="conatainer" style="margin:0px 0px 0px 0px; background-color:#f0f0f0; padding:50px;">

      
      <div class="row">


            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            						
            	<div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                       
                           

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i>Add <span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                    
                                    </li>
                                    <li><a href="/recruiter/create/client"><span id="pop "class="profileEdit glyphicon glyphicon-log-in" style="margin-left:5px;"> Clinet</span></a></li>
                                    <li><a href="/recruiter/create/candidate"><span id="pop "class="changePassword glyphicon glyphicon-log-in" style="margin-left:5px;"> Candidate</span></a></li>
                                    
                                    <li><a href="/recruiter/create/boutique"><span class="glyphicon glyphicon-log-in" style="margin-left:5px;"> Boutique</span></a></li>
                                    <li><a href="/recruiter/create/post"><span class="glyphicon glyphicon-log-in" style="margin-left:5px;"> Post Opportunity</span></a>
                                    </li>
                                    
                                                      
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> 
                                View<span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                   
                                    <li><a href="/candidate/editProfilePage"><span id="pop "class="profileEdit glyphicon glyphicon-log-in" style="margin-left:5px;"> Clinet List</span></a></li>
                                    <li><a href="/user/password_reset"><span id="pop "class="changePassword glyphicon glyphicon-log-in" style="margin-left:5px;"> Candidate List</span></a></li>
                                    
                                    <li><a href="/userlogout"><span class="glyphicon glyphicon-log-in" style="margin-left:5px;"> Boutique List</span></a></li>
                                    <li><a href="/userlogout"><span class="glyphicon glyphicon-log-in" style="margin-left:5px;"> Post Opportunity's List</span></a>
                                    </li>
                                    
                                                      
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> 
                                Applied  <span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                    <li><a href="#"><span id="pop"class="profileView glyphicon glyphicon-log-in" style="margin-left:5px;"> Candidate Applied</span></a>
                                    </li>
                                    <li><a href="/candidate/editProfilePage"><span id="pop "class="profileEdit glyphicon glyphicon-log-in" style="margin-left:5px;"> Client Applied</span></a></li>
                                    <li><a href="/user/password_reset"><span id="pop "class="changePassword glyphicon glyphicon-log-in" style="margin-left:5px;"> Boutique Applied</span></a></li>
                                    
                                                                  
                                                      
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle text-capitalize" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> 
                                Matching Interests <span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                    <li><a href="#"><span id="pop"class="profileView glyphicon glyphicon-log-in" style="margin-left:5px;"> Candidate <--> Client</span></a>
                                    </li>
                                    <li><a href="/candidate/editProfilePage"><span id="pop "class="profileEdit glyphicon glyphicon-log-in" style="margin-left:5px;"> Boutique <--> Client</span></a></li>
                                                                                                                          
                                                      
                                </ul>
                            </li>

                     </ul>

                  
          
                           	     	
            </div>			

      </div>
</div>
</div>
<div class="container-fluid" style="height:25px; background-color:#0089ca; border:1px outset #0089ca;margin-bottom:10px;"></div>

<div style="margin-left:10%; width:80%;height:auto;padding-top:0px;">
   
     
        <div class="row" >
          <form class="text-center"action ="/searching/offer/opportunities" method="POST" style="margin:0px 0px 20px 0px;width:100%;padding:20px;height:70px;">
                
                  	<input type="text" id="search-input" name="query"style="width:50%;margin-left:8%;margin-right:15px;margin-top:0px;float:left;height:40px;padding:10px;margin-bottom:10px;" class="form-control" placeholder="search"  />
                	
                	
      				<select name ="Search For" class="form-control" id="sel2" style="width:15%;margin-top:0px;height:45px;float:left;margin-left:10px;">
							  <option value="" style ="color:#f0f0f0;">Searching for</option>
							  <option value="">Posted Opportunity's</option>
							  <option value="">Client's</option>
							  <option value="">Boutique's</option>
							  <option value="">Client's</option>
							 
					</select>
					
					
      				<select class="form-control" id="sel1" style="width:10%;margin:0px 15px 10px 15px;height:45px;float:left;">
							  <option value="" style ="color:#f0f0f0;">Order By</option>
							  <option value="">Descending</option>
							  <option value="">Ascending</option>
							  <option value="">Created At</option>
							  <option value="">Updated At</option>
							 
					</select>
                     
                    <input class="btn btn-primary" style="width:10%;margin-top:0px;float:left;padding:10px;margin-bottom:10px;" type="submit" value="Search">
                 
          </form>
          </div>
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
    
</div>