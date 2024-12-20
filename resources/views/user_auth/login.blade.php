<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Sign In - Bucket Indramayu</title>
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
      <!--Page Banner Start-->
      <div
        class="page-banner"
        style="background-image: url({{ asset('assets/user/images/testimonial-bg.webp') }})"
      >
        <div class="container">
          <div class="page-banner-content text-center">
            <h2 class="title">Login</h2>
            <ol class="breadcrumb justify-content-center">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
          </div>
        </div>
      </div>
      <!--Page Banner End-->

      <!--Login Start-->
      <div class="login-page section-padding-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="login-register-content">
                <h4 class="title">Login to Your Account</h4>

                <div class="login-register-form">
                  <form action="{{ route('user.login.submit') }}" method="POST">
                    @csrf
                    <div class="single-form">
                      <label for="email">Email Address *</label>
                      <input type="email" id="email" name="email" autocomplete="off" required />
                    </div>
                    <div class="single-form">
                      <label for="password">Password *</label>
                      <input type="password" id="password" name="password" required />
                    </div>
                    <div class="single-form">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <div class="single-form d-flex justify-content-between">
                      <div class="cus-checkbox">
                        <input type="checkbox" id="remember" />
                        <label for="remember"><span></span> Remember Me</label>
                      </div>
                      <div class="forget">
                        <a href="#">Lost Your Password</a>
                      </div>
                    </div>
                    <div class="single-form">
                      <label>You don't have account ?</label>
                      <a href="{{ route('user.register') }}" class="btn btn-dark btn-block"
                        >Create Account Now</a
                      >
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Login End-->
        <!--Copyright Section Start-->
        <div class="copyright-section">
            <div class="container">
            <div
                class="copyright-wrapper text-center d-lg-flex align-items-center justify-content-center"
            >
                <!--Right Start-->
                <div class="copyright-content">
                <p>
                    Copyright 2024 &copy;
                    <a href="https://hasthemes.com/">Kelompok 4</a> . All Rights
                    Reserved
                </p>
                </div>
                <!--Right End-->
            </div>
            </div>
        </div>
        <!--Copyright Section End-->

        <!--Back To Start-->
        <a href="#" class="back-to-top">
            <i class="fa fa-angle-double-up"></i>
        </a>
        <!--Back To End-->
        </div>

        <!-- JS
        ============================================ -->

        <!-- Modernizer JS -->
        <script src="{{ asset('assets/user/js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <!-- jQuery JS -->
        <script src="{{ asset('assets/user/js/vendor/jquery-3.3.1.min.js') }}"></script>
        <!-- Bootstrap JS -->
        <!-- <script src="assets_user/js/vendor/popper.min.js"></script>
        <script src="assets_user/js/vendor/bootstrap.min.js"></script> -->

        <!-- Plugins JS -->
        <!-- <script src="assets_user/js/plugins/swiper-bundle.min.js"></script>
        <script src="assets_user/js/plugins/jquery.countdown.min.js"></script>
        <script src="assets_user/js/plugins/jquery.elevateZoom.min.js"></script>
        <script src="assets_user/js/plugins/select2.min.js"></script>
        <script src="assets_user/js/plugins/ajax-contact.js"></script> -->

        <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
        <script src="{{ asset('assets/user/js/plugins.min.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('assets/user/js/main.js') }}"></script>
</body>
</html>
