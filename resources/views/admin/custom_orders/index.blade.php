@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title anchor mb-1" id="pagination">
                    Manage Custom Orders
                </h5>

                <div class="py-3">
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
                                                <div class="gridjs-th-content">User</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Status</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Delivery Time</div>
                                            </th>
                                            <th class="gridjs-th" style="width: 240px">
                                                <div class="gridjs-th-content">Actions</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody">
                                        @php $i = 1; @endphp
                                        @foreach($customOrders as $order)
                                        <tr class="gridjs-tr">
                                            <td class="gridjs-td">{{ $i }}</td>
                                            <td class="gridjs-td">{{ $order->user->name }}</td>
                                            <td class="gridjs-td">
                                                <form action="{{ route('admin.customOrders.updateStatus', $order->id) }}" method="POST">
                                                    @csrf
                                                    <select name="status" class="form-select" onchange="this.form.submit()">
                                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="on process" {{ $order->status == 'on process' ? 'selected' : '' }}>On Process</option>
                                                        <option value="delivery" {{ $order->status == 'delivery' ? 'selected' : '' }}>Delivery</option>
                                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td class="gridjs-td">{{ $order->delivery_time }}</td>
                                            <td class="gridjs-td d-flex flex-wrap gap-2">
                                                <button type="button" class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target="#orderDetailsModal{{ $order->id }}"><i class="bx bx-show fs-16"></i></button>
                                                <button type="button" class="btn btn-sm btn-soft-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="confirmDelete('{{ route('admin.customOrders.destroy', $order->id) }}')"><i class="bx bx-trash fs-16"></i></button>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal konfirmasi hapus -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this custom order?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal order details -->
                @foreach($customOrders as $order)
                <div class="modal fade" id="orderDetailsModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Order Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="shipping_method" class="form-label"><strong>Shipping Method:</strong></label>
                                    <input type="text" id="shipping_method" class="form-control" value="{{ $order->shipping_method }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="shipping_address" class="form-label"><strong>Shipping Address:</strong></label>
                                    <input type="text" id="shipping_address" class="form-control" value="{{ $order->shipping_address }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="payment_method" class="form-label"><strong>Payment Method:</strong></label>
                                    <input type="text" id="payment_method" class="form-control" value="{{ $order->payment_method }}" readonly>
                                </div>
                                @if($order->payment_proof)
                                <div class="mb-3">
                                    <label for="payment_proof" class="form-label"><strong>Payment Proof:</strong></label>
                                    <p><a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank">View Proof</a></p>
                                </div>
                                @endif
                                <h4>Materials</h4>
                                <div class="row">
                                    @foreach ($order->details as $detail)
                                    <div class="col-sm-4 mb-3">
                                        <div class="card">
                                            <img src="{{ asset('storage/' . $detail->material->image) }}" class="card-img-top img-fluid" style="max-height: 150px; object-fit: cover;" alt="{{ $detail->material->name }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $detail->material->name }}</h5>
                                                <p class="card-text">Rp. {{ number_format($detail->price, 0) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- End of Modal -->

            </div>
        </div>

    </div> <!-- end card body -->
    <!-- end col -->
</div>
@endsection

<script>
    function confirmDelete(action) {
        document.getElementById('deleteForm').action = action;
    }
</script>
