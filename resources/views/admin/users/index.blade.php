@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title anchor mb-1" id="pagination">
                    Manage Users
                </h5>
                <!-- Button add user modal -->
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#userModal" onclick="resetForm()">
                    Add New User
                </button>

                <!-- Modal add/edit user -->
                <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Add/Edit User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="userForm" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" id="userId" name="userId">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" id="name" name="name" class="form-control" autocomplete="off" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" autocomplete="off" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                   </div>
                                   <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-select" id="role" name="role">
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
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
                                    <p>Are you sure you want to delete this user?</p>
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
                                                <div class="gridjs-th-content">Nama</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Email</div>
                                            </th>
                                            <th class="gridjs-th" style="width: 240px">
                                                <div class="gridjs-th-content">Aksi</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody">
                                        @php $i = 1; @endphp
                                        @foreach($users as $user)
                                        <tr class="gridjs-tr">
                                            <td class="gridjs-td">{{ $i }}</td>
                                            <td class="gridjs-td">{{ $user->name }}</td>
                                            <td class="gridjs-td">{{ $user->email }}</td>
                                            <td class="gridjs-td d-flex flex-wrap gap-2">
                                                <button type="button" class="btn btn-sm btn-soft-warning" data-bs-toggle="modal" data-bs-target="#userModal" onclick="editUser({{ $user }})"><i class="bx bx-edit fs-16"></i></button>
                                                <button type="button" class="btn btn-sm btn-soft-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="confirmDelete('{{ route('admin.users.destroy', $user->id) }}')"><i class="bx bx-trash fs-16"></i></button>
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
        document.getElementById('userForm').action = "{{ route('admin.users.store') }}";
        document.getElementById('userId').value = '';
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
        document.getElementById('role').value = 'user';
    }

    function editUser(user) {
        document.getElementById('userForm').action = "{{ url('admin/users') }}/" + user.id;
        document.getElementById('userForm').method = 'POST';
        const hiddenMethod = document.createElement('input');
        hiddenMethod.setAttribute('type', 'hidden');
        hiddenMethod.setAttribute('name', '_method');
        hiddenMethod.setAttribute('value', 'PUT');
        document.getElementById('userForm').appendChild(hiddenMethod);

        document.getElementById('userId').value = user.id;
        document.getElementById('name').value = user.name;
        document.getElementById('email').value = user.email;
        document.getElementById('password').value = '';
        document.getElementById('role').value = user.role;
    }

    function confirmDelete(action) {
        document.getElementById('deleteForm').action = action;
    }
</script>
