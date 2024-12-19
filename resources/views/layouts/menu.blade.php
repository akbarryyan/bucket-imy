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

              <li class="menu-title">Apps</li>

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

              <li class="menu-title">Components</li>

              <li class="nav-item">
                   <a class="nav-link menu-arrow" href="#sidebarBaseUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBaseUI">
                        <span class="nav-icon"><iconify-icon icon="solar:fire-broken"></iconify-icon></span>
                        <span class="nav-text"> Base UI </span>
                   </a>
                   <div class="collapse" id="sidebarBaseUI">
                        <ul class="nav sub-navbar-nav">
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-accordion.html">Accordion</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-alerts.html">Alerts</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-avatar.html">Avatar</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-badge.html">Badge</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-breadcrumb.html">Breadcrumb</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-buttons.html">Buttons</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-card.html">Card</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-carousel.html">Carousel</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-collapse.html">Collapse</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-dropdown.html">Dropdown</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-list-group.html">List Group</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-modal.html">Modal</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-tabs.html">Tabs</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-offcanvas.html">Offcanvas</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-pagination.html">Pagination</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-placeholders.html">Placeholders</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-popovers.html">Popovers</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-progress.html">Progress</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-scrollspy.html">Scrollspy</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-spinners.html">Spinners</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-toasts.html">Toasts</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="ui-tooltips.html">Tooltips</a>
                             </li>
                        </ul>
                   </div>
              </li> <!-- end Base UI Menu -->

              <li class="nav-item">
                   <a class="nav-link menu-arrow" href="#sidebarExtendedUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarExtendedUI">
                        <span class="nav-icon"><iconify-icon icon="solar:magic-stick-3-broken"></iconify-icon></span>
                        <span class="nav-text"> Advanced UI </span>
                   </a>
                   <div class="collapse" id="sidebarExtendedUI">
                        <ul class="nav sub-navbar-nav">
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="extended-ratings.html">Ratings</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="extended-sweetalert.html">Sweet Alert</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="extended-swiper-silder.html">Swiper Slider</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="extended-scrollbar.html">Scrollbar</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="extended-toastify.html">Toastify</a>
                             </li>
                        </ul>
                   </div>
              </li> <!-- end Extended UI Menu -->

              <li class="nav-item">
                   <a class="nav-link menu-arrow" href="#sidebarCharts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCharts">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:chart-square-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Charts </span>
                   </a>
                   <div class="collapse" id="sidebarCharts">
                        <ul class="nav sub-navbar-nav">
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-area.html">Area</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-bar.html">Bar</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-bubble.html">Bubble</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-candlestick.html">Candlestick</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-column.html">Column</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-heatmap.html">Heatmap</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-line.html">Line</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-mixed.html">Mixed</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-timeline.html">Timeline</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-boxplot.html">Boxplot</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-treemap.html">Treemap</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-pie.html">Pie</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-radar.html">Radar</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-radialbar.html">RadialBar</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-scatter.html">Scatter</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="charts-apex-polar-area.html">Polar Area</a>
                             </li>
                        </ul>
                   </div>
              </li> <!-- end Chart library Menu -->

              <li class="nav-item">
                   <a class="nav-link menu-arrow" href="#sidebarForms" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:checklist-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Forms </span>
                   </a>
                   <div class="collapse" id="sidebarForms">
                        <ul class="nav sub-navbar-nav">
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="forms-basic.html">Basic Elements</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="forms-checkbox-radio.html">Checkbox &amp; Radio</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="forms-choices.html">Choice Select</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="forms-clipboard.html">Clipboard</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="forms-flatepicker.html">Flatepicker</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="forms-validation.html">Validation</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="forms-wizard.html">Wizard</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="forms-fileuploads.html">File Upload</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="forms-editors.html">Editors</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="forms-input-mask.html">Input Mask</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="forms-range-slider.html">Slider</a>
                             </li>
                        </ul>
                   </div>
              </li> <!-- end Form Menu -->

              <li class="nav-item">
                   <a class="nav-link menu-arrow" href="#sidebarTables" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTables">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:bedside-table-4-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Tables </span>
                   </a>
                   <div class="collapse" id="sidebarTables">
                        <ul class="nav sub-navbar-nav">
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="tables-basic.html">Basic Tables</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="tables-gridjs.html">Grid Js</a>
                             </li>
                        </ul>
                   </div>
              </li> <!-- end Table Menu -->

              <li class="nav-item">
                   <a class="nav-link menu-arrow" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:bicycling-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Icons </span>
                   </a>
                   <div class="collapse" id="sidebarIcons">
                        <ul class="nav sub-navbar-nav">
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="icons-boxicons.html">Boxicons</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="icons-solar.html">Solar Icons</a>
                             </li>
                        </ul>
                   </div>
              </li> <!-- end Icons library Menu -->

              <li class="nav-item">
                   <a class="nav-link menu-arrow" href="#sidebarMaps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMaps">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:streets-map-point-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Maps </span>
                   </a>
                   <div class="collapse" id="sidebarMaps">
                        <ul class="nav sub-navbar-nav">
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="maps-google.html">Google Maps</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="maps-vector.html">Vector Maps</a>
                             </li>
                        </ul>
                   </div>
              </li> <!-- end Map Menu -->

              <li class="nav-item">
                   <a class="nav-link" href="javascript:void(0);">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:football-broken"></iconify-icon>
                        </span>
                        <span class="nav-text">Badge Menu</span>
                        <span class="badge bg-primary badge-pill text-end">1</span>
                   </a>
              </li>

              <li class="nav-item">
                   <a class="nav-link menu-arrow" href="#sidebarMultiLevelDemo" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultiLevelDemo">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:share-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Menu Item </span>
                   </a>
                   <div class="collapse" id="sidebarMultiLevelDemo">
                        <ul class="nav sub-navbar-nav">
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link" href="javascript:void(0);">Menu Item 1</a>
                             </li>
                             <li class="sub-nav-item">
                                  <a class="sub-nav-link  menu-arrow" href="#sidebarItemDemoSubItem" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarItemDemoSubItem">
                                       <span> Menu Item 2 </span>
                                  </a>
                                  <div class="collapse" id="sidebarItemDemoSubItem">
                                       <ul class="nav sub-navbar-nav">
                                            <li class="sub-nav-item">
                                                 <a class="sub-nav-link" href="javascript:void(0);">Menu Sub item</a>
                                            </li>
                                       </ul>
                                  </div>
                             </li>
                        </ul>
                   </div>
              </li> <!-- end Demo Menu Item -->

              <li class="nav-item">
                   <a class="nav-link disabled" href="javascript:void(0);">
                        <span class="nav-icon">
                             <iconify-icon icon="solar:dislike-broken"></iconify-icon>
                        </span>
                        <span class="nav-text"> Disable Item </span>
                   </a>
              </li> <!-- end Demo Menu Item -->
         </ul>
    </div>
</div>