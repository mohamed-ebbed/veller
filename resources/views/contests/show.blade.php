@extends('layouts.opportunityShowLayout')

<title>Veller | Contests</title>

@section('addedInfo')
	<h4 class="headers">Specialization</h4>
	<ol style="list-style-type:none;">
	<li><h4>{{ $data["specialization"] }}</h4></li>
	</ol>

	@if ($data["prizes"])
		<h2 class="headers">Pizes </h2>
		<p>{{ $data["prizes"] }}</p>
	@endif
@endsection