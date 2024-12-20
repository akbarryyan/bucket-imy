@extends('layouts.user.app')
@section('content')
<!--Start-->
<div class="checkout-page section-padding-5">
    <div class="container">
        <form action="{{ route('cart.customCheckout.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
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
                        </div>

                        <div class="payment-proof-field single-form" style="display: none;">
                            <label for="payment_proof" class="form-label">Payment Proof *</label>
                            <div class="input-group">
                                <input type="file" id="payment_proof" name="payment_proof" class="form-control" aria-describedby="paymentProofHelpBlock">
                            </div>
                            <small id="paymentProofHelpBlock" class="form-text text-muted">
                                Please upload the proof of your payment. Accepted formats: jpeg, png, jpg, gif, svg. Max size: 2MB.
                            </small>
                        </div>

                        <div class="bank-selection-field single-select2" style="display: none;">
                            <label>Choose Account *</label>
                            <div class="form-select2">
                                <select class="select2" id="account_id" name="account_id">
                                    <option value="">Select an account...</option>
                                    @foreach($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->bank_name }} - {{ $payment->account_number }} - {{ $payment->account_name }}</option>
                                    @endforeach
                                </select>
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
                                        <th class="Product-name">Material</th>
                                        <th class="Product-price">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->details as $detail)
                                    <tr>
                                        <td class="Product-name">
                                            <p>{{ $detail->material->name }}</p>
                                        </td>
                                        <td class="Product-price">
                                            <p>Rp. {{ number_format($detail->price, 0) }}</p>
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
                                            <p>Rp. {{ number_format($order->total_price, 0) }}</p>
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
                                            <label for="bank"><span></span> Transfer </label>
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

                            

                            <div class="checkout-btn mt-4">
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

<script>
$(document).ready(function() {
    $('input[name="payment_method"]').on('change', function() {
        var paymentMethod = $(this).val();
        if (paymentMethod === 'bank') {
            $('.payment-proof-field').show();
            $('.bank-selection-field').show();
        } else {
            $('.payment-proof-field').hide();
            $('.bank-selection-field').hide();
        }
    });
});
</script>
@endsection
