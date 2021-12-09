<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app (Laravel 8)">
    <meta name="author" content="pixelstrap">
    <link rel="shortcut icon" href="{{asset('public/assets/images/favicon.png')}}" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{asset('view/less/base.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('view/less/header.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('view/less/theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('view/less/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('view/icon/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">
    <link rel="icon" href="{{asset('view/images/ico/favicon.ico')}}">

    <script src="{{asset('view/library/modernizr-custom.js')}}"></script>
    <title>@yield('title')</title>

</head>
<body class="no-transition">
<div id="page-wrapper">
@include('layout.header')
@yield('content')
@include('layout.footer')
@include('layout.script')
@yield('javascript')
</div>
</body>
</html>
