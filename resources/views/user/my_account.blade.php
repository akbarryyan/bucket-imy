@extends('layouts.user.app')

@section('content')
<!--Page Banner Start-->
<div class="page-banner" style="background-image: url({{ asset('assets/user/images/testimonial-bg.webp') }});">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">My Account</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<!--My Account Start-->
<div class="register-page section-padding-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-4">
                <div class="my-account-menu mt-30">
                    <ul class="nav account-menu-list flex-column">
                        <li>
                            <a class="active" data-bs-toggle="pill" href="#pills-dashboard"><i class="fa fa-tachometer"></i> Dashboard</a>
                        </li>
                        <li>
                            <a data-bs-toggle="pill" href="#pills-order"><i class="fa fa-shopping-cart"></i> Orders</a>
                        </li>
                        <li>
                            <a data-bs-toggle="pill" href="#pills-custom-order"><i class="fa fa-shopping-cart"></i> Custom Orders</a>
                        </li>
                        <li>
                            <a data-bs-toggle="pill" href="#pills-account"><i class="fa fa-user"></i> Account Details</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8 col-md-8">
                <div class="tab-content my-account-tab mt-30" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-dashboard">
                        <div class="my-account-dashboard account-wrapper">
                            <h4 class="account-title">Dashboard</h4>
                            <div class="welcome-dashboard">
                                <p>Hello, <strong>{{ Auth::user()->name }}</strong> (Not you? <a href="">Logout</a>)</p>
                            </div>
                            <p class="mt-25">From your account dashboard, you can easily check & view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-order">
                        <div class="my-account-order account-wrapper">
                            <h4 class="account-title">Orders</h4>
                            <div class="account-table text-center mt-30 table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="no">No</th>
                                            <th class="name">Name</th>
                                            <th class="date">Date</th>
                                            <th class="status">Status</th>
                                            <th class="total">Total</th>
                                            <th class="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order-table-body">
                                        <!-- Data orders akan dimuat di sini melalui AJAX -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-custom-order">
                        <div class="my-account-order account-wrapper">
                            <h4 class="account-title">Custom Orders</h4>
                            <div class="account-table text-center mt-30 table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="no">No</th>
                                            <th class="date">Date</th>
                                            <th class="status">Status</th>
                                            <th class="total">Total</th>
                                            <th class="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customOrders as $index => $customOrder)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $customOrder->created_at->format('M d, Y') }}</td>
                                            <td>{{ ucfirst($customOrder->status) }}</td>
                                            <td>Rp. {{ number_format($customOrder->total_price, 0) }}</td>
                                            <td><a href="{{ route('customOrder.show', $customOrder->id) }}">View</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-account">
                        <div class="my-account-details account-wrapper">
                            <h4 class="account-title">Account Details</h4>
                            <form action="{{ route('account.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="account-details">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form">
                                                <h5 class="title">Password change</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form">
                                                <input type="password" name="current_password" placeholder="Current Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <input type="password" name="new_password" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <input type="password" name="new_password_confirmation" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <button class="btn btn-primary">Save Change</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--My Account End-->

<script>
$(document).ready(function() {
    $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
        if (e.target.hash === '#pills-order') {
            $.ajax({
                url: '{{ route('orders.get') }}',
                method: 'GET',
                success: function(orders) {
                    let ordersTable = $('#order-table-body');
                    ordersTable.empty();
                    if (orders.length > 0) {
                        orders.forEach((order, index) => {
                            ordersTable.append(`
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${order.product_name}</td>
                                    <td>${new Date(order.created_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</td>
                                    <td>${order.status.charAt(0).toUpperCase() + order.status.slice(1)}</td>
                                    <td>Rp. ${order.total.toLocaleString()}</td>
                                    <td><a href="/order/${order.id}">View</a></td>
                                </tr>
                            `);
                        });
                    } else {
                        ordersTable.append('<tr><td colspan="6">No orders found</td></tr>');
                    }
                },
                error: function() {
                    alert('Failed to fetch orders. Please try again.');
                }
            });
        }
    });
});
</script>
@endsection
