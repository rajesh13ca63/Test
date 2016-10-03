@extends('layouts.default1')


@section('content')
<div class="row">
  
    @include('admin.default')
  
</div>


<div class="text-center list_container" >
  	<div class="row">
			
		  	
		  		<form action="/admin/recruiter/posts/{{ $recruiter->id }}" method="POST" class="form1">
		  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<span class="text-uppercase rec_header"> {{ $recruiter->User_name }} </span> <select name='r_post' onchange='this.form.submit()' >
					  <option selected>Boutique</option>
					  <option >Client</option>
					  <option>Candidate</option>
					  <option>Opportunity</option>
					</select>
					<noscript><input type="submit" value="Submit"></noscript>
				</form>
			
	</div>

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

 			<div style="width:100%;  height:350px;text-align:center; vertical-align:center;font-size:55px; padding:150px;color:#f0f0f0; font-weight:bold;"> No Records found </div>
@endif
	
	<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $r_Boutique->render() }}</div></div>
</div>

@endsection

