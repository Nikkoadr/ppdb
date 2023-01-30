<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'PPDB') }}</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

@yield('link')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@yield('preloader')

@include('layouts.admin.partials.navbar')

@include('layouts.admin.partials.aside')

@yield('content')

  <footer class="main-footer">
  <div class="float-right d-none d-sm-inline-block">
    <b>Beta</b> 0.2
  </div>
    <strong>Copyright &copy; 2020-2024 <a href="https://github.com/Nikkoadr">Nikko Adrian</a>.</strong> All rights reserved.
  </footer>
</div>
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

@yield('script')

</body>
</html>
