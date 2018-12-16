@extends('layouts.app')

@section('back')
	style="background-color: #212529;
@endsection

@section('content')

<div class="container">
	<div class="card" style="height: 100%; color:#212529; background-color: #FFFFFF;">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs">
				<li class="nav-item">
					<a class="nav-link @yield('opportunities_tab')" href="/opportunity">All</a>
				</li>
				<li class="nav-item">
					<a class="nav-link @yield('scholarships_tab')" href="/scholarship">Scholarships</a>
				</li>
				<li class="nav-item">
					<a class="nav-link @yield('internships_tab')" href="/internship">Internships</a>
				</li>
				<li class="nav-item">
					<a class="nav-link @yield('contests_tab')" href="/contests">Contests</a>
				</li>
				<li class="nav-item">
					<a class="nav-link @yield('volunteering_tab')" href="/volunteering">Volunteering</a>
				</li>
				<li class="nav-item">
					<a class="nav-link @yield('exchange_programs_tab')" href="/exchange_programs">Exchange Programs</a>
				</li>
			</ul>
		</div>

		<div class="card-body">
			@yield('postsArea')
		</div>
	</div>
</div>	
@endsection