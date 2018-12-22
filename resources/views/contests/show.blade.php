@extends('layouts.opportunityShowLayout')

<title>Veller | Contests</title>

@section('addedInfo')
	<h4 class="headers">Specialization</h4>
	<p>{{ $data["specialization"] }}</p>

	@if ($data["prizes"])
		<h2 class="headers">Pizes </h2>
		<p>{{ $data["prizes"] }}</p>
	@endif
@endsection