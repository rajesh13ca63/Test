@extends('layouts.default1')


@section('content')
<div class="row">
  
    @include('admin.default')
  
</div>


<div class="text-center list_container">
  	<div class="row">
			
		  	
		  		<form action="/admin/recruiter/posts/{{ $recruiter->id }}" method="POST" class="form1">
		  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<span class="text-uppercase rec_header"> {{ $recruiter->User_name }} </span> <select name='r_post' onchange='this.form.submit()' >
					  <option selected>Clients</option> 
					  <option>Boutique</option>
					  <option>Candidate</option>
					  <option>Opportunity</option>
					</select>
					<noscript><input type="submit" value="Submit"></noscript>
				</form>
			
	</div>

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

 			<div style="width:100%;  height:350px;text-align:center; vertical-align:center;font-size:55px; padding:150px;color:#f0f0f0; font-weight:bold;"> No Records found </div>
@endif
	
	<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $r_clients->render() }}</div></div>
</div>

@endsection

