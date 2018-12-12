<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
  </head>
  <body @yield('back')>
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

  </body>

</html>

