@extends('layouts.default1')


@section('content')
<div class="row">
  
    @include('admin.default')
  
</div>


<div class="text-center list_container" >
  	<div class="row">
			
		  	
		  		
					<h1 class="text-uppercase rec_header"> {{ $client->Org_name }} </h1> <a  href="/admin/clint/dashboard/{{$client->id}}/posts">Client Posted Opportunities</a>
			
	</div>

	<h1 class="text-capitalize r_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;"> Client Interested Candidates</h1><span style="color:#0089ca;"> Total = {{count($client_users)}}</span>
						

 
                        @if($errors->has())
                        <ul>
                          @foreach ($errors->all() as $message)
                          		<li style="color:red;"> {{$message}}</li>
                          @endforeach
                         </ul>
                         @endif 
   
   @if(count($client_users) != 0)
  
   		 
    <table class="table table-striped">
			
			<tr> 
				<th>@sortablelink ('id', 'Id') </th>
				<th>@sortablelink ('First_name', 'Name')  </th>
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

			@foreach($client_users as $candidate)	
				
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

 			<div style="width:100%;  height:350px;text-align:center; vertical-align:center;font-size:55px; padding:150px;color:#f0f0f0; font-weight:bold;"> No Records found </div>
@endif
	
	<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $client_users->render() }}</div></div>
</div>

@endsection