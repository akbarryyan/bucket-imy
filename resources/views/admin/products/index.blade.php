@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title anchor mb-1" id="pagination">
                    Manage Products
                </h5>
                <!-- Button add product modal -->
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#productModal" onclick="resetProductForm()">
                    Add New Product
                </button>

                <!-- Modal add/edit product -->
                <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Add/Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="productForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" id="productId" name="productId">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" autocomplete="off" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea id="description" name="description" class="form-control" autocomplete="off" required></textarea>
                                   </div>
                                   <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                                   </div>
                                   <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" id="image" name="image" class="form-control">
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
                <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="deleteProductForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this product?</p>
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
                                                <div class="gridjs-th-content">Name</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Description</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Price</div>
                                            </th>
                                            <th class="gridjs-th">
                                                <div class="gridjs-th-content">Image</div>
                                            </th>
                                            <th class="gridjs-th" style="width: 150px">
                                                <div class="gridjs-th-content">Actions</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody">
                                        @php $i = 1; @endphp
                                        @foreach($products as $product)
                                        <tr class="gridjs-tr">
                                            <td class="gridjs-td">{{ $i }}</td>
                                            <td class="gridjs-td">{{ $product->name }}</td>
                                            <td class="gridjs-td">{{ $product->description }}</td>
                                            <td class="gridjs-td">Rp. {{ number_format($product->price, 0) }}</td>
                                            <td class="gridjs-td">
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                                                @else
                                                    <span>No Image</span>
                                                @endif
                                            </td>
                                            <td class="gridjs-td d-flex flex-wrap gap-2">
                                                <button type="button" class="btn btn-sm btn-soft-secondary me-1" data-bs-toggle="modal" data-bs-target="#productModal" onclick="editProduct({{ $product }})"><i class="bx bx-edit fs-16"></i></button>
                                                <button type="button" class="btn btn-sm btn-soft-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal" onclick="confirmDelete('{{ route('admin.products.destroy', $product->id) }}')"><i class="bx bx-trash fs-16"></i></button>
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
    function resetProductForm() {
        document.getElementById('productForm').action = "{{ route('admin.products.store') }}";
        document.getElementById('productId').value = '';
        document.getElementById('name').value = '';
        document.getElementById('description').value = '';
        document.getElementById('price').value = '';
        document.getElementById('image').value = '';
    }

    function editProduct(product) {
        document.getElementById('productForm').action = "{{ url('admin/products') }}/" + product.id;
        document.getElementById('productForm').method = 'POST';
        const hiddenMethod = document.createElement('input');
        hiddenMethod.setAttribute('type', 'hidden');
        hiddenMethod.setAttribute('name', '_method');
        hiddenMethod.setAttribute('value', 'PUT');
        document.getElementById('productForm').appendChild(hiddenMethod);

        document.getElementById('productId').value = product.id;
        document.getElementById('name').value = product.name;
        document.getElementById('description').value = product.description;
        document.getElementById('price').value = product.price;
        // Untuk keamanan, kita tidak mengisi input file 'image' dengan nilai sebelumnya
    }

    function confirmDelete(action) {
        document.getElementById('deleteProductForm').action = action;
    }
</script>
