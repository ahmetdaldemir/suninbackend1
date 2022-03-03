<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <!-- Standard Meta -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SeventhQueen"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{asset('public/view/less/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/view/less/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/view/less/theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/view/icon/style.css')}}">
    <link rel="icon" href="{{asset('public/view/images/ico/favicon.ico')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;0,900;1,200&display=swap"
          rel="stylesheet')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('public/view/less/main.css')}}">

    <script src="{{asset('public/view/library/modernizr-custom.js')}}"></script>
    <script src="https://kit.fontawesome.com/6a766525cc.js" crossorigin="anonymous"></script>

    <title>SahilVillam</title>

</head>
<body class="no-transition">
<div id="page-wrapper">
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous')}}"></script>
<script src="{{asset('public/view/library/main.js')}}"></script>

<script src="{{asset('public/view/library/jquery-2.2.0.min.js')}}"></script>
<script src="{{asset('public/view/library/flexmenu.js')}}"></script>
<script src="{{asset('public/view/library/nouislider.min.js')}}"></script>
<script src="{{asset('public/view/library/wNumb.js')}}"></script>

<script src="{{asset('public/view/library/jrespond.min.js')}}"></script>
<script src="{{asset('public/view/library/scrollspy.min.js')}}"></script>

<script src="{{asset('public/view/library/visibility.js')}}"></script>

<script src="{{asset('public/view/library/accordion.js')}}"></script>
<script src="{{asset('public/view/library/dropdown-custom.js')}}"></script>
<script src="{{asset('public/view/library/sticky.js')}}"></script>

<script src="{{asset('public/view/library/page-transition.js')}}"></script>
<script src="{{asset('public/view/library/checkbox.js')}}"></script>
<script src="{{asset('public/view/library/transition.js')}}"></script>
<script src="{{asset('public/view/library/sidebar.js')}}"></script>

<script src="{{asset('public/view/library/modal.js')}}"></script>
<script src="{{asset('public/view/library/dimmer.js')}}"></script>

<!-- Datepicker -->
<script src="{{asset('view/library/popup.js')}}"></script>
<script src="{{asset('view/library/calendar.js')}}"></script>

<!-- Slick -->
<script src="{{asset('view/library/slick.js')}}"></script>

<script src="{{asset('view/library/header.js')}}"></script>
<script src="{{asset('view/library/functions.js')}}"></script>

</body>

</html>
