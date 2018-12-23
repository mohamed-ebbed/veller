@extends('layouts.opportunityShowLayout')

<title>Veller | Scholarship</title>

@section('addedInfo')
	<h4 class="headers">Specialization</h4>
	<ol style="list-style-type:none;">
	<li><h4>{{ $data["specialization"] }}</h4></li>
	</ol>
	
	<h4 class="headers">For: </h4>
	<p>{{ $data["ScholarType"] }}</p>

	@if ($data["paid"])
		<h5 class="headers">Paid: <p class="inlineData">Yes</p></h5>
	@else
		<h5 class="headers">Paid: <p class="inlineData">No</p></h5>
	@endif
@endsection