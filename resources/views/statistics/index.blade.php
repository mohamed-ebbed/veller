@extends('layouts.app')

@section('mainstyle')
  @include('inc.mainstyle')
@endsection
@section('mainscript')
  @include('inc.mainscript')
@endsection

@section('back')
	style="background-color: #212529;
@endsection

@section('content')
<style>

#statContainer {
	position: relative;
	color:#212529;
	background-color: #FFFFFF;
	padding-top: 30px;
	padding-bottom: 30px;
	margin-top: 30px;
	border-radius: 20px;
}

.statHeadings {
	font-family: 'Comic Sans MS', cursive, sans-serif;
	color: #F05F40;
}

.tableGrid{
	position: relative;
	display: flex;
	flex-wrap: wrap;
	width: 80%;
	margin-left: auto;
	margin-right: auto;
	padding: 15px;
	background-color: #FFFFFF;
	color: #212529;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 150%;
	margin-bottom: 20px;
}

.item{
	font-family: 'Comic Sans MS', cursive, sans-serif;
	border-top-style: none;
  	border-right-style: none;
  	border-bottom-style: none;
  	border-left-style: solid;
	border-width: 2px;
	background-color: lightgrey;
	border-left-color: darkgrey;
	padding-top: 10px;
}
</style>

	<div class="container" id="statContainer" style="block;">
		<h2 class="statHeadings">VELLER has...</h2>
		<div class="row tableGrid justify-content-around">
    		<div class="col-5 item">
      			<p>Organizations: {{implode($orgNum)}}</p>
    		</div>
    		<div class="col-5 item">
      			<p>Applicants: {{implode($appNum)}}</p>
    		</div>
    	</div>

		<h2 class="statHeadings">AND..</h2>
			<div class="row tableGrid justify-content-around">
    		<div class="col-5 item">
      			<p>Opportunities: {{implode($oppNum)}}</p>
    		</div>
    		<div class="col-5 item">
      			@while($type = $oppos->fetch_assoc())
      				@if ($type['type'] == "exchange")
      					<p>exchange programs: {{$type['counter']}}</p>
      				@else 
      					<p>{{$type['type']}}: {{$type['counter']}}</p>
      				@endif
      			@endwhile
    		</div>
    	</div>

    	<h2 class="statHeadings" style="display: inline;">And up to <h3 style="color: #212529; display: inline; font-family: 'Comic Sans MS', cursive, sans-serif;">{{implode($applicationsNum)}} applications</h3>!</h2>
    	<h4 style="margin-bottom: 20px;"></h4>
		<h2 class="statHeadings">Check out organizations on VELLER!</h2>
		<div class="row tableGrid justify-content-around">
    		<div class="col-5 item">
				@while($orgName = $orgNames->fetch_assoc())
      				<p>{{$orgName['name']}}</p>
      			@endwhile
    	 	</div>
  		</div>

		<h2 class="statHeadings">Join now and start your own journey!</h2>
		
		@csrf
		<input hidden name="id" value = "{{$logged_id}}">
		@if($logged_type === "applicant")
			<a href = "/opportunity" style="position: relative; margin-top: 25px; margin-left: 40%;" class="btn btn-secondary">Go to Opportunities</a>
		@else
			<a href = "/users/create" style="position: relative; margin-top: 25px; margin-left: 40%;" class="btn btn-secondary">Register as Applicant</a>
		@endif
	</div>
@endsection