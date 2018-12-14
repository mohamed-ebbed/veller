<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<title>Veller</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'veller') }}</title>
    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('Ayat_web/vendor1/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{ URL::asset('Ayat_web/vendor1/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Plugin CSS -->
    <link href="{{ URL::asset('Ayat_web/vendor1/magnific-popup/magnific-popup.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('Ayat_web/css/creative.min.css') }}" rel="stylesheet">


    <!--   style message           -->

     <link rel="stylesheet" type="text/css" href="{{ URL::asset('Ayat_web2/vendor2/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Ayat_web2/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Ayat_web2/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Ayat_web2/vendor2/animate/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Ayat_web2/vendor2/css-hamburgers/hamburgers.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Ayat_web2/vendor2/animsition/css/animsition.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Ayat_web2/vendor2/select2/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Ayat_web2/vendor2/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Ayat_web2/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Ayat_web2/css/main.css') }}">

  </head>
  <body id="page-top" @yield('back')>
        @include('inc.navbar')
        @yield('content')
        
    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset('Ayat_web/vendor1/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('Ayat_web/vendor1/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ URL::asset('Ayat_web/vendor1/jquery-easing/jquery.easing.min.js') }} "></script>
    <script src="{{ URL::asset('Ayat_web/vendor1/scrollreveal/scrollreveal.min.js') }}"></script>
    <script src="{{ URL::asset('Ayat_web/vendor1/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ URL::asset('Ayat_web/js/creative.min.js') }}"></script>


    <!-- message scripts -->
     <script src="{{ URL::asset('Ayat_web2/vendor2/jquery/jquery-3.2.1.min.js') }}"></script>

    <script src="{{ URL::asset('Ayat_web2/vendor2/animsition/js/animsition.min.js') }}"></script>

    <script src="{{ URL::asset('Ayat_web2/vendor2/bootstrap/js/popper.js') }}"></script>
    <script src="{{ URL::asset('Ayat_web2/vendor2/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ URL::asset('Ayat_web2/vendor2/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('Ayat_web2/vendor2/daterangepicker/moment.min.js') }}"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>

    <script src="{{ URL::asset('Ayat_web2/vendor2/countdowntime/countdowntime.js') }}"></script>

    
    <script src="{{ URL::asset('Ayat_web2/js/map-custom.js') }}"></script>
    <script src="{{ URL::asset('Ayat_web2/js/main.js') }}"></script>

    



  </body>

</html>

