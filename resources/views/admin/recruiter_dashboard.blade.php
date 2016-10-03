@extends('layouts.default1')


@section('content')
<div class="row">
  
    @include('admin.default')
  
</div>


<div class="text-center list_container" >
  	<div class="row">
			
		  	
					<h1 class="text-uppercase rec_header"> {{ $recruiter->User_name }} </h1> 
			
	</div>

	<h1 class="text-capitalize r_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;"> Posted Opportunity list</h1><span style="color:#0089ca;"> Total = {{count($r_posts)}}</span>
						


                        @if($errors->has())
                        <ul>
                          @foreach ($errors->all() as $message)
                          		<li style="color:red;"> {{$message}}</li>
                          @endforeach
                         </ul>
                         @endif 
   
   @if(count($r_posts) != 0)
  
   		 
    <table class="table table-striped">
			
			<tr> 
				<th> Id</th>
				<th> Title </th>
				<th> Exp_from</th>
				<th> Exp_to</th>
				<th> Key Skills</th>
				<th> Type of Opp</th>
				<th> Location</th>
				<th> No.of Positions</th>
				<th>Brief Summary</th>
				<th> J2W Rate</th>
				<th>Frequency</th>
				<th></th>
				<th></th>
			</tr>

			@foreach($r_posts as $opportunity)	
				
				<tr valign="center">
				<form action="/admin/recruiter/opportunity/edit_profile/{{$opportunity->id}}" method="POST" class="form-horizontal form1" >
	                <input type="hidden" name="_method" value="PUT">
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<td>{{ $opportunity->id }} </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input class="text-uppercase" type="text" name="Job_title" value="{{$opportunity->Job_title}}" >
		  					 </td>
		  				<td  ondblclick="this.childNodes[0].disabled=false;"><input type="number" name="Experience_from" value="{{$opportunity->Experience_from}}" > </td>
					
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="number" name="Experience_to"value="{{$opportunity->Experience_to}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="KeySkills"value="{{$opportunity->KeySkills}}" > </td>
						
						<td  ondblclick="this.childNodes[0].disabled=false;"><select name="Type_of_opportunity" id="Consulting" value="{{ old('Type_of_opportunity') }}">
			                    <option value="Full time">Full Time</option>
			                    <option value="Part Time">Part Time</option>
			                    <option value="Consulting">Consulting</option>
			                    <option value="Assignment Based">Assignment Based</option>
			                    <option value="Out Sourcing">Out Sourcing</option>
			                 </select>
                     </td>
						
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Location"value="{{$opportunity->Location}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="number" name="No_of_vacancies"value="{{$opportunity->No_of_vacancies}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;" style="width:10%;"><textarea name="Brief_summary">{{$opportunity->Brief_summary}}</textarea> </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="number" name="j2w_rate"value="{{$opportunity->j2w_rate}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><select name="frequency" id="Consulting"  style="height:35px; width:80%;" >
                                <!-- <option value="" style ="color:#f0f0f0;">Frequency</option> -->
                                <option value="{{ $opportunity->frequency }}"> {{ $opportunity->frequency }}</option>
                                <option value="annually">Annually</option>
                                <option value="hourly">Hourly</option>
                                <option value="monthly">Monthly</option>
                                <option value="weekly">Weekly</option>
                                <option value="one time">One Time</option>
                            </select> </td>
						<td > <input  class="btn btn-primary"type="submit" value="Update"></td>
				</form>
				<form action="/admin/recruiter/opportunity/delete_profile/{{$opportunity->id}}" method="POST" onsubmit="return confirm('Are you sure you want to Delete opportunity Profile?')">
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<td><input class="btn btn-primary"type="submit" value="Delete"></td>
				</form>
					



				</tr>
			@endforeach
			
	</table>



	
	
 @else

 			<div style="width:100%;  height:100px;text-align:center; vertical-align:center;font-size:55px; padding:150px;color:#f0f0f0; font-weight:bold;"> No Records found </div>
@endif
	
	<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $r_posts->render() }}</div></div>
</div>


