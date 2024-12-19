<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Analytics | Rasket - Responsive Admin Dashboard Template</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

     <!-- Vendor css (Require in all Page) -->
     <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ asset('assets/js/config.min.js') }}"></script>

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
     <style>
          .status-pending {
               background-color: #F8AC59;
               padding: 0.5rem;
               border-radius: 0.25rem;
               font-size: 14px;
               color: white;
          }

          .status-completed {
               background-color: #1BB394;
               padding: 0.5rem;
               border-radius: 0.25rem;
               font-size: 14px;
               color: white;
          }

          .status-canceled {
               background-color: #ED5565;
               padding: 0.5rem;
               border-radius: 0.25rem;
               font-size: 14px;
               color: white;
          }

     </style>
</head>

<body>

     <!-- START Wrapper -->
     <div class="wrapper">
        
          <!-- Topbar Start -->
          @include('layouts.topbar')

          @include('layouts.right-sidebar')
          <!-- ========== Topbar End ========== -->

          <!-- ========== App Menu Start ========== -->
          @include('layouts.menu')
          <!-- ========== App Menu End ========== -->

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">

               <!-- Start Container Fluid -->
               <div class="container-fluid">

                    <!-- Start here.... -->
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

                    @include('layouts.footer')