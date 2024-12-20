@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Custom Order Details</h2>

    <div class="card">
        <div class="card-header">Order Details</div>
        <div class="card-body">
            <p><strong>User:</strong> {{ $order->user->name }}</p>
            <p><strong>Total Price:</strong> Rp. {{ number_format($order->total_price, 0) }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>
            <p><strong>Shipping Method:</strong> {{ $order->shipping_method }}</p>
            <p><strong>Delivery Time:</strong> {{ $order->delivery_time }}</p>
            <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
            <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
            @if($order->payment_proof)
                <p><strong>Payment Proof:</strong> <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank">View Proof</a></p>
            @endif
            <h4>Materials</h4>
            <ul>
                @foreach ($order->details as $detail)
                    <li>{{ $detail->material->name }} - Rp. {{ number_format($detail->price, 0) }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
