@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Manage Materials</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form for adding new materials -->
    <div class="card mb-4">
        <div class="card-header">Add New Material</div>
        <div class="card-body">
            <form action="{{ route('admin.materials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" id="type" name="type" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" id="price" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Material</button>
            </form>
        </div>
    </div>

    <!-- Table of existing materials -->
    <div class="card">
        <div class="card-header">Materials List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materials as $material)
                        <tr>
                            <td>{{ $material->name }}</td>
                            <td>{{ $material->type }}</td>
                            <td>Rp. {{ number_format($material->price, 0) }}</td>
                            <td><img src="{{ asset('storage/' . $material->image) }}" alt="{{ $material->name }}" width="100"></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editMaterialModal{{ $material->id }}">Edit</button>

                                <form action="{{ route('admin.materials.destroy', $material->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                                <!-- Modal for editing material -->
                                <div class="modal fade" id="editMaterialModal{{ $material->id }}" tabindex="-1" aria-labelledby="editMaterialModalLabel{{ $material->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editMaterialModalLabel{{ $material->id }}">Edit Material</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="name{{ $material->id }}" class="form-label">Name</label>
                                                        <input type="text" id="name{{ $material->id }}" name="name" class="form-control" value="{{ $material->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="type{{ $material->id }}" class="form-label">Type</label>
                                                        <input type="text" id="type{{ $material->id }}" name="type" class="form-control" value="{{ $material->type }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="price{{ $material->id }}" class="form-label">Price</label>
                                                        <input type="number" id="price{{ $material->id }}" name="price" class="form-control" value="{{ $material->price }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="image{{ $material->id }}" class="form-label">Image</label>
                                                        <input type="file" id="image{{ $material->id }}" name="image" class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Material</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Modal -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
