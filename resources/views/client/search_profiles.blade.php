@extends('layouts.default')


@section('content')

@include('client.default') 
<style type="text/css">
	nav.navbar-webmaster ul.navbar-nav .active13 a { background:#e0e0e0; border: 2px 0px 2px 0px #779c19; color:#0089ca;}
</style>
							@if(Session::has('success'))
                                <div class="alert alert-success" style="width:100%; height:35px;">
                                    {{ Session::get('success') }}
                                </div>
                           @endif
                           @if(Session::has('failure'))
                                <div class="alert alert-success" style="width:100%; height:35px;">
                                    {{ Session::get('failure') }}
                                </div>
                           @endif

<div style="width:80%; margin-left:10%; margin-right:8%;">

<?php $cinterests = $cauth->users; 
      $cinte = collect([]);
      foreach( $cinterests as $cinterest)
      {
             $cinte->push($cinterest->id);
      }

?>
			
<div class="row" style="background-color:#a0a0a0;">
	@if($Sprofiles)
		@foreach($Sprofiles as $profile)
			
			 
			  <div class="col-sm-6 col-md-4 profile" > 
				<div>
					<h4>{{ $profile->Designation}} </h4>
					
					<div><span class="sub_title">Experience :</span>
					<span style="width:70%;text-align:center;">{{ $profile->Experience}} </span></div>
					<div style="min-height:40px;"><span class="sub_title">Key Skills :</span>
					<span>{{ $profile->Key_skills }}</span></div>
					<div><span class="sub_title">Qualification:</span>
					<span>{{ $profile->Basic_education }}, {{ $profile->Masters }}, {{ $profile->Certificates }} </span> </div>
					<div><span class="sub_title">Type Of Opportunity :</span>
					<span>{{ $profile->Type_opportunity }}</span> </div>
										
					<div><span class="sub_title">Location :</span>
					<span>{{ $profile->Preffer_location}} </span></div>
					<div><span class="sub_title">Rate :</span>
					<span>{{ $profile->j2w_rate}} {{ $profile->frequency}} </span></div>
					<div style="width:100%; height:90px;"><span class="sub_title"> Description :</span> {{ $profile->Brief_profile }} </div>
					
					
						
							@if($cinte->contains($profile->id))
								 	<a href="#" class="btn btn-success" style="float:right;margin-bottom:15px;">Interested</a>
							 @else
									<a href="/client/interested/{{ $profile->id }} " class="btn btn-primary" style="float:right;margin-bottom:15px;">Send Interest</a>
							@endif

						
							
						
					
				</div>
			</div>		 

				
	 	@endforeach
	 @endif
	
</div>

	@if(count($Sprofiles)== 0)
		<div style="width:100%;  height:350px;text-align:center; vertical-align:center;font-size:55px; padding:150px;color:#c0c0c0; font-weight:bold;"> No Records found </div>
	@endif 

		<div class="row text-right"><div class="pagination" style="clear:both;"> {{  $Sprofiles->render() }}</div></div>
</div>

@endsection