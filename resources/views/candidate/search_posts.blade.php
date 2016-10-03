@extends('layouts.default')

@section('content')

@include('candidate.default') 
<style type="text/css">
	nav.navbar-webmaster ul.navbar-nav #active4 a { background:#e0e0e0; border: 2px 0px 2px 10px #779c19; color:#0089ca;}
	
</style>
		@if(Session::has('success'))
            <div class="alert alert-success" style="width:100%; height:35px;">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('failure'))

       	<div class="alert alert-danger" style="width:100%; height:35px;">
                {{ Session::get('failure') }}
            </div>
        @endif





		<?php $interests = $uauth->posts; 
		      $inte = collect([]);
		      foreach( $interests as $interest)
		      {
		             $inte->push($interest->id);
		      }

		?>
				
<div style="width:90%; background-color:#a0a0a0;margin-left:5%; margin-right:5%;margin-bottom:15px; font-size:0.93em;">



	@if($Sposts)
		
		@foreach($Sposts as $post)
			
				

			  
			  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 profile" >
						<div>
							<h3>{{ $post->Job_title }}</h3>
							<div ><span class="sub_title col-xs-4 col-sm-4 col-md-4 col-lg-4">Exp :</span>
							<span >{{ $post->Experience_from}} - {{ $post->Experience_to }} yrs</span></div>
							
							<div><span class="sub_title col-xs-4 col-sm-4 col-md-4 col-lg-4">Type :</span>
							<span>{{ $post->Type_of_opportunity }}</span> </div>
							<div><span class="sub_title col-xs-4 col-sm-4 col-md-4 col-lg-4">CTC/Rate :</span>
							<span>{{ $post->j2w_rate }} / {{$post->frequency}}</span></div>
							
							<div><span class="sub_title col-xs-4 col-sm-4 col-md-4 col-lg-4">Location :</span>
							<span>{{ $post->Location}} </span></div>
							<div><span class="sub_title col-xs-4 col-sm-4 col-md-4 col-lg-4">Positions :</span>
							<span>{{ $post->No_of_vacancies }} </span></div>
							<div style="min-height:40px;"><span class="sub_title col-xs-4 col-sm-4 col-md-4 col-lg-4">Key Skills:</span>
							<span>{{ $post->KeySkills }}</span></div>
							<div style="width:100%; height:88px;margin-bottom:10px;" class="text-justify"><span class="sub_title"> Description :</span> {{ $post->Brief_summary }} </div>
					
							<div>
								@if($inte->contains($post->id))
									<span><a href="#" class="btn btn-success" style="clear:both;float:right;">Interested</a></span>
								@else
									<a href="/candidate/interest/{{ $post->id }} "class="btn btn-primary" style="clear:both;float:right;">Send Interest</a>
								@endif
							</div><br><br><br>
					
					
					
				</div>
			   </div>		 
				 
		  	
	 	@endforeach
	 	
	@endif

	@if(count($Sposts)== 0)
		<div style="width:100%;  height:350px;text-align:center; vertical-align:center;font-size:55px; padding:150px;color:#c0c0c0; font-weight:bold;"> No Records found </div>
	@endif
	<div class="row" ><div class="pagination" style="clear:both;float:right;margin-right:35px;"> {{  $Sposts->appends(\Input::except('page'))->render() }}</div></div>
		
</div>

@endsection