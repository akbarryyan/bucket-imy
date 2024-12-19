<!--Header Section Start-->
<div class="header-section d-none d-lg-block">
    <div class="main-header">
      <div class="container position-relative">
        <div class="row align-items-center">
          <div class="col-lg-2">
            <div class="header-logo">
              <a href="index.html"
                ><img src="{{ asset('assets/user/images/logo/logo.png') }}" alt=""
              /></a>
            </div>
          </div>
          <div class="col-lg-7 position-static">
            <div class="site-main-nav">
              <nav class="site-nav">
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li>
                    <a href="#">Shop <span class="new">New</span></a>

                    <ul class="mega-sub-menu">
                      <li class="mega-dropdown">
                        <a class="mega-title" href="#">Shop</a>

                        <ul class="mega-item">
                          <li>
                            <a href="shop-grid-3.html">Shop Grid 3</a>
                          </li>
                          <li>
                            <a href="shop-grid-4.html">Shop Grid 4</a>
                          </li>
                          <li><a href="shop-list.html">Shop List</a></li>
                          <li>
                            <a href="shop-grid-left-sidebar.html"
                              >Shop Grid Left Sidebar</a
                            >
                          </li>
                          <li>
                            <a href="shop-grid-right-sidebar.html"
                              >Shop Grid Right Sidebar</a
                            >
                          </li>
                          <li>
                            <a href="shop-list-left-sidebar.html"
                              >Shop List Left Sidebar</a
                            >
                          </li>
                          <li>
                            <a href="shop-list-right-sidebar.html"
                              >Shop List Right Sidebar</a
                            >
                          </li>
                        </ul>
                      </li>
                      <li class="mega-dropdown">
                        <a class="mega-title" href="#">Shop Single</a>

                        <ul class="mega-item">
                          <li>
                            <a href="shop-single.html">Shop Single</a>
                          </li>
                          <li>
                            <a href="shop-single-affiliate.html"
                              >Shop Single Affiliate</a
                            >
                          </li>
                          <li>
                            <a href="shop-single-variable.html"
                              >Shop Single Variable</a
                            >
                          </li>
                          <li>
                            <a href="shop-single-group.html"
                              >Shop Single Group</a
                            >
                          </li>
                        </ul>
                      </li>
                      <li class="mega-dropdown">
                        <a class="mega-title" href="#">Page</a>

                        <ul class="mega-item">
                          <li><a href="cart.html">Cart</a></li>
                          <li><a href="wishlist.html">Wishlist</a></li>
                          <li><a href="compare.html">Compare</a></li>
                          <li><a href="checkout.html">Checkout</a></li>
                          <li><a href="empty-cart.html">Empty Cart</a></li>
                          <li><a href="my-account.html">My Account</a></li>
                        </ul>
                      </li>
                      <li class="mega-dropdown">
                        <a class="menu-banner" href="#">
                          <img
                            src="{{ asset('assets/user/images/menu-banner.jpg') }}"
                            alt=""
                          />
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Blog</a>

                    <ul class="sub-menu">
                      <li>
                        <a href="#">Blog</a>
                        <ul class="sub-menu">
                          <li><a href="blog.html">Blog</a></li>
                          <li>
                            <a href="blog-left-sidebar.html"
                              >Blog Left Sidebar</a
                            >
                          </li>
                          <li>
                            <a href="blog-right-sidebar.html"
                              >Blog Right Sidebar</a
                            >
                          </li>
                        </ul>
                      </li>
                      <li>
                        <a href="#">Blog Single</a>
                        <ul class="sub-menu">
                          <li>
                            <a href="blog-single-left-sidebar.html"
                              >Blog Single Left Sidebar</a
                            >
                          </li>
                          <li>
                            <a href="blog-single-right-sidebar.html"
                              >Blog Single Right Sidebar</a
                            >
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Pages <span class="sale">Sale</span></a>
                    <ul class="sub-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="cart.html">Cart</a></li>
                      <li><a href="wishlist.html">Wishlist</a></li>
                      <li><a href="compare.html">Compare</a></li>
                      <li><a href="checkout.html">Checkout</a></li>
                      <li><a href="empty-cart.html">Empty Cart</a></li>
                      <li><a href="my-account.html">My Account</a></li>
                      <li><a href="login.html">Login</a></li>
                      <li><a href="register.html">Register</a></li>
                    </ul>
                  </li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="header-meta-info">
              <div class="header-search">
                <form action="#">
                  <input type="text" placeholder="Search our store " />
                  <button><i class="icon-search"></i></button>
                </form>
              </div>
              <div class="header-account">
                <div class="header-account-list dropdown top-link">
                  <a href="#" role="button" data-bs-toggle="dropdown"
                    ><i class="icon-users"></i
                  ></a>

                  <ul class="dropdown-menu">
                    <li><a href="#">Delivery</a></li>
                    <li><a href="#">Legal Notice</a></li>
                    <li><a href="#">Secure payment</a></li>
                    <li><a href="#">Sitemap</a></li>
                    <li><a href="#">About us</a></li>
                    <li>
                        <form action="{{ route('user.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button></li>
                        </form>
                  </ul>
                </div>
                <div class="header-account-list dropdown mini-cart">
                  <a href="#" role="button" data-bs-toggle="dropdown">
                      <i class="icon-shopping-bag"></i>
                      <span class="item-count">0</span>
                  </a>
              
                  <ul class="dropdown-menu">
                      <li class="product-cart" id="mini-cart-items">
                          <!-- Items will be dynamically inserted here -->
                      </li>
                      <li class="product-total">
                          <ul class="cart-total">
                              <li>Total : <span id="mini-cart-total"></span></li>
                          </ul>
                      </li>
                      <li class="product-btn">
                          <a href="checkout.html" class="btn btn-dark d-block">Checkout</a>
                      </li>
                  </ul>
              </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Header Section End-->

  <!--Header Mobile Start-->
  <div class="header-mobile d-lg-none">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6">
          <div class="header-logo">
            <a href="index.html"
              ><img src="{{ asset('assets/user/images/logo/logo.png') }}" alt=""
            /></a>
          </div>
        </div>
        <div class="col-6">
          <div class="header-meta-info">
            <div class="header-account">
              <div class="header-account-list dropdown top-link">
                <a href="#" role="button" data-bs-toggle="dropdown"
                  ><i class="icon-users"></i
                ></a>

                <ul class="dropdown-menu">
                  <li><a href="#">Delivery</a></li>
                  <li><a href="#">Legal Notice</a></li>
                  <li><a href="#">Secure payment</a></li>
                  <li><a href="#">Sitemap</a></li>
                  <li><a href="#">About us</a></li>
                </ul>
              </div>
              <div class="header-account-list mini-cart">
                <a href="#">
                  <i class="icon-shopping-bag"></i>
                  <span class="item-count">0</span>
                </a>
              </div>
              <div class="header-account-list mobile-menu-trigger">
                <button id="menu-trigger">
                  <span></span>
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Header Mobile End-->

  <!--Header Mobile Menu Start-->
  <div class="header-mobile-menu d-lg-none">
    <a href="javascript:void(0)" class="mobile-menu-close">
      <span></span>
      <span></span>
    </a>

    <div class="header-meta-info">
      <div class="header-search">
        <form action="#">
          <input type="text" placeholder="Search our store " />
          <button><i class="icon-search"></i></button>
        </form>
      </div>
    </div>

    <div class="site-main-nav">
      <nav class="site-nav">
        <ul class="navbar-mobile-wrapper">
          <li><a href="index.html">Home</a></li>
          <li>
            <a href="#">Shop <span class="new">New</span></a>

            <ul class="mega-sub-menu">
              <li class="mega-dropdown">
                <a class="mega-title" href="#">Shop</a>

                <ul class="mega-item">
                  <li><a href="shop-grid-3.html">Shop Grid 3</a></li>
                  <li><a href="shop-grid-4.html">Shop Grid 4</a></li>
                  <li><a href="shop-list.html">Shop List</a></li>
                  <li>
                    <a href="shop-grid-left-sidebar.html"
                      >Shop Grid Left Sidebar</a
                    >
                  </li>
                  <li>
                    <a href="shop-grid-right-sidebar.html"
                      >Shop Grid Right Sidebar</a
                    >
                  </li>
                  <li>
                    <a href="shop-list-left-sidebar.html"
                      >Shop List Left Sidebar</a
                    >
                  </li>
                  <li>
                    <a href="shop-list-right-sidebar.html"
                      >Shop List Right Sidebar</a
                    >
                  </li>
                </ul>
              </li>
              <li class="mega-dropdown">
                <a class="mega-title" href="#">Shop Single</a>

                <ul class="mega-item">
                  <li><a href="shop-single.html">Shop Single</a></li>
                  <li>
                    <a href="shop-single-affiliate.html"
                      >Shop Single Affiliate</a
                    >
                  </li>
                  <li>
                    <a href="shop-single-variable.html"
                      >Shop Single Variable</a
                    >
                  </li>
                  <li>
                    <a href="shop-single-group.html">Shop Single Group</a>
                  </li>
                </ul>
              </li>
              <li class="mega-dropdown">
                <a class="mega-title" href="#">Page</a>

                <ul class="mega-item">
                  <li><a href="cart.html">Cart</a></li>
                  <li><a href="wishlist.html">Wishlist</a></li>
                  <li><a href="compare.html">Compare</a></li>
                  <li><a href="checkout.html">Checkout</a></li>
                  <li><a href="empty-cart.html">Empty Cart</a></li>
                  <li><a href="my-account.html">My Account</a></li>
                </ul>
              </li>
              <li class="mega-dropdown">
                <a class="menu-banner" href="#">
                  <img src="assets_user/images/menu-banner.jpg" alt="" />
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">Blog</a>

            <ul class="sub-menu">
              <li>
                <a href="#">Blog</a>
                <ul class="sub-menu">
                  <li><a href="blog.html">Blog</a></li>
                  <li>
                    <a href="blog-left-sidebar.html">Blog Left Sidebar</a>
                  </li>
                  <li>
                    <a href="blog-right-sidebar.html">Blog Right Sidebar</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#">Blog Single</a>
                <ul class="sub-menu">
                  <li>
                    <a href="blog-single-left-sidebar.html"
                      >Blog Single Left Sidebar</a
                    >
                  </li>
                  <li>
                    <a href="blog-single-right-sidebar.html"
                      >Blog Single Right Sidebar</a
                    >
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">Pages <span class="sale">Sale</span></a>
            <ul class="sub-menu">
              <li><a href="about.html">About</a></li>
              <li><a href="cart.html">Cart</a></li>
              <li><a href="wishlist.html">Wishlist</a></li>
              <li><a href="compare.html">Compare</a></li>
              <li><a href="checkout.html">Checkout</a></li>
              <li><a href="empty-cart.html">Empty Cart</a></li>
              <li><a href="my-account.html">My Account</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="register.html">Register</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </div>

    <div class="header-social">
      <ul class="social">
        <li>
          <a href="#"><i class="fa fa-facebook"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-instagram"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-linkedin"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-pinterest"></i></a>
        </li>
      </ul>
    </div>
  </div>
  <!--Header Mobile Menu End-->