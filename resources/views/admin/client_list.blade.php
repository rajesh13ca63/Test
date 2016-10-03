@extends('layouts.default1')


@section('content')
<div class="row">
  
    @include('admin.default')
  
</div>


<div class="text-center list_container">
  	

	<h1 class="text-capitalize r_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;">Client list</h1><span style="color:#0089ca;"> Total = {{count($clients)}}</span>
						


                        @if($errors->has())
	                        <ul>
	                          @foreach ($errors->all() as $message)
	                          		<li style="color:red;"> {{$message}}</li>
	                          @endforeach
	                         </ul>
                         @endif 
   
   @if(count($clients) != 0)
   								<div class="text-right"></div>
    <table class="table table-striped">
			
			<tr> 
				<th> @sortablelink ('id', 'Id')</th>
				<th> @sortablelink ('Person_name', 'Contact Name')<span class="fa fa-sort-alpha"></span></th>
				<th>@sortablelink ('Org_name', 'Org Name') </th>
				<th>@sortablelink ('email', 'Email') </th>
				<th> Password</th>
				<th> @sortablelink ('Type_of_opportunity', 'Type of OPP')</th>
				<th> @sortablelink ('Key_skills', 'Key Skills')</th>
				<th> @sortablelink ('Mobile_no', 'Mobile No')</th>
				<th> @sortablelink ('Location', 'Location')</th>
				<th>@sortablelink ('Brief_profile', 'Profile')</th>
				<th>@sortablelink ('approve', 'Approve') </th>
				<th>@sortablelink ('created_at', 'Created At')/ @sortablelink ('updated_at', 'Updated At')</th>
				<th></th>
				<th></th>
			</tr>

			@foreach($clients as $client)	
				
				<tr valign="center">
				<form action="/admin/recruiter/client/edit_profile/{{$client->id}}" method="POST" class="form-horizontal form1" onsubmit="return checkform(this);" enctype="multipart/form-data">
	                <input type="hidden" name="_method" value="PUT">
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<td>{{ $client->id }} </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input class="text-uppercase" type="text" name="Person_name" value="{{$client->Person_name}}"> </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Org_name" value="{{$client->Org_name}}" > </td>
						<td><input type="email" name="email" value="{{$client->email}}" readonly> </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="password" name="password" placeholder=" new password"> </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><select name="Type_of_opportunity" id="Consulting" value="{{ $client->Type_of_opportunity }}">
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
						@if($client->approve == 0)
							<td ><select name="approve" style="background-color:#6379F7;color:#fff; height:30px;">
								 
									<option value="0">Not approve</option>
				                    <option value="1">approve</option>
				             	 </select>
				             </td>
				        @else
				            <td ><select name="approve" style="background-color:#63F797;color:#fff;height:30px;">
				               		<option value="1">Approved</option>
				                 	<option value="0">Not approve</option>
				                 </select>
				             </td>
				         @endif
				                    
			            
						<td > <input  class="btn btn-primary"type="submit" value="Update"></td>
				</form>
				<form action="/admin/recruiter/client/delete_profile/{{$client->id}}" method="POST" onsubmit="return confirm('Are you sure you want to Delete Client Profile?')">
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<td><input class="btn btn-primary"type="submit" value="Delete"></td>
				</form>
					
				
				<td> <a class="btn btn-primary glyphicon glyphicon-th" href="/admin/clint/dashboard/{{$client->id}}/posts"></a></td>


				</tr>
			@endforeach
			
	</table>
	
 @else

 			<div style="width:100%;  height:350px;text-align:center; vertical-align:center;font-size:55px; padding:150px;color:#f0f0f0; font-weight:bold;"> No Records found </div>
@endif
	
	<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $clients->appends(\Input::except('page'))->render() }}</div></div>
</div>

@endsection

