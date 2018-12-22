@extends('layouts.opportunityShowLayout')

<title>Veller | Exchange Program</title>

@section('addedInfo')
	<h4 class="headers">Specialization</h4>
	<ol style="list-style-type:none;">
	<li><h4>{{ $data["specialization"] }}</h4></li>
	</ol>
	
	@if ($tags->num_rows != 0)
		<h4 class="headers">Applicable Countries</h4>
		<ol style="list-style-type:none;">
			@while($country = $applcableCountries->fetch_assoc())
				<li>{{$country['country']}}</li>
			@endwhile
		</ol>
	@endif

@endsection