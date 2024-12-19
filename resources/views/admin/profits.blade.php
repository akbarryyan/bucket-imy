@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title anchor mb-1" id="pagination">
                    Manage Profits
                </h5>
                <!-- Button to calculate daily profit -->
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#dailyProfitModal">
                    Calculate Daily Profit
                </button>

                <!-- Button to calculate monthly profit -->
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#monthlyProfitModal">
                    Calculate Monthly Profit
                </button>

                <!-- Tambahkan di dalam card body -->
                <button type="button" class="btn btn-secondary mt-2" onclick="window.location='{{ route('admin.profits.daily-pdf') }}'">
                    Download Daily Profits PDF
                </button>
                <button type="button" class="btn btn-secondary mt-2" onclick="window.location='{{ route('admin.profits.monthly-pdf') }}'">
                    Download Monthly Profits PDF
                </button>

                <!-- Modal to calculate daily profit -->
                <div class="modal fade" id="dailyProfitModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('admin.calculateDailyProfit') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Calculate Daily Profit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to calculate daily profit?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Calculate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal to calculate monthly profit -->
                <div class="modal fade" id="monthlyProfitModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('admin.calculateMonthlyProfit') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Calculate Monthly Profit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to calculate monthly profit?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Calculate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="py-3">
                    <h3 class="mt-1 fs-4">Daily Profits</h3>
                    <div id="table-pagination" class="overflow-x-auto">
                        <div class="gridjs gridjs-container" style="width: 100%">
                            <div class="gridjs-wrapper" style="height: auto">
                                <table role="grid" class="gridjs-table" style="height: auto">
                                    <thead class="gridjs-thead">
                                        <tr class="gridjs-tr">
                                            <th class="gridjs-th" style="width: 80px">
                                                <div class="gridjs-th-content">No</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Date</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Total Profit</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody">
                                        @php $i = 1; @endphp
                                        @foreach($dailyProfits as $dailyProfit)
                                        <tr class="gridjs-tr">
                                            <td class="gridjs-td">{{ $i }}</td>
                                            <td class="gridjs-td">{{ $dailyProfit->date }}</td>
                                            <td class="gridjs-td">Rp. {{ number_format($dailyProfit->total_profit, 2) }}</td>
                                        </tr>
                                        @php $i++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-3">
                    <h3 class="fs-4">Monthly Profits</h3>
                    <div id="table-pagination" class="overflow-x-auto">
                        <div class="gridjs gridjs-container" style="width: 100%">
                            <div class="gridjs-wrapper" style="height: auto">
                                <table role="grid" class="gridjs-table" style="height: auto">
                                    <thead class="gridjs-thead">
                                        <tr class="gridjs-tr">
                                            <th class="gridjs-th" style="width: 80px">
                                                <div class="gridjs-th-content">No</div>
                                            </th>
                                            <th class="gridjs-th" style="width: 492px">
                                                <div class="gridjs-th-content">Month</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Total Profit</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody">
                                        @php $i = 1; @endphp
                                        @foreach($monthlyProfits as $monthlyProfit)
                                        <tr class="gridjs-tr">
                                            <td class="gridjs-td">{{ $i }}</td>
                                            <td class="gridjs-td">{{ $monthlyProfit->month }}</td>
                                            <td class="gridjs-td">Rp. {{ number_format($monthlyProfit->total_profit, 2) }}</td>
                                        </tr>
                                        @php $i++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div> <!-- end card body -->
    <!-- end col -->
</div>
@endsection
