<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title', 'HomePage - Bucket Indramayu')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Favicon -->
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="{{ asset('assets/user/images/favicon.png') }}"
    />

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="assets_user/css/vendor/bootstrap.min.css"> -->

    <!-- Icon Font CSS -->
    <!-- <link rel="stylesheet" href="assets_user/css/vendor/plazaicon.css">
    <link rel="stylesheet" href="assets_user/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="assets_user/css/vendor/font-awesome.min.css"> -->

    <!-- Plugins CSS -->
    <!-- <link rel="stylesheet" href="assets_user/css/plugins/animate.css">
    <link rel="stylesheet" href="assets_user/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets_user/css/plugins/select2.min.css"> -->

    <!-- Helper CSS -->
    <!-- <link rel="stylesheet" href="assets_user/css/helper.css"> -->

    <!-- Main Style CSS -->
    <!-- <link rel="stylesheet" href="assets_user/css/style.css"> -->

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <link rel="stylesheet" href="{{ asset('assets/user/css/plugins-min/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  </head>

  <body>
    <div class="main-wrapper">
        <!--Top Notification Start-->
        <div class="top-notification-bar text-center">
            <div class="container">
            <div class="notification-entry">
                <p>All featured product 50% off <a href="#">Shop Now</a></p>
            </div>
            </div>
            <div class="notification-close">
            <button class="notification-close-btn">
                <i class="fa fa-times"></i>
            </button>
            </div>
        </div>
        <!--Top Notification End-->

        @include('layouts.user.header')

        @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
                    <script>
                         @if (session('success'))
                              Toastify({
                                   text: "{{ session('success') }}",
                                   duration: 3000,
                                   gravity: "top",
                                   position: "center",
                                   backgroundColor: "green"
                              }).showToast();
                         @endif
                         @if (session('error'))
                              Toastify({
                                   text: "{{ session('error') }}",
                                   duration: 3000,
                                   gravity: "top",
                                   position: "center",
                                   backgroundColor: "red"
                              }).showToast();
                         @endif
                    </script>
        <div class="overlay"></div>
        <!--Overlay-->

        @include('layouts.user.footer')