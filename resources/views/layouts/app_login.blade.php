<!DOCTYPE html>
<!--html lang="{{ app()->getLocale() }}"-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ara') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/yeti_bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
    .navbar-brand {
  padding: 0px;
}
.navbar-brand>img {
  height: 100%;
  padding: 10px;
  width: auto;

}
</style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
        <div class="">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo-final.png')}}" class="pull-left">
                </a>
            </div>
            <div class="pull-right">
                <br>
                <a href="{{ url('/') }}" style="text-decoration:none">
                <b><p style="color:white;">Housing Development Corporation</p></b>
                </a>
            </div>
            </div>
        </div>
    </nav>
    @yield('content')
</div>
<footer class="container-fluid bg-4 text-center">
  <p>Account Receivable Powered by <a href="https://www.bpsolutions.biz/">www.bpsolutions.biz/</a></p> 
</footer>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
