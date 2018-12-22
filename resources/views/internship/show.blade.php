@extends('layouts.opportunityShowLayout')

<title>Veller | Internship</title>

@section('addedInfo')
	<h4 class="headers">Specialization</h4>
	<p>{{ $data["specialization"] }}</p>

	@if ($data["paid"])
		<h5 class="headers">Paid: <p class="inlineData">Yes</p></h5>
	@else
		<h5 class="headers">Paid: <p class="inlineData">No</p></h5>
	@endif
@endsection