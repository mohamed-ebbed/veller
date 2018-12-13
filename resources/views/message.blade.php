@extends('layouts.app')
@section('content')
	<div class="container-contact100">
		<div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="{{URL::asset('Ayat_web2/images/icons/map-marker.png')}}" data-scrollwhell="0" data-draggable="1"></div>
        
        <img  class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" src="{{URL::asset('Ayat_web2/images/icons/bg-01.jpg')}}" data-scrollwhell="0" data-draggable="1">

		<button class="contact100-btn-show">
			<i class="fa fa-envelope-o" aria-hidden="true"></i>
		</button>

		<div class="wrap-contact100"  style="margin-top: 50px">
			<button class="contact100-btn-hide">
				<i class="fa fa-close" aria-hidden="true"></i>
			</button>

			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					New Message
				</span>


				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="recieved_by" placeholder="Enter his/her email addess">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="content" placeholder="Your message here..."></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Send
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



	

@endsection
