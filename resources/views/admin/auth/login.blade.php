<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Sign In 2 | Rasket - Responsive Admin Dashboard Template</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico">') }}

     <!-- Vendor css (Require in all Page) -->
     <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ asset('assets/js/config.min.js') }}"></script>

</head>

<body class="authentication-bg">

     <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
          <div class="container">
               <div class="row justify-content-center">
                    <div class="col-xl-5">
                         <div class="card auth-card">
                              <div class="card-body px-3 py-5">
                                   <div class="mx-auto mb-4 text-center auth-logo">
                                        <a href="index.html" class="logo-dark">
                                             <img src="{{ asset('assets/images/logo-sm.png') }}" height="30" class="me-1" alt="logo sm">
                                             <img src="{{ asset('assets/images/logo-dark.png') }}" height="24" alt="logo dark">
                                        </a>

                                        <a href="index.html" class="logo-light">
                                             <img src="{{ asset('assets/images/logo-sm.png') }}" height="30" class="me-1" alt="logo sm">
                                             <img src="{{ asset('assets/images/logo-light.png') }}" height="24" alt="logo light">
                                        </a>
                                   </div>

                                   <h2 class="fw-bold text-center fs-18">Sign In</h2>
                                   <p class="text-muted text-center mt-1 mb-4">Enter your email address and password to access admin panel.</p>

                                   <div class="px-4">
                                        <form action="{{ route('admin.login.submit') }}" method="POST" class="authentication-form">
                                             @csrf
                                             <div class="mb-3">
                                                  <label class="form-label" for="email">Email</label>
                                                  <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                                             </div>
                                             <div class="mb-3">
                                                  <a href="auth-password.html" class="float-end text-muted text-unline-dashed ms-1">Reset password</a>
                                                  <label class="form-label" for="password">Password</label>
                                                  <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                             </div>
                                             <div class="mb-3">
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                                       <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                                  </div>
                                             </div>

                                             <div class="mb-1 text-center d-grid">
                                                  <button class="btn btn-primary" type="submit">Sign In</button>
                                             </div>
                                        </form>

                                        <p class="mt-3 fw-semibold no-span">OR sign with</p>

                                        <div class="text-center">
                                             <a href="javascript:void(0);" class="btn btn-light shadow-none"><i class='bx bxl-google fs-20'></i></a>
                                             <a href="javascript:void(0);" class="btn btn-light shadow-none"><i class='bx bxl-facebook fs-20'></i></a>
                                             <a href="javascript:void(0);" class="btn btn-light shadow-none"><i class='bx bxl-github fs-20'></i></a>
                                        </div>
                                   </div> <!-- end col -->
                              </div> <!-- end card-body -->
                         </div> <!-- end card -->

                         <p class="mb-0 text-center">New here? <a href="auth-signup.html" class="text-reset fw-bold ms-1">Sign Up</a></p>

                    </div> <!-- end col -->
               </div> <!-- end row -->
          </div>
     </div>

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="{{ asset('assets/js/vendor.js') }}"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="{{ asset('assets/js/app.js') }}"></script>


</body>

</html>