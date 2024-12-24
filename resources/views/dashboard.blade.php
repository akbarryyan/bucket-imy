@extends('layouts.user.app')
@section('content')
      <!--Slider Start-->
      <div class="slider-area">
        <div class="swiper-container slider-active">
          <div class="swiper-wrapper">
            <!--Single Slider Start-->
            <div
              class="single-slider swiper-slide animation-style-01"
              style="
                background-image: url({{ asset('assets/images/slider-1.webp') }});
              "
            >
              <div class="container">
                <div class="slider-content">
                  <h5 class="sub-title">
                    20% Off For <br />
                    New Members
                  </h5>
                  <h2 class="main-title">Your Special Day!</h2>
                  <p>We are here for your Special Day</p>

                  <ul class="slider-btn">
                    <li>
                      <a
                        href="{{ route('products.index') }}"
                        class="btn btn-round btn-primary"
                        >Start Shopping</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!--Single Slider End-->

            <!--Single Slider Start-->
            <div
              class="single-slider swiper-slide animation-style-01"
              style="
                background-image: url({{ asset('assets/images/slider-2.webp') }});
              "
            >
              <div class="container">
                <div class="slider-content">
                  <h5 class="sub-title">
                    20% Off For <br />
                    New Members
                  </h5>
                  <h2 class="main-title">Happy Mother’s Day!</h2>
                  <p>Bouquets your mom will love!</p>

                  <ul class="slider-btn">
                    <li>
                      <a
                        href="shop-single.html"
                        class="btn btn-round btn-primary"
                        >Start Shopping</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!--Single Slider End-->
          </div>
          <!--Swiper Wrapper End-->

          <!-- Add Arrows -->
          <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
          <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>

          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div>
        <!--Swiper Container End-->
      </div>
      <!--Slider End-->

      <!--Shipping Start-->
      <div class="shipping-area section-padding-3">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <div class="single-shipping">
                <div class="shipping-icon">
                  <img
                    src="assets/user/images/shipping-icon/Free-Delivery.png"
                    alt=""
                  />
                </div>
                <div class="shipping-content">
                  <h5 class="title">Free Delivery</h5>
                  <p>Free shipping around the world</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="single-shipping">
                <div class="shipping-icon">
                  <img
                    src="assets/user/images/shipping-icon/Online-Order.png"
                    alt=""
                  />
                </div>
                <div class="shipping-content">
                  <h5 class="title">Online Order</h5>
                  <p>Don’t worry you can order Online by our Site</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="single-shipping">
                <div class="shipping-icon">
                  <img
                    src="assets/user/images/shipping-icon/Freshness.png"
                    alt=""
                  />
                </div>
                <div class="shipping-content">
                  <h5 class="title">Freshness</h5>
                  <p>You have freshness flowers every single order</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="single-shipping">
                <div class="shipping-icon">
                  <img
                    src="assets/user/images/shipping-icon/Made-By-Artists.png"
                    alt=""
                  />
                </div>
                <div class="shipping-content">
                  <h5 class="title">Made by Artists</h5>
                  <p>World for all made by artists orders over now</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Shipping End-->

      <!--New Product Start-->
      <div class="new-product-area section-padding-2">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-11">
              <div class="section-title text-center">
                <h2 class="title">New Products</h2>
                <p>
                  A perfect blend of creativity, energy, communication,
                  happiness and love. Let us arrange a smile for you.
                </p>
              </div>
            </div>
          </div>
          <div class="product-wrapper">
            <div class="swiper-container product-active">
              <div class="swiper-wrapper">
                @foreach($featured as $product)
                <div class="swiper-slide">
                  <div class="single-product">
                    <div class="product-image">
                      <a href="shop-single.html">
                        @if ($product->image)
                        <img
                          src="{{ asset('storage/' . $product->image) }}"
                          alt=""
                        />
                        @endif
                      </a>

                      <div class="action-links">
                        <ul>
                          <li>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart-form">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="button" class="add-to-cart-btn" data-product-id="{{ $product->id }}">
                                    <i class="icon-shopping-bag"></i>
                                </button>
                            </form>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="product-content text-center">
                      <div class="rating">
                        <div class="rating-on" style="width: 80%"></div>
                      </div>
                      <h4 class="product-name">
                        <a href="shop-single.html">{{ $product->name }}</a>
                      </h4>
                      <div class="price-box">
                        <span class="current-price">Rp. {{ number_format($product->price, 0) }}</span>
                        <span class="old-price">Rp. {{ number_format($product->price + 30000, 0) }}</span>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>

              <!-- Add Arrows -->
              <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
              <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
            </div>
          </div>
        </div>
      </div>
      <!--New Product End-->

      <!--About Start-->
      <div class="about-area section-padding-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="about-image">
                <img src="https://outerbloom.com/cdn/shop/files/5_e30f2dc9-d2ea-4474-afe3-b11b2dd2741d_1024x1024.jpg?v=1707464980" alt="" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="about-content">
                <h2 class="title">
                  Suprise Your Valentine! Let us arrange a smile For Her.
                </h2>
                <p>
                  Where flowers are our inspiration to create lasting memories.
                  Whatever the occasion inspiration to create lasting
                  memories....
                </p>
                <ul>
                  <li>Hand picked just for you.</li>
                  <li>Hand picked just for you.</li>
                  <li>Hand picked just for.</li>
                </ul>
                <div class="about-btn">
                  <a href="{{ route('products.index') }}" class="btn btn-primary btn-round">More Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--About End-->

      <!--New Product Start-->
      <div class="features-product-area section-padding-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-11">
              <div class="section-title text-center">
                <h2 class="title">Featured Items</h2>
                <p>
                  A perfect blend of creativity, energy, communication,
                  happiness and love. Let us arrange a smile for you.
                </p>
              </div>
            </div>
          </div>
          <div class="product-wrapper">
            <div class="tab-content product-items-tab">
              <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                <div class="swiper-container product-active">
                  <div class="swiper-wrapper">
                    @foreach($products as $product)
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            @if ($product->image)
                            <img
                              src="{{ asset('storage/' . $product->image) }}"
                              alt=""
                            />
                            @endif
                          </a>

                          <div class="action-links">
                            <ul>
                              <li>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="button" class="add-to-cart-btn" data-product-id="{{ $product->id }}">
                                        <i class="icon-shopping-bag"></i>
                                    </button>
                                </form>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">{{ $product->name }}</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">Rp. {{ number_format($product->price, 0) }}</span>
                            <span class="old-price">Rp. {{ number_format($product->price + 30000, 0) }}</span>
                          </div>
                        </div>
                      </div>

                      {{-- <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="https://outerbloom.com/cdn/shop/products/Love-Medley_2_350x.jpg?v=1671439343"
                              alt=""
                            />
                          </a>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Bucket Kecil Pink Hijau</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">Rp. 120.000</span>
                          </div>
                        </div>
                      </div> --}}
                    </div>
                    @endforeach
                  </div>

                  <!-- Add Arrows -->
                  <div class="swiper-next">
                    <i class="fa fa-angle-right"></i>
                  </div>
                  <div class="swiper-prev">
                    <i class="fa fa-angle-left"></i>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab2" role="tabpanel">
                <div class="swiper-container product-active">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-2.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-27%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Rock Soapwort</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$55.00</span>
                            <span class="old-price">$75.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-9.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new soldout-title">Soldout</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-6.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-10%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Wild Roses</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$21.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-5.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-18%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Summer Savory</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$40.00</span>
                            <span class="old-price">$85.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-8.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-34%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Lity Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-7.jpg') }}"
                              alt=""
                            />
                          </a>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Sweet Alyssum</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$50.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-1.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new soldout-title">Soldout</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Spring Snowflake</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-2.jpg') }}"
                              alt=""
                            />
                          </a>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Rock Soapwort</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$50.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-7.jpg') }}"
                              alt=""
                            />
                          </a>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Sweet Alyssum</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$50.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-9.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new soldout-title">Soldout</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-6.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-10%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Wild Roses</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$21.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-3.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-35%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>

                          <div class="product-countdown">
                            <div data-countdown="2020/12/31"></div>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Scarlet Sage</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$39.00</span>
                            <span class="old-price">$60.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-5.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-18%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Summer Savory</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$40.00</span>
                            <span class="old-price">$85.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-4.jpg') }}"
                              alt=""
                            />
                          </a>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Foxglove Flower</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$79.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-9.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new soldout-title">Soldout</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-8.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-34%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Lity Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-9.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-34%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Lity Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-1.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new soldout-title">Soldout</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Spring Snowflake</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Add Arrows -->
                  <div class="swiper-next">
                    <i class="fa fa-angle-right"></i>
                  </div>
                  <div class="swiper-prev">
                    <i class="fa fa-angle-left"></i>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab3" role="tabpanel">
                <div class="swiper-container product-active">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-8.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-34%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Lity Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-7.jpg') }}"
                              alt=""
                            />
                          </a>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Sweet Alyssum</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$50.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-2.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-27%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Rock Soapwort</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$55.00</span>
                            <span class="old-price">$75.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-9.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new soldout-title">Soldout</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-1.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new soldout-title">Soldout</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Spring Snowflake</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-2.jpg') }}"
                              alt=""
                            />
                          </a>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Rock Soapwort</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$50.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-5.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-18%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Summer Savory</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$40.00</span>
                            <span class="old-price">$85.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-4.jpg') }}"
                              alt=""
                            />
                          </a>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Foxglove Flower</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$79.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-6.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-10%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Wild Roses</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$21.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-5.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-18%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Summer Savory</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$40.00</span>
                            <span class="old-price">$85.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-9.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new soldout-title">Soldout</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-8.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-34%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Lity Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-7.jpg') }}"
                              alt=""
                            />
                          </a>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Sweet Alyssum</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$50.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-9.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new soldout-title">Soldout</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-8.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-34%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Lity Majesty Palm</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-1.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new soldout-title">Soldout</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Spring Snowflake</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$29.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-6.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-10%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Wild Roses</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$19.00</span>
                            <span class="old-price">$21.00</span>
                          </div>
                        </div>
                      </div>

                      <div class="single-product">
                        <div class="product-image">
                          <a href="shop-single.html">
                            <img
                              src="{{ asset('assets/user/images/product/product-3.jpg') }}"
                              alt=""
                            />
                          </a>

                          <span class="sticker-new label-sale">-35%</span>

                          <div class="action-links">
                            <ul>
                              <li>
                                <a
                                  href="cart.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to cart"
                                  ><i class="icon-shopping-bag"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="compare.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Compare"
                                  ><i class="icon-sliders"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="wishlist.html"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Add to Wishlist"
                                  ><i class="icon-heart"></i
                                ></a>
                              </li>
                              <li>
                                <a
                                  href="javascript:void(0);"
                                  data-bs-tooltip="tooltip"
                                  data-bs-placement="left"
                                  title="Quick View"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal"
                                  ><i class="icon-eye"></i
                                ></a>
                              </li>
                            </ul>
                          </div>

                          <div class="product-countdown">
                            <div data-countdown="2020/12/31"></div>
                          </div>
                        </div>
                        <div class="product-content text-center">
                          <div class="rating">
                            <div class="rating-on" style="width: 80%"></div>
                          </div>
                          <h4 class="product-name">
                            <a href="shop-single.html">Scarlet Sage</a>
                          </h4>
                          <div class="price-box">
                            <span class="current-price">$39.00</span>
                            <span class="old-price">$60.00</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Add Arrows -->
                  <div class="swiper-next">
                    <i class="fa fa-angle-right"></i>
                  </div>
                  <div class="swiper-prev">
                    <i class="fa fa-angle-left"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--New Product End-->

      <!--Testimonial Start-->
      <div
        class="testimonial-area"
        style="background-image: url({{ asset('assets/images/testimonial-bg.webp') }})"
      >
        <div class="container">
          <div class="swiper-container testimonial-active">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="single-testimonial text-center">
                  <p>
                    Sangat puas dengan pelayanannya! Buket bunga yang saya pesan datang tepat waktu, bunganya segar, dan rangkaiannya cantik sekali. Terima kasih sudah membuat momen saya jadi lebih spesial!
                  </p>

                  <div class="testimonial-author">
                    <img
                      src="https://htmldemo.net/kngu/assets/images/testimonial-img-1.png"
                      alt=""
                    />
                    <span class="author-name">Ahmad Rizki</span>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="single-testimonial text-center">
                  <p>
                    Pelayanan luar biasa! Buket bunganya persis seperti di gambar, bahkan lebih indah. Cocok untuk hadiah atau acara spesial. Pasti akan pesan lagi.
                  </p>

                  <div class="testimonial-author">
                    <img
                      src="{{ asset('https://htmldemo.net/kngu/assets/images/testimonial-img-2.png') }}"
                      alt=""
                    />
                    <span class="author-name">Rahma Salsa</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Add Arrows -->
            <div class="swiper-next"><i class="fa fa-angle-right"></i></div>
            <div class="swiper-prev"><i class="fa fa-angle-left"></i></div>
          </div>
        </div>
      </div>
      <!--Testimonial End-->
@endsection