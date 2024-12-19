@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title anchor mb-1" id="pagination">
                    Manage Transactions
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
                                                <div class="gridjs-th-content">Product</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Quantity</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Price</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Status</div>
                                            </th>
                                            <th class="gridjs-th" style="width: 240px">
                                                <div class="gridjs-th-content">Actions</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody">
                                        @php $i = 1; @endphp
                                        @foreach($transactions as $transaction)
                                        <tr class="gridjs-tr">
                                            <td class="gridjs-td">{{ $i }}</td>
                                            <td class="gridjs-td">{{ $transaction->user->name }}</td>
                                            <td class="gridjs-td">
                                                @foreach($transaction->orderItems as $item)
                                                <div class="d-flex align-items-center mb-2">
                                                    @if ($item->product && $item->product->image)
                                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" width="50" class="me-2">
                                                    @endif
                                                    <div>{{ $item->product ? $item->product->name : 'Unknown Product' }} (x{{ $item->quantity }})</div>
                                                </div>
                                                @endforeach
                                            </td>
                                            <td class="gridjs-td">{{ $transaction->orderItems->sum('quantity') }}</td>
                                            <td class="gridjs-td">Rp. {{ number_format($transaction->orderItems->sum(fn($item) => $item->quantity * $item->price, 0)) }}</td>
                                            <td class="gridjs-td text-capitalize"> <span class="status-{{ strtolower($transaction->status) }}"> {{ $transaction->status }} </span> </td>
                                            <td class="gridjs-td d-flex flex-wrap gap-2">
                                                <button type="button" class="btn btn-sm btn-soft-info" style="width: 40px" data-bs-toggle="modal" data-bs-target="#showTransactionModal" onclick="showTransaction({{ $transaction }})"><i class="bx bx-show fs-16"></i></button>
                                                <button type="button" class="btn btn-sm btn-soft-warning" style="width: 40px" data-bs-toggle="modal" data-bs-target="#transactionModal" onclick="editTransaction({{ $transaction }})"><i class="bx bx-edit fs-16"></i></button>
                                                <button type="button" class="btn btn-sm btn-soft-danger" style="width: 40px" data-bs-toggle="modal" data-bs-target="#deleteTransactionModal" onclick="confirmDelete('{{ route('admin.transactions.destroy', $transaction->id) }}')"><i class="bx bx-trash fs-16"></i></button>
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
            
                <!-- Modal Show Transaction -->
                <div class="modal fade" id="showTransactionModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Transaction Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="transaction-details">
                                    <div class="mb-3">
                                        <label for="transaction-user" class="form-label"><strong>User:</strong></label>
                                        <div id="transaction-user" class="form-control"></div>
                                    </div>
                                    <div id="transaction-items" class="mb-3"></div>
                                    <div class="mb-3">
                                        <label for="transaction-total-quantity" class="form-label"><strong>Total Quantity:</strong></label>
                                        <div id="transaction-total-quantity" class="form-control"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="transaction-total-price" class="form-label"><strong>Total Price:</strong></label>
                                        <div id="transaction-total-price" class="form-control"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="transaction-total-price" class="form-label"><strong>Delivery Time:</strong></label>
                                        <div id="transaction-delivery-time" class="form-control"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="transaction-shipping-address" class="form-label"><strong>Shipping Address:</strong></label>
                                        <div id="transaction-shipping-address" class="form-control"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="transaction-shipping-method" class="form-label"><strong>Shipping Method:</strong></label>
                                        <div id="transaction-shipping-method" class="form-control"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="transaction-payment-proof" class="form-label"><strong>Payment Proof:</strong></label>
                                        <a id="transaction-payment-proof" class="form-control" href="#" target="_blank">Lihat Bukti</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Modal Edit Transaction -->
                <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Transaction</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="transactionForm" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <input type="hidden" id="transactionId" name="transactionId">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="pending">Pending</option>
                                            <option value="completed">Completed</option>
                                            <option value="canceled">Canceled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
                <!-- Modal Delete Transaction -->
                <div class="modal fade" id="deleteTransactionModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="deleteTransactionForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this transaction?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div> <!-- end card body -->
    <!-- end col -->
</div>
@endsection

<script>
    function showTransaction(transaction) {
        document.getElementById('transaction-user').textContent = transaction.user.name;
        
        document.getElementById('transaction-items').innerHTML = transaction.order_items.map(item => `
            <div class="d-flex align-items-center mb-2">
                ${item.product.image ? `<img src="/storage/${item.product.image}" alt="${item.product.name}" width="50" class="me-2">` : ''}
                <div>${item.product.name} (x${item.quantity})</div>
            </div>
        `).join('');

        document.getElementById('transaction-total-quantity').textContent = transaction.order_items.reduce((total, item) => total + item.quantity, 0);
        document.getElementById('transaction-total-price').textContent = `Rp. ${transaction.order_items.reduce((total, item) => total + (item.quantity * item.price), 0)}`;
        document.getElementById('transaction-delivery-time').textContent = transaction.delivery_time;
        
        document.getElementById('transaction-shipping-address').textContent = transaction.shipping_address;
        document.getElementById('transaction-shipping-method').textContent = transaction.shipping_method === 'pickup' ? 'Pick Up' : 'Courier';
        document.getElementById('transaction-payment-proof').href = `/storage/${transaction.payment_proof}`;
    }


    function editTransaction(transaction) {
        document.getElementById('transactionForm').action = "{{ url('admin/transactions') }}/" + transaction.id;
        document.getElementById('transactionForm').method = 'POST';
        const hiddenMethod = document.createElement('input');
        hiddenMethod.setAttribute('type', 'hidden');
        hiddenMethod.setAttribute('name', '_method');
        hiddenMethod.setAttribute('value', 'PUT');
        document.getElementById('transactionForm').appendChild(hiddenMethod);

        document.getElementById('transactionId').value = transaction.id;
        document.getElementById('status').value = transaction.status;
    }

    function confirmDelete(action) {
        document.getElementById('deleteTransactionForm').action = action;
    }
</script>