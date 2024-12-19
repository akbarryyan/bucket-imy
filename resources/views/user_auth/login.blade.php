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
      <!--Footer Section Start-->
      <div class="footer-area">
        <div class="container">
            <div class="footer-widget-area section-padding-6">
                <div class="row justify-content-between">
                <!--Footer Widget Start-->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                    <a class="footer-logo" href="#"
                        ><img src="{{ asset('assets/user/images/logo/logo-white.png') }}" alt=""
                    /></a>
                    <div class="footer-widget-text">
                        <p>
                        A perfect blend of creativity, energy, communication,
                        happiness and love. Let us arrange a smile for you.
                        </p>
                    </div>
                    <div class="widget-social">
                        <ul>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </li>
                        </ul>
                    </div>
                    </div>
                    <!--Footer Widget End-->
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                    <h4 class="footer-widget-title">Information</h4>

                    <div class="footer-widget-menu">
                        <ul>
                        <li><a href="#">Search Terms</a></li>
                        <li><a href="#">Advanced Search</a></li>
                        <li><a href="#">Helps & Faqs</a></li>
                        <li><a href="#">Store Location</a></li>
                        <li><a href="#">Orders & Returns</a></li>
                        </ul>
                    </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                    <h4 class="footer-widget-title">My Account</h4>

                    <div class="footer-widget-menu">
                        <ul>
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Legal Notice</a></li>
                        <li><a href="#">Secure payment</a></li>
                        <li><a href="#">Sitemap</a></li>
                        <li><a href="about.html">About us</a></li>
                        </ul>
                    </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                    <h4 class="footer-widget-title">Help</h4>

                    <div class="footer-widget-menu">
                        <ul>
                        <li><a href="#">FAQ’s</a></li>
                        <li><a href="#">Pricing Plans</a></li>
                        <li><a href="#">Track</a></li>
                        <li><a href="#">Your Order</a></li>
                        <li><a href="#">Returns</a></li>
                        </ul>
                    </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-widget">
                    <h4 class="footer-widget-title">Customer Service</h4>

                    <div class="footer-widget-menu">
                        <ul>
                        <li><a href="my-account.html">My Account</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Deliveries & Returns</a></li>
                        <li><a href="#">Gift card</a></li>
                        <li><a href="#">Legal Notice</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!--Footer Section End-->

        <!--Copyright Section Start-->
        <div class="copyright-section">
            <div class="container">
            <div
                class="copyright-wrapper text-center d-lg-flex align-items-center justify-content-between"
            >
                <!--Right Start-->
                <div class="copyright-content">
                <p>
                    Copyright 2022 &copy;
                    <a href="https://hasthemes.com/">HasThemes</a> . All Rights
                    Reserved
                </p>
                </div>
                <!--Right End-->

                <!--Right Start-->
                <div class="copyright-payment">
                <img src="{{ asset('assets/user/images/payment.png') }}" alt="" />
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
