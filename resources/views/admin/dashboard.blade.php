@extends('layouts.app')

@section('content')
<div class="row">
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
                             <p class="text-muted mb-0 text-truncate">Page View</p>
                             <h3 class="text-dark mt-1 mb-0">13, 647</h3>
                        </div> <!-- end col -->
                   </div> <!-- end row-->
              </div> <!-- end card body -->
              <div class="card-footer border-0 py-2 bg-light bg-opacity-50">
                   <div class="d-flex align-items-center justify-content-between">
                        <div>
                             <span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i> 2.3%</span>
                             <span class="text-muted ms-1 fs-12">Last Month</span>
                        </div>
                        <a href="#!" class="text-reset fw-semibold fs-12">View More</a>
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
                                  <iconify-icon icon="solar:dollar-minimalistic-bold" class="fs-32 text-success avatar-title"></iconify-icon>
                             </div>
                        </div> <!-- end col -->
                        <div class="col-6 text-end">
                             <p class="text-muted mb-0 text-truncate">Total Pembelian</p>
                             <h3 class="text-dark mt-1 mb-0">{{ $ordersCount }}</h3>
                        </div> <!-- end col -->
                   </div> <!-- end row-->
              </div> <!-- end card body -->
              <div class="card-footer border-0 py-2 bg-light bg-opacity-50">
                   <div class="d-flex align-items-center justify-content-between">
                        <div>
                             <span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i> 8.1%</span>
                             <span class="text-muted ms-1 fs-12">Last Month</span>
                        </div>
                        <a href="#!" class="text-reset fw-semibold fs-12">View More</a>
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
                             <span class="text-danger"> <i class="bx bxs-down-arrow fs-12"></i> 0.3%</span>
                             <span class="text-muted ms-1 fs-12">Last Month</span>
                        </div>
                        <a href="#!" class="text-reset fw-semibold fs-12">View More</a>
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
                             <p class="text-muted mb-0 text-truncate">Total Pengguna</p>
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
    <div class="col">
         <div class="card">
              <div class="card-body p-0">
                   <div class="row g-0">
                        <div class="col-lg-3">
                             <div class="p-3">
                                  <h5 class="card-title">Conversions</h5>
                                  <div id="conversions" class="apex-charts mb-2 mt-n2"></div>
                                  <div class="row text-center">
                                       <div class="col-6">
                                            <p class="text-muted mb-2">This Week</p>
                                            <h3 class="text-dark mb-3">23.5k</h3>
                                       </div> <!-- end col -->
                                       <div class="col-6">
                                            <p class="text-muted mb-2">Last Week</p>
                                            <h3 class="text-dark mb-3">41.05k</h3>
                                       </div> <!-- end col -->
                                  </div> <!-- end row -->
                                  <div class="text-center">
                                       <button type="button" class="btn btn-light shadow-none w-100">View Details</button>
                                  </div> <!-- end row -->
                             </div>
                        </div> <!-- end left chart card -->
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
                                  </div> <!-- end card-title-->

                                  <div class="alert alert-warning mt-3 text text-truncate mb-0" role="alert">
                                       We regret to inform you that our server is currently experiencing technical difficulties.
                                  </div>

                                  <div dir="ltr">
                                       <div id="dash-performance-chart" class="apex-charts"></div>
                                  </div>
                             </div>
                        </div> <!-- end right chart card -->

                        <div class="col-lg-3">
                             <h5 class="card-title p-3">Session By Browser</h5>
                             <div class="px-3" data-simplebar style="max-height: 310px;">
                                  <div class="d-flex justify-content-between align-items-center p-2">
                                       <span class="align-middle fw-medium">Chrome</span>
                                       <span class="fw-semibold text-muted">62.5%</span>
                                       <span class="fw-semibold text-muted">5.06k</span>
                                  </div>

                                  <div class="d-flex justify-content-between align-items-center p-2">
                                       <span class="align-middle fw-medium">Firefox</span>
                                       <span class="fw-semibold text-muted">12.3%</span>
                                       <span class="fw-semibold text-muted">1.5k</span>
                                  </div>

                                  <div class="d-flex justify-content-between align-items-center p-2">
                                       <span class="align-middle fw-medium">Safari</span>
                                       <span class="fw-semibold text-muted">9.86%</span>
                                       <span class="fw-semibold text-muted">1.03k</span>
                                  </div>

                                  <div class="d-flex justify-content-between align-items-center p-2">
                                       <span class="align-middle fw-medium">Brave</span>
                                       <span class="fw-semibold text-muted">3.15%</span>
                                       <span class="fw-semibold text-muted">0.3k</span>
                                  </div>

                                  <div class="d-flex justify-content-between align-items-center p-2">
                                       <span class="align-middle fw-medium">Opera</span>
                                       <span class="fw-semibold text-muted">3.01%</span>
                                       <span class="fw-semibold text-muted">1.58k</span>
                                  </div>

                                  <div class="d-flex justify-content-between align-items-center p-2">
                                       <span class="align-middle fw-medium">Falkon</span>
                                       <span class="fw-semibold text-muted">2.8%</span>
                                       <span class="fw-semibold text-muted">0.01k</span>
                                  </div>

                                  <div class="d-flex justify-content-between align-items-center p-2">
                                       <span class="align-middle fw-medium">Web</span>
                                       <span class="fw-semibold text-muted">1.05%</span>
                                       <span class="fw-semibold text-muted">2.51k</span>
                                  </div>

                                  <div class="d-flex justify-content-between align-items-center p-2">
                                       <span class="align-middle fw-medium">Other</span>
                                       <span class="fw-semibold text-muted">6.38%</span>
                                       <span class="fw-semibold text-muted">3.6k</span>
                                  </div>
                             </div>
                             <div class="text-center p-3">
                                  <button type="button" class="btn btn-light shadow-none w-100">View All</button>
                             </div> <!-- end row -->
                        </div>
                   </div> <!-- end chart card -->
              </div> <!-- end card body -->
         </div> <!-- end card -->
    </div> <!-- end col -->
</div>
@endsection