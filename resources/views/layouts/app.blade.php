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

    @yield('mainstyle')
    @yield('messageStyle')

  </head>
  <body id="page-top" @yield('back')>
        @include('inc.navbar')
        @yield('content')
        
        @yield('mainscript')
        @yield('messageScript')
  </body>

</html>

