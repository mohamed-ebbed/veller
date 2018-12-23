@extends('layouts.app')
@section('messageStyle')
	@include('inc.messagestyle')
@endsection
@section('messageScript')
	@include('inc.messagescript')
@endsection
@section('mainstyle')
	@include('inc.mainstyle')
@endsection

@section('content')
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section start -->
	<header class="header-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="site-logo">
						<h2><a href="#">Your profile</a></h2>
						<p>Enhance your presence on veller</p>
					</div>
				</div>
				<div class="col-md-8 text-md-right header-buttons">
					<a href="{{route('org.edit',1)}}" class="site-btn">Edit Profile</a>
					<a href="/message" class="site-btn">Message</a>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<!-- Hero section start -->
	<section class="hero-section spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row">
						<div class="col-lg-6">
							<div class="hero-text">
								<h2>{{$user["name"]}}</h2>
								<p>{{$user["about"]}}.</p>
							</div>
							<div class="hero-info">
								<h2>General Info</h2>
								<ul>
									<li><span>Address</span>{{$user["zip"]}},{{$user["city"]}},{{$user["country"]}}</li>
									<li><span>E-mail</span>{{$user["email"]}}</li>
									<li><span>Phone </span>{{$user["phone_number"]}}</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6">
							<figure class="hero-image">
								<img src='{{$user["profile_picture"]}}' alt="profile picture">
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Resume section start -->
	<section class="resume-section with-bg spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 offset-xl-2">
					<div class="section-title">
						<h2>Specifictions</h2>
					</div>
					<ul class="resume-list">
						<li>
							<h3>Field</h3>
							<p>{{$org["field"]}}</p>
						</li>
						<li>
							<h3>Type</h3>
							<p>{{$org["type"]}}</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<div class="list-group">
		@if ($oppo->num_rows != 0)
			@while($op = $oppo->fetch_assoc())
				@if($op["type"] == "scholarship")
					<a href="{{route('scholarship.show', $post['post_id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$op["name"]}}</p>
						<p>{{$op["title"]}}</p>
						<p>{{ $op["post_date"] }}</p>
					</a>
				@elseif ($op["type"] == "internship")
					<a href="{{route('internship.show', $post['post_id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$op["name"]}}</p>
						<p>{{$op["title"]}}</p>
						<p>{{ $op["post_date"] }}</p>
					</a>
				@elseif ($op["type"] == "volunteering")
					<a href="{{route('volunteering.show', $post['post_id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$op["name"]}}</p>
						<p>{{$op["title"]}}</p>
						<p>{{ $op["post_date"]  }}</p>
					</a>
				@elseif ($op["type"] == "exchange")
					<a href="{{route('exchange_programs.show', $post['post_id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$op["name"]}}</p>
						<p>{{$op["title"]}}</p>
						<p>{{ $op["post_date"]  }}</p>
					</a>
				@elseif ($op["type"] == "contest")
					<a href="{{route('contests.show', $post['post_id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$op["name"]}}</p>
						<p>{{$op["title"]}}</p>
						<p>{{$op["post_date"]}}</p>
					</a>
				@endif		
			@endwhile	
		@else
			<div class="jumbotron">
				<p>Sorry! There is no opportunities at the moment.</p>
			</div>
		@endif
	</div>
@endsection	


	
