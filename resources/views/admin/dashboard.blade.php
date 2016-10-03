@extends('layouts.default')

@section('content')

<div class="row">
	@include('admin.default')
</div>

<div class="text-center list_container" >
  	<h1 class="text-capitalize a_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;"> Posted Opportunity list</h1><span style="color:#0089ca;"> Total = {{count($a_posts)}}</span>
						
	@if($errors->has())
		<ul>
			@foreach ($errors->all() as $message)
				<li style="color:red;"> {{$message}}</li>
			@endforeach
		</ul>
	@endif 

   @if(count($a_posts) != 0)
  
   		 
    <table class="table table-striped">
			
			<tr> 
				<th>@sortablelink ('id', 'Id') </th>
				<th>@sortablelink ('Job_title', 'Title')  </th>
				<th>@sortablelink ('Experience_from', 'Exp_from') </th>
				<th>@sortablelink ('Experience_to', 'Exp_to') </th>
				<th>@sortablelink ('KeySkills', 'Key Skills') </th>
				<th>@sortablelink ('Type_of_opportunity', 'Type of Opp') </th>
				<th>@sortablelink ('Location', 'Location') </th>
				<th>@sortablelink ('No_of_vacancies', 'No.of Positions') </th>
				<th>@sortablelink ('Brief_summary', 'Brief Summary')</th>
				<th>@sortablelink ('j2w_rate', 'J2W Rate') </th>
				<th>@sortablelink ('frequency', 'Frequency')</th>
				<th></th>
				<th></th>
			</tr>

			@foreach($a_posts as $opportunity)	
				
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
	
	<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $a_posts->render() }}</div></div>
</div>


<!-- Recruiter Posted Client list -->
<div class="text-center list_container">
  	

	<h1 class="text-capitalize a_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;"> Posted Client list</h1><span style="color:#0089ca;"> Total = {{count($a_clients)}}</span>
						


                        
   
   @if(count($a_clients) != 0)

    <table class="table table-striped">
			
			<tr> 
				<th> @sortablelink ('id', 'Id')</th>
				<th> @sortablelink ('Person_name', 'Contact Name')</th>
				<th>@sortablelink ('Org_name', 'Org Name') </th>
				<th>@sortablelink ('email', 'Email') </th>
				<th> Password</th>
				<th> @sortablelink ('Type_of_opportunity', 'Type of OPP')</th>
				<th> @sortablelink ('Key_skills', 'Key Skills')</th>
				<th> @sortablelink ('Mobile_no', 'Mobile No')</th>
				<th> @sortablelink ('Location', 'Location')</th>
				<th>@sortablelink ('Brief_profile', 'Profile')</th>
				<th></th>
				<th></th>
			</tr>

			@foreach($a_clients as $client)	
				
				<tr valign="center">
				<form action="/admin/recruiter/client/edit_profile/{{$client->id}}" method="POST" class="form-horizontal form1" onsubmit="return checkform(this);" enctype="multipart/form-data">
	                <input type="hidden" name="_method" value="PUT">
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<td>{{ $client->id }} </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input class="text-uppercase" type="text" name="Person_name" value="{{$client->Person_name}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Org_name" value="{{$client->Org_name}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="email" name="email" value="{{$client->email}}" > </td>
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
	
	<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $a_clients->render() }}</div></div>
</div>



<!-- Recruiter posted Candidates List -->

	<div class="text-center list_container" >
	  	
		<h1 class="text-capitalize a_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;"> Posted Candidate list</h1><span style="color:#0089ca;"> Total = {{count($a_candidate)}}</span>
							


	                       
	   
	   @if(count($a_candidate) != 0)
	  
	   		 
	    <table class="table table-striped">
				
				<tr> 
					<th> @sortablelink ('id', 'Id')</th>
					<th> @sortablelink ('First_name', 'Name') </th>
					<th> @sortablelink ('email', 'Email')</th>
					<th> Password</th>
					<th> @sortablelink ('Mobile_no', 'Mobile No')</th>
					<th> @sortablelink ('Designation', 'Designation')</th>
					<th> @sortablelink ('Experience', 'Exp(Yrs)')</th>
					<th> @sortablelink ('Preffea_location', 'Location')</th>
					<th> @sortablelink ('Type_opportunity', 'Type of Opp')</th>
					<th> @sortablelink ('Key_skills', 'Key Skills')</th>
					<th> @sortablelink ('Basic_education', 'Qualification')</th>
					<th> @sortablelink ('Brief_profile', 'Brief Profile')</th>
					<th> @sortablelink ('j2w_rate', 'J2W Rate')</th>
					<th> @sortablelink ('frequency', 'Frequency')</th>
					<th></th>
					<th></th>
				</tr>

				@foreach($a_candidate as $candidate)	
					
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
							<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Preffea_location"value="{{$candidate->Preffea_location}}" > </td>
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
		
		<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $a_candidate->render() }}</div></div>
	</div>


<!-- Recruiter posted Boutique firm list -->
	<div class="text-center list_container" >
	  
		<h1 class="text-capitalize a_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;"> Posted boutique list</h1><span style="color:#0089ca;"> Total = {{count($a_Boutique)}}</span>
							


	   
	   @if(count($a_Boutique) != 0)
	    <table class="table table-striped">
				
				<tr> 
					<th> @sortablelink ('id', 'Id')</th>
					<th> @sortablelink ('name_firm', 'Name of Firm') </th>
					<th> @sortablelink ('specialized_skills', 'Specialized Skills') </th>
					<th> @sortablelink ('email', 'Email')</th>
					<th> password </th>
					<th> @sortablelink ('address', 'Address')</th>
					<th> @sortablelink ('website', 'Website')</th>
					<th> @sortablelink ('contact_name', 'Contact Name')</th>
					<th> @sortablelink ('contact_no', 'Contact No')</th>
					<th> @sortablelink ('head_counts', 'Headcounts')</th>
					<th> @sortablelink ('Brief_profile', 'Profile')</th>
					<th></th>
					<th></th>
				</tr>

				@foreach($a_Boutique as $boutique)	
					
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
		
		<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $a_Boutique->render() }}</div></div>
	</div>

@endsection