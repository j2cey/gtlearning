<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta -->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Eduglobal - Education & Courses HTML Template">
    <meta name="keywords" content="academy, course, education, elearning, learning, education html template, university template, college template, school template, online education template, tution center template">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SITE TITLE -->
    <title>{{ config('app.name', 'GT-Learning') }}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('eduglobal_assets/images/favicon.png') }}">

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('eduglobal_assets/images/favicon.png') }}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('eduglobal_assets/css/animate.css') }}">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{ asset('eduglobal_assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('eduglobal_assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('eduglobal_assets/css/themify-icons.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('eduglobal_assets/css/all.min.css') }}">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{ asset('eduglobal_assets/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('eduglobal_assets/owlcarousel/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('eduglobal_assets/owlcarousel/css/owl.theme.default.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('eduglobal_assets/css/magnific-popup.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('eduglobal_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('eduglobal_assets/css/responsive.css') }}">
    <link rel="stylesheet" id="layoutstyle" href="{{ asset('eduglobal_assets/color/theme.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

<!-- LOADER -->
<div id="preloader">
    <span class="spinner"></span>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- END LOADER -->

<!-- ALERT BOX -->

<!-- END ALERT BOX -->

<!-- LOGIN MODAL -->
@include('layouts.eduglobal.parts.login_modal')
<!-- END LOGIN MODAL -->

<!-- START HEADER -->
<header class="header_wrap bg_blue_dark light_skin">
    <!-- TOP HEADER -->
    @include('layouts.eduglobal.parts.header.top_header')
    <!-- END TOP HEADER -->

    <!-- NAV BAR -->
    @include('layouts.eduglobal.parts.header.navbar')
    <!-- END NAV BAR -->
</header>
<!-- END HEADER -->

<div id="app">
    @yield('content')
</div>


<!-- START FOOTER -->
<footer class="bg_blue_dark footer_dark">

    <!-- TOP FOOTER -->
    @include('layouts.eduglobal.parts.footer.top_footer')
    <!-- END TOP FOOTER -->

    <!-- BOTTOM FOOTER -->
    @include('layouts.eduglobal.parts.footer.bottom_footer')
    <!-- END BOTTOM FOOTER -->

</footer>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<!-- Latest jQuery -->
<script src="{{ asset('eduglobal_assets/js/jquery-1.12.4.min.js') }}"></script>
<!-- jquery-ui -->
<script src="{{ asset('eduglobal_assets/js/jquery-ui.js') }}"></script>
<!-- popper min js -->
<script src="{{ asset('eduglobal_assets/js/popper.min.js') }}"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="{{ asset('eduglobal_assets/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- owl-carousel min js  -->
<script src="{{ asset('eduglobal_assets/owlcarousel/js/owl.carousel.min.js') }}"></script>
<!-- magnific-popup min js  -->
<script src="{{ asset('eduglobal_assets/js/magnific-popup.min.js') }}"></script>
<!-- waypoints min js  -->
<script src="{{ asset('eduglobal_assets/js/waypoints.min.js') }}"></script>
<!-- parallax js  -->
<script src="{{ asset('eduglobal_assets/js/parallax.js') }}"></script>
<!-- countdown js  -->
<script src="{{ asset('eduglobal_assets/js/jquery.countdown.min.js') }}"></script>
<!-- jquery.counterup.min js -->
<script src="{{ asset('eduglobal_assets/js/jquery.counterup.min.js') }}"></script>
<!-- imagesloaded js -->
<script src="{{ asset('eduglobal_assets/js/imagesloaded.pkgd.min.js') }}"></script>
<!-- isotope min js -->
<script src="{{ asset('eduglobal_assets/js/isotope.min.js') }}"></script>
<!-- jquery.parallax-scroll js -->
<script src="{{ asset('eduglobal_assets/js/jquery.parallax-scroll.js') }}"></script>
<!-- scripts js -->
<script src="{{ asset('eduglobal_assets/js/scripts.js') }}"></script>

</body>
</html>