<!-- Recruiter Posted Client list -->
<div class="text-center list_container">
  	

	<h1 class="text-capitalize r_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;"> Posted Client list</h1><span style="color:#0089ca;"> Total = {{count($r_clients)}}</span>
						


                        @if($errors->has())
                        <ul>
                          @foreach ($errors->all() as $message)
                          		<li style="color:red;"> {{$message}}</li>
                          @endforeach
                         </ul>
                         @endif 
   
   @if(count($r_clients) != 0)

    <table class="table table-striped">
			
			<tr> 
				<th> Id</th>
				<th> Contact Name </th>
				<th>Org Name </th>
				<th> Email</th>
				<th> Password</th>
				<th> Type of OPP</th>
				<th> Key Skills</th>
				<th> Mobile No</th>
				<th> Location</th>
				<th>Profile</th>
				<th></th>
				<th></th>
			</tr>

			@foreach($r_clients as $client)	
				
				<tr valign="center">
				<form action="/admin/recruiter/client/edit_profile/{{$client->id}}" method="POST" class="form-horizontal form1" onsubmit="return checkform(this);" enctype="multipart/form-data">
	                <input type="hidden" name="_method" value="PUT">
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<td>{{ $client->id }} </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input class="text-uppercase" type="text" name="Person_name" value="{{$client->Person_name}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Org_name" value="{{$client->Org_name}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="email" name="email" value="{{$client->email}}" readonly disabled> </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="password" name="password" placeholder=" new password"> </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><select name="Type_of_opportunity" id="Consulting" value="{{ old('Type_of_opportunity') }}">
			                    <option value="Full time">Full Time</option>
			                    <option value="Part Time">Part Time</option>
			                    <option value="Consulting">Consulting</option>
			                    <option value="Assignment Based">Assignment Based</option>
			                    <option value="Out Sourcing">Out Sourcing</option>
			                 </select>
                     </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Key_skills"value="{{$client->Key_skills}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Mobile_no"value="{{$client->Mobile_no}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Location"value="{{$client->Location}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;" style="width:10%;"><textarea type="text" name="Brief_profile">{{$client->Brief_profile}}</textarea> </td>
						<td > <input  class="btn btn-primary"type="submit" value="Update"></td>
				</form>
				<form action="/admin/recruiter/client/delete_profile/{{$client->id}}" method="POST" onsubmit="return confirm('Are you sure you want to Delete Client Profile?')">
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<td><input class="btn btn-primary"type="submit" value="Delete"></td>
				</form>
					



				</tr>
			@endforeach
			
	</table>
	
 @else

 			<div style="width:100%;  height:100px;text-align:center; vertical-align:center;font-size:55px; padding:150px;color:#f0f0f0; font-weight:bold;"> No Records found </div>
@endif
	
	<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $r_clients->render() }}</div></div>
</div>



<!-- Recruiter posted Candidates List -->

	<div class="text-center list_container" >
	  	
		<h1 class="text-capitalize r_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;"> Posted Candidate list</h1><span style="color:#0089ca;"> Total = {{count($r_candidate)}}</span>
							


	                        @if($errors->has())
	                        <ul>
	                          @foreach ($errors->all() as $message)
	                          		<li style="color:red;"> {{$message}}</li>
	                          @endforeach
	                         </ul>
	                         @endif 
	   
	   @if(count($r_candidate) != 0)
	  
	   		 
	    <table class="table table-striped">
				
				<tr> 
					<th> Id</th>
					<th> Name </th>
					<th>Email</th>
					<th> Password</th>
					<th> Mobile No</th>
					<th> Designation</th>
					<th> Exp(Yrs)</th>
					<th> Location</th>
					<th>Type of Opp</th>
					<th>Key Skills</th>
					<th>Qualification</th>
					<th> Brief Profile</th>
					<th> J2W Rate</th>
					<th>Frequency</th>
					<th></th>
					<th></th>
				</tr>

				@foreach($r_candidate as $candidate)	
					
					<tr valign="center">
					<form action="/admin/recruiter/candidate/edit_profile/{{$candidate->id}}" method="POST" class="form-horizontal form1" onsubmit="return checkform(this);" enctype="multipart/form-data">
		                <input type="hidden" name="_method" value="PUT">
		                <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<td>{{ $candidate->id }} </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input class="text-uppercase" type="text" name="First_name" value="{{$candidate->First_name}}" >
			  					 </td>
			  				<td  ondblclick="this.childNodes[0].disabled=false;"><input type="email" name="email" value="{{$candidate->email}}" READONLY disabled> </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="password" name="password" placeholder=" new password"> </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="number" name="Mobile_no"value="{{$candidate->Mobile_no}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Designation"value="{{$candidate->Designation}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Experience"value="{{$candidate->Experience}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Preffer_location"value="{{$candidate->Preffer_location}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><select name="Type_opportunity" id="Consulting" value="{{ old('Type_opportunity') }}">
				                    <option value="Full time">Full Time</option>
				                    <option value="Part Time">Part Time</option>
				                    <option value="Consulting">Consulting</option>
				                    <option value="Assignment Based">Assignment Based</option>
				                    <option value="Out Sourcing">Out Sourcing</option>
				                 </select>
	                     </td>
							
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Key_skills"value="{{$candidate->Key_skills}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Basic_education"value="{{$candidate->Basic_education}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;" style="width:10%;"><textarea name="Brief_profile">{{$candidate->Brief_profile}}</textarea> </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="number" name="j2w_rate"value="{{$candidate->j2w_rate}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><select name="frequency" id="Consulting"  style="height:35px; width:80%;" >
	                                <!-- <option value="" style ="color:#f0f0f0;">Frequency</option> -->
	                                <option value="{{ $candidate->frequency }}"> {{ $candidate->frequency }}</option>
	                                <option value="annually">Annually</option>
	                                <option value="hourly">Hourly</option>
	                                <option value="monthly">Monthly</option>
	                                <option value="weekly">Weekly</option>
	                                <option value="one time">One Time</option>
	                            </select> </td>
							<td > <input  class="btn btn-primary"type="submit" value="Update"></td>
					</form>
					<form action="/admin/recruiter/candidate/delete_profile/{{$candidate->id}}" method="POST" onsubmit="return confirm('Are you sure you want to Delete candidate Profile?')">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<td><input class="btn btn-primary"type="submit" value="Delete"></td>
					</form>
						



					</tr>
				@endforeach
				
		</table>



		
		
	 @else

	 			<div style="width:100%;  height:100px;text-align:center; vertical-align:center;font-size:55px; padding:150px;color:#f0f0f0; font-weight:bold;"> No Records found </div>
	@endif
		
		<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $r_candidate->render() }}</div></div>
	</div>


<!-- Recruiter posted Boutique firm list -->
	<div class="text-center list_container" >
	  
		<h1 class="text-capitalize r_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;"> Posted boutique list</h1><span style="color:#0089ca;"> Total = {{count($r_Boutique)}}</span>
							


	                        @if($errors->has())
	                        <ul>
	                          @foreach ($errors->all() as $message)
	                          		<li style="color:red;"> {{$message}}</li>
	                          @endforeach
	                         </ul>
	                         @endif 
	   
	   @if(count($r_Boutique) != 0)
	    <table class="table table-striped">
				
				<tr> 
					<th> Id</th>
					<th> Name of Firm </th>
					<th>Specialized Skills </th>
					<th> Email</th>
					<th> password </th>
					<th> Address</th>
					<th> Website</th>
					<th> Contact Name</th>
					<th> Contact No</th>
					<th>Headcounts</th>
					<th>Profile</th>
					<th></th>
					<th></th>
				</tr>

				@foreach($r_Boutique as $boutique)	
					
					<tr valign="center">
					<form action="/admin/recruiter/boutique/edit_profile/{{$boutique->id}}" method="POST" class="form-horizontal form1" onsubmit="return checkform(this);" enctype="multipart/form-data">
		                <input type="hidden" name="_method" value="PUT">
		                <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<td>{{ $boutique->id }} </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input class="text-uppercase" type="text" name="name_firm" value="{{$boutique->name_firm}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="specialized_skills" value="{{$boutique->specialized_skills}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="email" name="email" value="{{$boutique->email}}" readonly desabled> </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="password" name="password" placeholder=" new password"> </td>
						
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="address"value="{{$boutique->address}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="website"value="{{$boutique->website}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="contact_name"value="{{$boutique->contact_name}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="number" name="contact_no"value="{{$boutique->contact_no}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="number" name="head_counts"value="{{$boutique->head_counts}}" > </td>
							<td  ondblclick="this.childNodes[0].disabled=false;" style="width:10%;"><textarea type="text" name="Brief_profile">{{$boutique->Brief_profile}}</textarea> </td>
							<td > <input  class="btn btn-primary"type="submit" value="Update"></td>
					</form>
					<form action="/admin/recruiter/boutique/delete_profile/{{$boutique->id}}" method="POST" onsubmit="return confirm('Are you sure you want to Delete boutique Profile?')">
					<input name="_method" type="hidden" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<td><input class="btn btn-primary"type="submit" value="Delete"></td>
					</form>
						



					</tr>
				@endforeach
				
		</table>
		
	 @else

	 			<div style="width:100%;  height:100px;text-align:center; vertical-align:center;font-size:55px; padding:150px;color:#f0f0f0; font-weight:bold;"> No Records found </div>
	@endif
		
		<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $r_Boutique->render() }}</div></div>
	</div>
@endsection