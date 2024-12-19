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
                            <div class="col-sm-12 payment-proof-field" style="display: none;">
                                <div class="single-form">
                                    <label for="payment_proof" class="form-label">Payment Proof *</label>
                                    <div class="input-group">
                                        <input type="file" id="payment_proof" name="payment_proof" class="form-control" aria-describedby="paymentProofHelpBlock" required>
                                    </div>
                                    <small id="paymentProofHelpBlock" class="form-text text-muted">
                                        Please upload the proof of your payment. Accepted formats: jpeg, png, jpg, gif, svg. Max size: 2MB.
                                    </small>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 bank-selection-field" style="display: none;">
                                <div class="single-select2">
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
                            </div>
                            <div class="col-sm-12 account-details-field" style="display: none;">
                                <div class="single-form">
                                    <label>Bank Name</label>
                                    <input type="text" id="bank_name" name="bank_name" readonly>
                                </div>
                                <div class="single-form">
                                    <label>Account Number</label>
                                    <input type="text" id="account_number" name="account_number" readonly>
                                </div>
                                <div class="single-form">
                                    <label>Account Name</label>
                                    <input type="text" id="account_name" name="account_name" readonly>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const bankRadio = document.getElementById('bank');
    const cashRadio = document.getElementById('cash');
    const paymentProofInput = document.querySelector('.payment-proof-field');
    const bankSelectionField = document.querySelector('.bank-selection-field');
    const accountDetailsField = document.querySelector('.account-details-field');
    const accountSelect = document.getElementById('account_id');

    function togglePaymentProof() {
        if (bankRadio.checked) {
            paymentProofInput.style.display = 'block';
            bankSelectionField.style.display = 'block';
            toggleAccountDetails(); // Toggle based on account selection
        } else {
            paymentProofInput.style.display = 'none';
            bankSelectionField.style.display = 'none';
            accountDetailsField.style.display = 'none';
        }
    }

    function toggleAccountDetails() {
        const selectedAccount = accountSelect.options[accountSelect.selectedIndex];
        if (selectedAccount.value) {
            const accountDetails = selectedAccount.text.split(' - ');
            document.getElementById('bank_name').value = accountDetails[0];
            document.getElementById('account_number').value = accountDetails[1];
            document.getElementById('account_name').value = accountDetails[2]; // Ensure account_name is set correctly
            accountDetailsField.style.display = 'block';
        } else {
            accountDetailsField.style.display = 'none';
        }
    }

    // Inisialisasi tampilan berdasarkan pilihan saat ini
    togglePaymentProof();

    // Tambahkan event listener ke radio button dan select
    bankRadio.addEventListener('change', togglePaymentProof);
    cashRadio.addEventListener('change', togglePaymentProof);
    accountSelect.addEventListener('change', toggleAccountDetails);
});
</script>
@endsection
