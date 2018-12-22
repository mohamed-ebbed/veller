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
	color:#212529;
	background-color: #FFFFFF;
	padding-top: 20px;
	padding-bottom: 20px;
}

.headers {
	color: #F05F40;
}

#orgTitle {
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
	<h1>{{ $data["title"] }}</h1>
	
	<a href=""><h3 id="orgTitle">{{ $data["name"] }}</h3></a>

	<h4 class="headers">Description</h4>
	<p>{{ $data["description"] }}</p>
				
	<h4 class="headers">Requirements</h4>
	<p>{{ $data["requirements"] }}</p>
				
	@yield('addedInfo')

	<h5 class="headers">Expiration Date: <p class="inlineData">{{ $data["expiration_date"] }}</p></h5>
	
	<h5 class="headers">Place: <p class="inlineData">{{$data["oppCity"]}} , {{ $data["oppCountry"] }} </p></h5>

	<h5 class="headers">Duration: <p class="inlineData">{{ $data["duration"] }}</p></h5>
	
	<h5 class="headers">{{ $data["funded"] }}</h5>
	
	<button style="position: relative; margin-top: 20px; margin-left: 45%;" type="button" class="btn btn-secondary">Apply</button>
</div>
@endsection