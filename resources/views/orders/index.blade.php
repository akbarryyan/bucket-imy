@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Orders</h1>
    @if (session('success'))
        <div class="alert alert-info mt-2" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Status</th>
                <th>Items</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td class="text-capitalize"><span class="status-{{ strtolower($order->status) }}"> {{ $order->status }} </span</td>
                <td>
                    @foreach($order->orderItems as $item)
                    <div>{{ $item->product->name }} (x{{ $item->quantity }})</div>
                    @endforeach
                </td>
                <td>
                    Rp. {{ number_format($order->orderItems->sum(fn($item) => $item->quantity * $item->price, 0)) }}
                </td>
                <td>
                    <!-- Anda dapat menambahkan tombol aksi di sini jika diperlukan -->
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No orders found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
