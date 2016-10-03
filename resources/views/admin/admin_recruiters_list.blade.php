@extends('layouts.default1')


@section('content')
<div class="row">
  
    @include('admin.default')
  
</div>
<style type="text/css">
	input{
		border:none;
		background-color:;
	}
	table{
		background-color:#f9f9f9;
		font-size:14px;
		margin-top:20px;
		border:3px outset #a0a0a0;
		width:98%;
	}
	table th{
		font-weight:bold;
		padding-top:15px;
		text-align:center;
	}
	table tr td input{
		text-align:center;
	}
	table tr td input:focus{
		border:1px inset #777;
		background-color:#fff;
	}
	.list_container{
		width:90%; 
		background-color:#c0c0c0;
		margin-left:5%; 
		margin-right:5%;
		margin-bottom:15px; 
		font-size:0.93em;
		padding:2px 1% 2px 1%;

	}
	.r_list{
		
		
		
	}
</style>

<div class="text-center list_container">
	<h1 class="text-uppercase r_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;"> Recuiter List</h1>
						


                        @if($errors->has())
                        <ul>
                          @foreach ($errors->all() as $message)
                          		<li> {{$message}}</li>
                          @endforeach
                         </ul>
                         @endif 
   
    <table >
			
			<tr> 
				<th> @sortablelink ('id', 'id')</th>
				<th> @sortablelink ('User_name', 'Name')</th>
				<th>@sortablelink ('email', 'Email') </th>
				<th> Password</th>
				<th>@sortablelink ('Contact_No', 'Contact Number') </th>
				<th> @sortablelink ('Address', 'Address')</th>
				<th></th><th></th><th></th><th></th>
			</tr>
 
			@foreach($a_recruiters as $recruiter)	
				
				<tr>
				<form action="/admin/recruiter/edit_profile/{{$recruiter->id}}" method="POST" class="form-horizontal form1" onsubmit="return checkform(this);" enctype="multipart/form-data">
	                <input type="hidden" name="_method" value="PUT">
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<td>{{ $recruiter->id }} </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input class="text-uppercase" type="text" name="User_name" value="{{$recruiter->User_name}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="email" value="{{$recruiter->email}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="password" name="password" placeholder=" new password"> </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="number" name="Contact_No" value="{{$recruiter->Contact_No}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="text" name="Address"value="{{$recruiter->Address}}" > </td>
						<td> <input class="btn btn-primary" type="submit" value="Update"></td>
				</form>
				<form action="/admin/recruiter/delete_profile/{{$recruiter->id}}" method="POST" onsubmit="return confirm('Are you sure you want to Delete Recruiter?')">
				<input name="_method" type="hidden" value="DELETE">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<td> <input class="btn btn-primary" type="submit" value="Delete"></td>
				</form>
					<td> <a class="btn btn-primary" href="/admin/recruiter/details/{{$recruiter->id}}" title="Click here to see the Recruiter posted Opportunities, Clients, Candidates, Boutiques Firms">posts</a></td>
					<td> <a href="/admin/recruiter/{{$recruiter->id}}"><img  width="45"src="/images/dashboard.jpg" ></a></td>



				</tr>
			@endforeach
			
	</table>
</div>
@endsection

