@extends('layouts.app')

<title>Veller | Homepage</title>

@section('mainstyle')
  @include('inc.mainstyle')
@endsection
@section('mainscript')
  @include('inc.mainscript')
@endsection

@section('content')
@include('inc.messages')
  <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Your Favorite Source of internships and scholarships</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5"> search for multiple opportunities (internships , scholarships , exchange programs , volunteering , contests , conferences) !  </p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">We've got what you need!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">veller has everything you need to get your new opportunities in no time! </p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
          </div>
        </div>
      </div>
    </section>

    
    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Let's Get Started</h2>
        <div class="dropdown">
            <button class="btn btn-light btn-xl sr-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Register Now
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{route('org.create')}}">Organization</a>
              <a class="dropdown-item" href="{{route('users.create')}}">Applicant</a>
            </div>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your trip with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fas fa-phone fa-3x mb-3 sr-contact-1"></i>
            <p>111-325-2996</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fas fa-envelope fa-3x mb-3 sr-contact-2"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">ayat.mostafa998@gmail.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection
