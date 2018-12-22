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
					<a href="/orgs.edit" class="site-btn">Edit Profile</a>
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

	<!-- Social links section start -->
	<div class="social-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="social-link-warp">
						<div class="social-links">
							<a href=""><i class="fa fa-pinterest"></i></a>
							<a href=""><i class="fa fa-linkedin"></i></a>
							<a href=""><i class="fa fa-instagram"></i></a>
							<a href=""><i class="fa fa-facebook"></i></a>
							<a href=""><i class="fa fa-twitter"></i></a>
						</div>
						<h2 class="hidden-md hidden-sm">My Social Profiles</h2>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<!-- Social links section end -->

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
	<!-- Resume section end -->
@endsection	


	
