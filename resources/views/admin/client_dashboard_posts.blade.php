@extends('layouts.default1')


@section('content')
<div class="row">
  
    @include('admin.default')
  
</div>


<div class="text-center list_container" >
  	<div class="row">
			
		  	
		  		
					<h1 class="text-uppercase rec_header"> {{ $client->Org_name }} </h1> <a  href="/admin/clint/dashboard/{{$client->id}}/users">Client Interested candidates</a>
			
	</div>

	<h1 class="text-capitalize r_list" style="margin-top:15px;padding-top:10px;border-top:4px solid #0056a7;color:#0089ca;"> Posted Opportunity list</h1>
						


                        @if($errors->has())
                        <ul>
                          @foreach ($errors->all() as $message)
                          		<li style="color:red;"> {{$message}}</li>
                          @endforeach
                         </ul>
                         @endif 
 
   @if(count($client_posts) != 0)
  
   		 
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
				<th>@sortablelink ('budget_from', 'Budget_from')</th>
				<th>@sortablelink ('budget_to', 'Budget_to')</th>
				<th>@sortablelink ('j2w_rate', 'J2W Rate') </th>
				<th>@sortablelink ('frequency', 'Frequency')</th>
				<th>@sortablelink ('approve', 'Approve') </th>
				<th>@sortablelink ('created_at', 'Created At')/ @sortablelink ('updated_at', 'Updated At')</th>
				<th></th>

			</tr>

			@foreach($client_posts as $opportunity)	
				
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
						<td  style="width:10%;"><textarea name="Brief_summary">{{$opportunity->Brief_summary}}</textarea> </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="number" name="budget_from"value="{{$opportunity->budget_from}}" > </td>
						<td  ondblclick="this.childNodes[0].disabled=false;"><input type="number" name="budget_to"value="{{$opportunity->budget_to}}" > </td>
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
                        @if($opportunity->approve == 0)
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
				<form action="/admin/recruiter/opportunity/delete_profile/{{$opportunity->id}}" method="POST" onsubmit="return confirm('Are you sure you want to Delete opportunity Profile?')">
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
	
	<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $client_posts->appends(\Input::except('page'))->render() }}</div></div>
</div>



@endsection