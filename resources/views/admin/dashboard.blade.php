@extends('layouts.app')

@section('content')
<div class="row">
         <!-- Existing cards for users, products, and orders -->
         <div class="col-md-6 col-xl-3">
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-6">
                             <div class="avatar-md bg-light bg-opacity-50 rounded">
                                 <iconify-icon icon="solar:leaf-bold-duotone" class="fs-32 text-success avatar-title"></iconify-icon>
                             </div>
                         </div> <!-- end col -->
                         <div class="col-6 text-end">
                             <p class="text-muted mb-0 text-truncate">Total Profit Today</p>
                             <h3 class="text-dark mt-1 mb-0 fs-4">Rp. {{ number_format($todayProfit, 0) }}</h3>
                         </div> <!-- end col -->
                     </div> <!-- end row-->
                 </div> <!-- end card body -->
                 <div class="card-footer border-0 py-2 bg-light bg-opacity-50">
                     <div class="d-flex align-items-center justify-content-between">
                         <div>
                             <span class="text-muted ms-1 fs-12">Profit calculated for today</span>
                         </div>
                         <a href="{{ route('admin.profits') }}" class="text-reset fw-semibold fs-12">View More</a>
                     </div>
                 </div> <!-- end card body -->
             </div> <!-- end card -->
         </div>
    <div class="col-md-6 col-xl-3">
         <div class="card">
              <div class="card-body">
                   <div class="row">
                        <div class="col-6">
                             <div class="avatar-md bg-light bg-opacity-50 rounded">
                                  <iconify-icon icon="solar:dollar-minimalistic-bold" class="fs-32 text-success avatar-title"></iconify-icon>
                             </div>
                        </div> <!-- end col -->
                        <div class="col-6 text-end">
                             <p class="text-muted mb-0 text-truncate">Total Transactions</p>
                             <h3 class="text-dark mt-1 mb-0">{{ $ordersCount }}</h3>
                        </div> <!-- end col -->
                   </div> <!-- end row-->
              </div> <!-- end card body -->
              <div class="card-footer border-0 py-2 bg-light bg-opacity-50">
                   <div class="d-flex align-items-center justify-content-between">
                    <div>
                         <span class="text-muted ms-1 fs-12">Transactions for today</span>
                    </div>
                    <a href="{{ route('admin.transactions.index') }}" class="text-reset fw-semibold fs-12">View More</a>
                   </div>
              </div> <!-- end card body -->
         </div> <!-- end card -->
    </div> <!-- end col -->
    <div class="col-md-6 col-xl-3">
         <div class="card">
              <div class="card-body">
                   <div class="row">
                        <div class="col-6">
                             <div class="avatar-md bg-light bg-opacity-50 rounded">
                                  <iconify-icon icon="solar:layers-bold-duotone" class="fs-32 text-success avatar-title"></iconify-icon>
                             </div>
                        </div> <!-- end col -->
                        <div class="col-6 text-end">
                             <p class="text-muted mb-0 text-truncate">Total Products</p>
                             <h3 class="text-dark mt-1 mb-0">{{ $productsCount }}</h3>
                        </div> <!-- end col -->
                   </div> <!-- end row-->
              </div> <!-- end card body -->
              <div class="card-footer border-0 py-2 bg-light bg-opacity-50">
                   <div class="d-flex align-items-center justify-content-between">
                        <div>
                         <span class="text-muted ms-1 fs-12">Total Products for today</span>
                        </div>
                        <a href="{{ route('admin.products.index') }}" class="text-reset fw-semibold fs-12">View More</a>
                   </div>
              </div> <!-- end card body -->
         </div> <!-- end card -->
    </div> <!-- end col -->
    <div class="col-md-6 col-xl-3">
         <div class="card">
              <div class="card-body">
                   <div class="row">
                        <div class="col-6">
                             <div class="avatar-md bg-light bg-opacity-50 rounded">
                                  <iconify-icon icon="solar:users-group-two-rounded-bold-duotone" class="fs-32 text-success avatar-title"></iconify-icon>
                             </div>
                        </div> <!-- end col -->
                        <div class="col-6 text-end">
                             <p class="text-muted mb-0 text-truncate">Total Customers</p>
                             <h3 class="text-dark mt-1 mb-0">{{ $usersCount }}</h3>
                        </div> <!-- end col -->
                   </div> <!-- end row-->
              </div> <!-- end card body -->
              <div class="card-footer border-0 py-2 bg-light bg-opacity-50">
                   <div class="d-flex align-items-center justify-content-between">
                        <div>
                             <span class="text-danger"> <i class="bx bxs-down-arrow fs-12"></i> 10.6%</span>
                             <span class="text-muted ms-1 fs-12">Last Month</span>
                        </div>
                        <a href="#!" class="text-reset fw-semibold fs-12">View More</a>
                   </div>
              </div> <!-- end card body -->
         </div> <!-- end card -->
    </div> <!-- end col -->
</div>

<div class="row">
    <!-- Card for Sales Performance -->
    <div class="col">
     <div class="card">
         <div class="card-body p-0">
             <div class="row g-0">
                 <div class="col-lg-6 border-start border-end">
                     <div class="p-3">
                         <div class="d-flex justify-content-between align-items-center">
                             <h4 class="card-title">Performance</h4>
                             <div>
                                 <button type="button" class="btn btn-sm btn-outline-light">ALL</button>
                                 <button type="button" class="btn btn-sm btn-outline-light">1M</button>
                                 <button type="button" class="btn btn-sm btn-outline-light">6M</button>
                                 <button type="button" class="btn btn-sm btn-outline-light active">1Y</button>
                             </div>
                         </div>
                         <div dir="ltr">
                             <canvas id="sales-chart" class="apex-charts"></canvas>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fetch sales data
    fetch('{{ route('admin.salesData') }}')
    .then(response => response.json())
    .then(data => {
        const dates = data.map(item => item.date);
        const totalOrders = data.map(item => item.total_orders);

        const ctx = document.getElementById('sales-chart').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(54, 162, 235, 0.2)');
        gradient.addColorStop(1, 'rgba(54, 162, 235, 0)');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Total Orders',
                    data: totalOrders,
                    backgroundColor: gradient,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: true,
                    segment: {
                         borderColor: (ctx) => {
                              return ctx.p0.parsed.y > ctx.p1.parsed.y ? 'rgba(255, 99, 132, 1)' : 'rgba(54, 162, 235, 1)';
                         },
                         borderWidth: 2,
                    }
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Orders'
                        }
                    }
                }
            }
        });
    });
});
</script>
@endsection