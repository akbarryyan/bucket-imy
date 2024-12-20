@extends('layouts.user.app')

@section('content')
        <!--Page Banner Start-->
        <div class="page-banner" style="background-image: url(assets/images/testimonial-bg.jpg);">
            <div class="container">
                <div class="page-banner-content text-center">
                    <h2 class="title">My Account</h2>
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                                    <a data-bs-toggle="pill" href="#pills-order"><i class="fa fa-shopping-cart"></i> Order</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="pill" href="#pills-order"><i class="fa fa-shopping-cart"></i> Custom Order</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="pill" href="#pills-account"><i class="fa fa-user"></i> Account Details</a>
                                </li>
                                <li>
                                    <a href="login.html"><i class="fa fa-sign-out"></i> Logout</a>
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
                                        <p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni !</strong> <a href="login.html">Logout</a> )</p>
                                    </div>
                                    <p class="mt-25">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
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
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Mostarizing Oil</td>
                                                    <td>Aug 22, 2022</td>
                                                    <td>Pending</td>
                                                    <td>$100</td>
                                                    <td><a href="#">View</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-account">
                                <div class="my-account-details account-wrapper">
                                    <h4 class="account-title">Account Details</h4>

                                    <div class="account-details">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-form">
                                                    <input type="text" placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form">
                                                    <input type="text" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form">
                                                    <h5 class="title">Password change</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form">
                                                    <input type="password" placeholder="Current Password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form">
                                                    <input type="password" placeholder="New Password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form">
                                                    <input type="password" placeholder="Confirm Password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form">
                                                    <button class="btn btn-primary">Save Change</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--My Account End-->
@endsection