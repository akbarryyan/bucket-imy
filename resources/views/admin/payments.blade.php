@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title anchor mb-1" id="pagination">
                    Manage Payment Accounts
                </h5>
                <!-- Button add payment account modal -->
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#paymentModal" onclick="resetForm()">
                    Add New Payment Account
                </button>

                <!-- Modal add/edit payment account -->
                <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Add/Edit Payment Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="paymentForm" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" id="paymentId" name="paymentId">
                                    <div class="mb-3">
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <input type="text" id="bank_name" name="bank_name" class="form-control" autocomplete="off" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="account_number" class="form-label">Account Number</label>
                                        <input type="text" id="account_number" name="account_number" class="form-control" autocomplete="off" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="account_name" class="form-label">Account Name</label>
                                        <input type="text" id="account_name" name="account_name" class="form-control" autocomplete="off" required>
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
                                    <p>Are you sure you want to delete this payment account?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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
                                                <div class="gridjs-th-content">Bank Name</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Account Number</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Account Name</div>
                                            </th>
                                            <th class="gridjs-th" style="width: 240px">
                                                <div class="gridjs-th-content">Aksi</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody">
                                        @php $i = 1; @endphp
                                        @foreach($payments as $payment)
                                        <tr class="gridjs-tr">
                                            <td class="gridjs-td">{{ $i }}</td>
                                            <td class="gridjs-td">{{ $payment->bank_name }}</td>
                                            <td class="gridjs-td">{{ $payment->account_number }}</td>
                                            <td class="gridjs-td">{{ $payment->account_name }}</td>
                                            <td class="gridjs-td d-flex flex-wrap gap-2">
                                                <button type="button" class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#paymentModal" onclick="editPayment({{ $payment }})"><i class="bx bx-edit fs-16"></i></button>
                                                <button type="button" class="btn btn-sm btn-soft-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="confirmDelete('{{ route('admin.payments.destroy', $payment->id) }}')"><i class="bx bx-trash fs-16"></i></button>
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
            </div>
        </div>

    </div> <!-- end card body -->
    <!-- end col -->
</div>
@endsection

<script>
    function resetForm() {
        document.getElementById('paymentForm').action = "{{ route('admin.payments.store') }}";
        document.getElementById('paymentId').value = '';
        document.getElementById('bank_name').value = '';
        document.getElementById('account_number').value = '';
        document.getElementById('account_name').value = '';
    }

    function editPayment(payment) {
        document.getElementById('paymentForm').action = "{{ url('admin/payments') }}/" + payment.id;
        document.getElementById('paymentForm').method = 'POST';
        const hiddenMethod = document.createElement('input');
        hiddenMethod.setAttribute('type', 'hidden');
        hiddenMethod.setAttribute('name', '_method');
        hiddenMethod.setAttribute('value', 'PUT');
        document.getElementById('paymentForm').appendChild(hiddenMethod);

        document.getElementById('paymentId').value = payment.id;
        document.getElementById('bank_name').value = payment.bank_name;
        document.getElementById('account_number').value = payment.account_number;
        document.getElementById('account_name').value = payment.account_name;
    }

    function confirmDelete(action) {
        document.getElementById('deleteForm').action = action;
    }
</script>
