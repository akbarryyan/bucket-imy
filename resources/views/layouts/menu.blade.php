<div class="main-nav">
    <!-- Menu Toggle Button (sm-hover) -->
    <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
         <iconify-icon icon="solar:hamburger-menu-broken" class="button-sm-hover-icon"></iconify-icon>
    </button>

    <div class="scrollbar mt-4" data-simplebar>

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
                             <iconify-icon icon="solar:book-bookmark-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Custom Materials </span>
                   </a>
              </li>

              <li class="nav-item">
                   <a class="nav-link" href="{{ route('admin.customOrders.index') }}">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:clipboard-remove-bold"></iconify-icon>
                        </span>
                        <span class="nav-text"> Custom Transactions </span>
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
           <!-- end Demo Menu Item -->
         </ul>
    </div>
</div>