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
#showContainer {
	position: relative;
	font-family: 'Comic Sans MS', cursive, sans-serif;
	color:#212529;
	background-color: #FFFFFF;
	padding-top: 20px;
	padding-bottom: 20px;
	border-radius: 20px;
}

.headers {
	font-family: 'Comic Sans MS', cursive, sans-serif;
	color: #F05F40;
}

#orgTitle {
	font-family: 'Comic Sans MS', cursive, sans-serif;
	display: inline-block;
	padding: 5px;
	color: #3333cc; 
	border-style: dotted;
}

.inlineData{
	display: inline-block;
	color: #212529;
	padding-left: 2px;
}

</style>

<div class="container" id="showContainer" style="block;">
	<h1 style="font-family: 'Comic Sans MS', cursive, sans-serif;">{{ $data["title"] }}</h1>
	
	<a href=""><h3 id="orgTitle">{{ $data["name"] }}</h3></a>

	<h4 class="headers">Description</h4>
	<p>{{ $data["description"] }}</p>
				
	<h4 class="headers">Requirements</h4>
	<p>{{ $data["requirements"] }}</p>
	
	@if ($tags->num_rows != 0)
		<h4 class="headers">Tags</h4>
		<ol style="list-style-type:none;">
			@while($tag = $tags->fetch_assoc())
				<li>{{$tag['tag']}}</li>
			@endwhile
		</ol>
	@endif	

	@yield('addedInfo')

	<h5 class="headers">Expiration Date: <p class="inlineData">{{ $data["expiration_date"] }}</p></h5>
	
	<h5 class="headers">Place: <p class="inlineData">
		@if ($data["oppCity"])
			{{$data["oppCity"]}}, 
		@endif
		@if ($data["oppCountry"])
			{{$data["oppCountry"]}}
		@endif
		@if (!$data["oppCity"] && !$data["oppCountry"])
			online
		@endif
	</p></h5>

	<h5 class="headers">Duration: <p class="inlineData">{{ $data["duration"] }}</p></h5>
	
	<h5 class="headers">{{ $data["funded"] }}</h5>
	<form method="post" action="{{route('apply_for.store')}}">
	@csrf
	<input hidden name="post_id" value = "{{$data['post_id']}}">
	<input hidden name="id" value = "{{$logged_id}}">
	@if($logged_type === "applicant")
	<button type = "submit" style="position: relative; margin-top: 20px; margin-left: 45%;" type="button" class="btn btn-secondary">Apply</button>
	@else
	<a href = "/user_login" style="position: relative; margin-top: 20px; margin-left: 45%;" class="btn btn-secondary">Apply</a>
	@endif
	</form>
	<h5><span style="position: relative; display: block; margin-top: 15px; margin-left: auto; margin-right: auto; padding: 5px;" class="badge badge-secondary">
		Number of Applicants that already applied: {{implode($applicants)}}
	</span></h5>
</div>
@endsection