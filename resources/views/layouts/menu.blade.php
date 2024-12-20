<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
         <a href="index.html" class="logo-dark">
              <img src="{{ asset('assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
              <img src="{{ asset('assets/images/logo-dark.png') }}" class="logo-lg" alt="logo dark">
         </a>

         <a href="index.html" class="logo-light">
              <img src="{{ asset('assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
              <img src="{{ asset('assets/images/logo-light.png') }}" class="logo-lg" alt="logo light">
         </a>
    </div>

    <!-- Menu Toggle Button (sm-hover) -->
    <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
         <iconify-icon icon="solar:hamburger-menu-broken" class="button-sm-hover-icon"></iconify-icon>
    </button>

    <div class="scrollbar" data-simplebar>

         <ul class="navbar-nav" id="navbar-nav">

              <li class="menu-title">Menu</li>

              <li class="nav-item">
                   <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:home-2-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Dashboard </span>
                        <span class="badge bg-success badge-pill text-end">9+</span>
                   </a>
              </li>

              <li class="menu-title">Access</li>

              <li class="nav-item">
                   <a class="nav-link" href="{{ route('admin.products.index') }}">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:floor-lamp-minimalistic-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Manage Products </span>
                   </a>
              </li>

              <li class="nav-item">
                   <a class="nav-link" href="{{ route('admin.users.index') }}">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:users-group-rounded-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Manage Customers </span>
                   </a>
              </li>
              
              <li class="nav-item">
                   <a class="nav-link" href="{{ route('admin.payments') }}">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:card-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Manage Payments </span>
                   </a>
              </li>

              <li class="nav-item">
                   <a class="nav-link" href="{{ route('admin.transactions.index') }}">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:bill-list-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Manage Transactions </span>
                   </a>
              </li>

              <li class="nav-item">
                   <a class="nav-link" href="{{ route('admin.materials.index') }}">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:bill-list-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Custom Materials </span>
                   </a>
              </li>

              <li class="nav-item">
                   <a class="nav-link" href="{{ route('admin.profits') }}">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:medal-ribbons-star-linear"></iconify-icon>
                        </span>
                        <span class="nav-text"> Manage Profits </span>
                   </a>
              </li>

              <li class="menu-title">Custom</li>

              <li class="nav-item">
                   <a class="nav-link menu-arrow" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:folder-with-files-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Pages </span>
                   </a>
                   <div class="collapse" id="sidebarPages">
                        <ul class="nav sub-navbar-nav">
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="pages-starter.html">Welcome</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="pages-faqs.html">FAQs</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="pages-comingsoon.html">Coming Soon</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="pages-timeline.html">Timeline</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="pages-pricing.html">Pricing</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="pages-maintenance.html">Maintenance</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="pages-404.html">404 Error</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="pages-404-alt.html">404 Error (alt)</a>
                             </li>
                        </ul>
                   </div>
              </li> <!-- end Pages Menu -->

              <li class="nav-item">
                   <a class="nav-link menu-arrow" href="#sidebarAuthentication" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuthentication">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:lock-password-unlocked-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Authentication </span>
                   </a>
                   <div class="collapse" id="sidebarAuthentication">
                        <ul class="nav sub-navbar-nav">
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="auth-signin.html">Sign In</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="auth-signup.html">Sign Up</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="auth-password.html">Reset Password</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="auth-lock-screen.html">Lock Screen</a>
                             </li>
                        </ul>
                   </div>
              </li>

              <li class="nav-item">
                   <a class="nav-link" href="widgets.html">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:gift-broken"></iconify-icon>
                        </span>
                        <span class="nav-text">Widgets</span>
                        <span class="badge bg-danger badge-pill text-end">Hot</span>
                   </a>
              </li>
           <!-- end Demo Menu Item -->
         </ul>
    </div>
</div>