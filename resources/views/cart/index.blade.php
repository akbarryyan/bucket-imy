@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Cart</h1>
    @if (session('success'))
        <div class="alert alert-info mt-2" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger mt-2" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->product->price * $item->quantity }}</td>
                <td>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('cart.checkout') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="shipping_address" class="form-label">Shipping Address</label>
            <input type="text" id="shipping_address" name="shipping_address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="shipping_method" class="form-label">Shipping Method</label>
            <select id="shipping_method" name="shipping_method" class="form-select" required>
                <option value="pickup">Pick Up</option>
                <option value="courier">Courier</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="payment_proof" class="form-label">Payment Proof</label>
            <input type="file" id="payment_proof" name="payment_proof" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="delivery_time" class="form-label">Delivery/Pickup Time</label>
            <input type="datetime-local" id="delivery_time" name="delivery_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Checkout</button>
    </form>
</div>
@endsection
