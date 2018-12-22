@extends('layouts.opportunityShowLayout')

<title>Veller | Scholarship</title>

@section('addedInfo')
	<h4 class="headers">Specialization</h4>
	<p>{{ $data["specialization"] }}</p>

	<h4 class="headers">For: </h4>
	<p>{{ $data["scholarType"] }}</p>

	@if ($data["paid"])
		<h5 class="headers">Paid: <p class="inlineData">Yes</p></h5>
	@else
		<h5 class="headers">Paid: <p class="inlineData">No</p></h5>
	@endif
@endsection