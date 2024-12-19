@extends('layouts.user.app')
@section('content')
<!--Page Banner Start-->
<div class="page-banner" style="background-image: url({{ asset('assets/user/images/testimonial-bg.webp') }});">
  <div class="container">
      <div class="page-banner-content text-center">
          <h2 class="title">Checkout</h2>
          <ol class="breadcrumb justify-content-center">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.user') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
          </ol>
      </div>
  </div>
</div>
<!--Page Banner End-->

<!--Start-->
<div class="checkout-page section-padding-5">
  <div class="container">
      <form action="{{ route('cart.checkout.post') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="col-lg-7">
                  <div class="checkout-form mt-30">

                      <div class="checkout-title">
                          <h4 class="title">Billing details</h4>
                      </div>

                      <div class="row">
                          <div class="col-sm-6">
                            <div class="single-select2">
                                <label>Shipping Method *</label>
                                <div class="form-select2">
                                    <select class="select2" id="shipping_method" name="shipping_method" required>
                                        <option value="">Select a shipping method...</option>
                                        <option value="pickup">Pickup</option>
                                        <option value="courier">Courier</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                          <div class="col-sm-6">
                              <div class="single-form">
                                  <label>Delivery/Pickup Time *</label>
                                  <input type="datetime-local" id="delivery_time" name="delivery_time" required>
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="single-form">
                                  <label>Payment Proof *</label>
                                  <input type="file" id="payment_proof" name="payment_proof" required>
                              </div>
                          </div>
                      </div>

                      <div class="single-form checkout-note">
                        <label>Shipping Address *</label>
                        <textarea id="shipping_address" name="shipping_address" placeholder="Enter your shipping address..." required></textarea>
                      </div>

                  </div>
              </div>
              <div class="col-lg-5">
                  <div class="checkout-review-order mt-30">
                      <div class="checkout-title">
                          <h4 class="title">Your Order</h4>
                      </div>

                      <div class="checkout-review-order-table table-responsive mt-15">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th class="Product-name">Product</th>
                                      <th class="Product-price">Total</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($cart->items as $item)
                                  <tr>
                                      <td class="Product-name">
                                          <p>{{ $item->product->name }} × {{ $item->quantity }}</p>
                                      </td>
                                      <td class="Product-price">
                                          <p>Rp. {{ number_format($item->quantity * $item->product->price, 0) }}</p>
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <td class="Product-name">
                                          <p>Total</p>
                                      </td>
                                      <td class="total-price">
                                          <p>Rp. {{ number_format($cart->items->sum(fn($item) => $item->quantity * $item->product->price), 0) }}</p>
                                      </td>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>

                      <div class="checkout-payment">
                          <ul>
                              <li>
                                  <div class="single-payment">
                                      <div class="payment-radio cus-radio">
                                          <input type="radio" name="payment_method" id="bank" value="bank">
                                          <label for="bank"><span></span> Direct bank transfer </label>

                                          <div class="payment-details" style="display:none;">
                                              <p>Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <div class="single-payment">
                                      <div class="payment-radio cus-radio">
                                          <input type="radio" name="payment_method" id="cash" value="cash" checked="checked">
                                          <label for="cash"><span></span> Cash on Delivery</label>

                                          <div class="payment-details">
                                              <p>Pay with cash upon delivery.</p>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                          </ul>

                          <div class="checkout-btn">
                              <button type="submit" class="btn btn-primary btn-block">Place Order</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </form>
  </div>
</div>
<!--End-->
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const bankRadio = document.getElementById('bank');
    const cashRadio = document.getElementById('cash');
    const paymentProofInput = document.getElementById('payment_proof').closest('.single-form');
    const paymentDetails = document.querySelector('.payment-details');

    function togglePaymentProof() {
        if (bankRadio.checked) {
            paymentProofInput.style.display = 'block';
            paymentDetails.style.display = 'block';
        } else {
            paymentProofInput.style.display = 'none';
            paymentDetails.style.display = 'none';
        }
    }

    // Inisialisasi tampilan berdasarkan pilihan saat ini
    togglePaymentProof();

    // Tambahkan event listener ke radio button
    bankRadio.addEventListener('change', togglePaymentProof);
    cashRadio.addEventListener('change', togglePaymentProof);
});
</script>
