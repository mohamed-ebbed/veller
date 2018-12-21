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
					<a href="#" class="site-btn">Notifications</a>
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
								@if($user->num_rows)
				  					@while($row = $user->fetch_assoc())
								<h2>{{$row["name"]}}</h2>
								<p>I’m a digital designer in love with photography, painting and discovering new worlds and cultures.</p>
							</div>
							<div class="hero-info">
								<h2>General Info</h2>
								<ul>
									<li><span>Date of Birth</span>Aug 25, 1988</li>
									<li><span>Address</span>{{$row["zip"]}},{{$row["city"]}},{{$row["country"]}}</li>
									<li><span>E-mail</span>{{$row["email"]}}</li>
									<li><span>Phone </span>{{$row["phone_number"]}}</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6">
							<figure class="hero-image">
								<img src='{{$row["profile_picture"]}}' alt="profile picture">
							</figure>
						</div>
						@endwhile
						@endif
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
						<h2>Education</h2>
					</div>
					<ul class="resume-list">
						<li>
							<h2>2008</h2>
							<h3>Ui/Ux Diploma</h3>
							<h4>Design College California</h4>
							<p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
						</li>
						<li>
							<h2>2006</h2>
							<h3>Web design Diploma</h3>
							<h4>Design College California</h4>
							<p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- Resume section end -->

	
	<!-- Review section start -->
	<section class="review-section spad pb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 offset-xl-2">
					<div class="section-title">
						<h2>Interests</h2>
					</div>
					<div class="review-slider owl-carousel">
						<div class="single-review">
							<div class="qut">“</div>
							<p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
						</div>
						<div class="single-review">
							<div class="qut">“</div>
							<p>Sit amet, consectetur adipiscing elit. Sed porttitor orci ut sapien scelerisque viverra. Sed trist ique justo nec mauris efficitur, ut lacinia elit dapibus. In egestas elit in dap ibus laoreet. Duis magna libero, fermentum ut facilisis id, pulvinar eget tortor. Vestibulum pelle ntesque tincidunt lorem, vitae euismod felis porttitor sed. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Review section end -->
@endsection	


	
