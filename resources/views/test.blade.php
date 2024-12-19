@extends('layouts.user.app')
@section('content')
<!--Page Banner Start-->
<div class="page-banner" style="background-image: url({{ asset('assets/user/images/testimonial-bg.webp') }});">
  <div class="container">
      <div class="page-banner-content text-center">
          <h2 class="title">Checkout</h2>
          <ol class="breadcrumb justify-content-center">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
          </ol>
      </div>
  </div>
</div>
<!--Page Banner End-->

<!--Start-->
<div class="checkout-page section-padding-5">
  <div class="container">
      <form action="#">
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
                                    <select class="select2" id="shipping_method" name="shipping_method">
                                        <option value="0">Select a country…</option>
                                        <option value="pickup">Pickup</option>
                                        <option value="courier">Courier</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                          <div class="col-sm-6">
                              <div class="single-form">
                                  <label>Delivery/Pickup Time *</label>
                                  <input type="datetime-local" id="delivery_time" name="delivery_time">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="single-form">
                                  <label>Payment Proof</label>
                                  <input type="file" id="payment_proof" name="payment_proof">
                              </div>
                          </div>
                      </div>

                      <div class="single-form checkout-note">
                        <label>Shipping Address *</label>
                        <textarea placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
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
                                  <tr>
                                      <td class="Product-name">
                                          <p>Bodysuit With Long Sleeves × 1</p>
                                      </td>
                                      <td class="Product-price">
                                          <p>£150.00</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="Product-name">
                                          <p>Classic Polo Shirt × 1</p>
                                      </td>
                                      <td class="Product-price">
                                          <p>£150.00</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="Product-name">
                                          <p>Trousers With Side Stripe × 1</p>
                                      </td>
                                      <td class="Product-price">
                                          <p>£150.00</p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="Product-name">
                                          <p>Biker Jacket × 1</p>
                                      </td>
                                      <td class="Product-price">
                                          <p>£150.00</p>
                                      </td>
                                  </tr>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <td class="Product-name">
                                          <p>Total</p>
                                      </td>
                                      <td class="total-price">
                                          <p>£600.00</p>
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
                                          <input type="radio" name="radio" id="bank">
                                          <label for="bank"><span></span> Direct bank transfer </label>

                                          <div class="payment-details">
                                              <p>Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <div class="single-payment">
                                      <div class="payment-radio cus-radio">
                                          <input type="radio" name="radio" id="cash" checked="checked">
                                          <label for="cash"><span></span> Cash on Delivery</label>

                                          <div class="payment-details">
                                              <p>Pay with cash upon delivery.</p>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                          </ul>

                          <div class="checkout-btn">
                              <a class="btn btn-primary btn-block" href="#">Place Order</a>
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