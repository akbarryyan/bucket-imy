<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title', 'HomePage - Bucket Indramayu')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <head>
     <!-- ... -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <!-- ... -->
 </head>
 
  </head>

  <body>
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

        @include('layouts.user.header')

        <div class="overlay"></div>
        <!--Overlay-->
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
                    <script>
                        $(document).ready(function() {
    // Muat data mini-cart saat halaman dimuat
    $.ajax({
        url: "{{ route('cart.data') }}",
        type: 'GET',
        success: function(data) {
            updateMiniCart(data);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });

    $('.add-to-cart-btn').on('click', function(event) {
        const productId = $(this).data('product-id');
        const form = $(this).closest('form');
        const formData = form.serialize();

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Sertakan token CSRF
            },
            success: function(data) {
                updateMiniCart(data);
                showToast("Product added to cart successfully!");
                console.log("Add to cart success:", data);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    function updateMiniCart(data) {
        const miniCartItems = $('#mini-cart-items');
        const miniCartTotal = $('#mini-cart-total');
        const itemCount = $('.item-count');
        const miniCartContainer = $('#table-pagination');  // Pastikan elemen ini memiliki ID 'table-pagination'

        miniCartItems.empty();
        let total = 0;

        if (data.cart && data.cart.items.length > 0) {
            data.cart.items.forEach(item => {
                const formattedPrice = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(item.product.price);
                miniCartItems.append(`
                    <div class="single-cart-box">
                        <div class="cart-img">
                            <a href="shop-single.html">
                                <img src="/storage/${item.product.image}" alt="${item.product.name}" />
                            </a>
                            <span class="pro-quantity">${item.quantity}x</span>
                        </div>
                        <div class="cart-content">
                            <h6 class="title">
                                <a href="shop-single.html">${item.product.name}</a>
                            </h6>
                            <div class="cart-price">
                                <span class="sale-price">${formattedPrice}</span>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="del-icon" data-item-id="${item.id}"><i class="fa fa-trash"></i></a>
                    </div>
                `);

                total += item.quantity * item.product.price;
            });

            itemCount.text(data.cart.items.length);
            miniCartContainer.css('overflow', 'auto'); // Aktifkan overflow saat ada item
        } else {
            miniCartItems.append(`
                <div class="no-items-cart text-center py-3">
                    <p class="mb-0">No items in cart</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary mt-2">Start Shopping</a>
                </div>
            `);
            itemCount.text(0);
            miniCartContainer.css('overflow', 'hidden'); // Nonaktifkan overflow saat tidak ada item
        }

        const formattedTotal = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(total);
        miniCartTotal.text(formattedTotal);

        // Tambahkan event listener ke tombol hapus baru
        addDeleteEventListeners();
    }

    function addDeleteEventListeners() {
        $('.del-icon').off('click').on('click', function(event) {
            const itemId = $(this).data('item-id');
            event.preventDefault();

            console.log("Attempting to delete item with ID:", itemId); // Debugging

            $.ajax({
                url: `/cart/remove/${itemId}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Sertakan token CSRF
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(data) {
                    updateMiniCart(data);
                    showToast("Product removed from cart successfully!");
                    console.log("Delete success:", data); // Debugging
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    console.log("Delete error:", xhr.responseText); // Debugging
                }
            });
        });
    }

    function showToast(message) {
        Toastify({
            text: message,
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
        }).showToast();
    }
});

                    </script>

        @include('layouts.user.footer')