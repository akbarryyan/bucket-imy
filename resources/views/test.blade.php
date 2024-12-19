@extends('layouts.user.app')
@section('content')
<!--Page Banner Start-->
<div class="page-banner" style="background-image: url({{ asset('assets/user/images/testimonial-bg.webp') }});">
  <div class="container">
      <div class="page-banner-content text-center">
          <h2 class="title">Products</h2>
          <ol class="breadcrumb justify-content-center">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Products</li>
          </ol>
      </div>
  </div>
</div>
<!--Page Banner End-->

<!--Shop Start-->
<div class="shop-page section-padding-6">
  <div class="container">

      <!--Shop Top Bar Start-->
      <div class="shop-top-bar d-sm-flex align-items-center justify-content-between">
          <div class="top-bar-btn">
              <ul class="nav"">
                  <li class=" nav-item"><a class="nav-link grid active" data-bs-toggle="tab" href="#grid"></a></li>
                  <li class="nav-item"><a class="nav-link list" data-bs-toggle="tab" href="#list"></a></li>
              </ul>
          </div>
          <div class="top-bar-sorter">
              <div class="sorter-wrapper d-flex align-items-center">
                  <label>Sort by:</label>
                  <select class="sorter wide" name="SortBy" id="SortBy">
                      <option value="manual">Featured</option>
                      <option value="best-selling">Best Selling</option>
                      <option value="title-ascending">Alphabetically, A-Z</option>
                      <option value="title-descending">Alphabetically, Z-A</option>
                      <option value="price-ascending">Price, low to high</option>
                      <option value="price-descending">Price, high to low</option>
                      <option value="created-descending">Date, new to old</option>
                      <option value="created-ascending">Date, old to new</option>
                  </select>
              </div>
          </div>
          <div class="top-bar-page-amount">
              <p>Showing 1 - 9 of 10 result</p>
          </div>
      </div>
      <!--Shop Top Bar End-->


      <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="grid" role="tabpanel">
              <div class="row">
                @foreach($products as $product)
                  <div class="col-lg-3 col-sm-6">
                      <div class="single-product">
                          <div class="product-image">
                              <a href="shop-single.html">
                                @if ($product->image)
                                  <img src="{{ asset('storage/' . $product->image) }}" alt="">
                                @endif
                              </a>

                              <span class="sticker-new soldout-title">Soldout</span>

                              <div class="action-links">
                                  <ul>
                                      <li><a href="cart.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to cart"><i class="icon-shopping-bag"></i></a></li>
                                      <li><a href="compare.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Compare"><i class="icon-sliders"></i></a></li>
                                      <li><a href="wishlist.html" data-bs-tooltip="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                      <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="product-content text-center">
                              <div class="rating">
                                  <div class="rating-on" style="width: 80%;"></div>
                              </div>
                              <h4 class="product-name"><a href="shop-single.html">{{ $product->name }}</a></h4>
                              <div class="price-box">
                                  <span class="current-price">Rp. {{ number_format($product->price, 0) }}</span>
                                  <span class="old-price">$29.00</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
          <div class="tab-pane fade" id="list" role="tabpanel">
              <div class="single-product product-list">
                  <div class="product-image">
                      <a href="shop-single.html">
                          <img src="{{ asset('assets/user/images/product/product-4.jpg') }}" alt="">
                      </a>

                      <div class="action-links">
                          <ul>
                              <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="product-content">
                      <div class="rating">
                          <div class="rating-on" style="width: 80%;"></div>
                      </div>
                      <h4 class="product-name"><a href="shop-single.html">Foxglove Flower</a></h4>
                      <div class="price-box">
                          <span class="current-price">$79.00</span>
                      </div>
                      <p>we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of...</p>

                      <ul class="action-links">
                          <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                          <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                          <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                      </ul>
                  </div>
              </div>

              <div class="single-product product-list">
                  <div class="product-image">
                      <a href="shop-single.html">
                          <img src="{{ asset('assets/user/images/product/product-8.jpg') }}" alt="">
                      </a>

                      <span class="sticker-new label-sale">-34%</span>

                      <div class="action-links">
                          <ul>
                              <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="product-content">
                      <div class="rating">
                          <div class="rating-on" style="width: 80%;"></div>
                      </div>
                      <h4 class="product-name"><a href="shop-single.html">Lity Majesty Palm</a></h4>
                      <div class="price-box">
                          <span class="current-price">$19.00</span>
                          <span class="old-price">$29.00</span>
                      </div>
                      <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>

                      <ul class="action-links">
                          <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                          <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                          <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                      </ul>
                  </div>
              </div>

              <div class="single-product product-list">
                  <div class="product-image">
                      <a href="shop-single.html">
                          <img src="{{ asset('assets/user/images/product/product-9.jpg') }}" alt="">
                      </a>

                      <span class="sticker-new soldout-title">Soldout</span>

                      <div class="action-links">
                          <ul>
                              <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="product-content">
                      <div class="rating">
                          <div class="rating-on" style="width: 80%;"></div>
                      </div>
                      <h4 class="product-name"><a href="shop-single.html">Majesty Palm</a></h4>
                      <div class="price-box">
                          <span class="current-price">$19.00</span>
                          <span class="old-price">$29.00</span>
                      </div>
                      <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>

                      <ul class="action-links">
                          <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                          <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                          <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                      </ul>
                  </div>
              </div>

              <div class="single-product product-list">
                  <div class="product-image">
                      <a href="shop-single.html">
                          <img src="{{ asset('assets/user/images/product/product-2.jpg') }}" alt="">
                      </a>

                      <div class="action-links">
                          <ul>
                              <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="left" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-eye"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="product-content">
                      <div class="rating">
                          <div class="rating-on" style="width: 80%;"></div>
                      </div>
                      <h4 class="product-name"><a href="shop-single.html">Rock Soapwort</a></h4>
                      <div class="price-box">
                          <span class="current-price">$50.00</span>
                      </div>
                      <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will</p>

                      <ul class="action-links">
                          <li><a href="javascript:void(0);" class="add-cart" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to cart"> Add to cart </a></li>
                          <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wishlist"><i class="icon-heart"></i></a></li>
                          <li><a href="javascript:void(0);" data-bs-tooltip="tooltip" data-bs-placement="top" title="Compare" class="compare"><i class="icon-sliders"></i></a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>


      <!--Pagination Start-->
      <div class="page-pagination">
          <ul class="pagination justify-content-center">
              <li class="page-item"><a class="page-link prev" href="#">Prev</a></li>
              <li class="page-item"><a class="page-link active" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link next" href="#">Next</a></li>
          </ul>
      </div>
      <!--Pagination End-->


  </div>
</div>
<!--Shop End-->
@endsection