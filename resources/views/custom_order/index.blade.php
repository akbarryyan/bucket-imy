@extends('layouts.user.app')
@section('content')
<!--Page Banner Start-->
<div class="page-banner" style="background-image: url({{ asset('assets/user/images/testimonial-bg.webp') }});">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Custom Order</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.user') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Custom Order</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<!--Custom Order Start-->
<div class="custom-order-page section-padding-6">
    <div class="container">

        <h3>Choose Materials</h3>
        <div class="row">
            @foreach($materials as $material)
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="single-material">
                    <div class="material-image">
                        <img src="{{ asset('storage/' . $material->image) }}" alt="{{ $material->name }}">
                    </div>
                    <div class="material-content text-center">
                        <h5>{{ $material->name }}</h5>
                        <p>Rp. {{ number_format($material->price, 0) }}</p>
                        <button type="button" class="btn btn-primary add-material-btn" data-material-id="{{ $material->id }}" data-material-name="{{ $material->name }}" data-material-price="{{ $material->price }}">Add</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h3>Selected Materials</h3>
        <div id="selected-materials">
            <ul class="list-group">
                <!-- Selected materials will be appended here -->
            </ul>
        </div>
        <div class="mt-4">
            <h4>Total Price: Rp. <span id="total-price">0</span></h4>
        </div>
        <form id="confirm-order-form" method="POST" action="{{ route('customOrder.confirm') }}">
            @csrf
            <input type="hidden" name="order_id" id="order_id" value="">
            <button type="submit" class="btn btn-success" id="confirm-order">Confirm Order</button>
        </form>
    </div>
</div>
<!--Custom Order End-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    let totalPrice = 0;

    $('.add-material-btn').on('click', function() {
        const materialId = $(this).data('material-id');
        const materialName = $(this).data('material-name');
        const materialPrice = parseFloat($(this).data('material-price'));

        // Check if the material is already selected
        if ($('#selected-material-' + materialId).length > 0) {
            alert('This material is already selected.');
            return;
        }

        // Add selected material to the list
        $('#selected-materials .list-group').append(
            '<li class="list-group-item" id="selected-material-' + materialId + '">' +
            materialName + ' - Rp. ' + materialPrice +
            '<button type="button" class="btn btn-danger btn-sm float-end remove-material-btn" data-material-id="' + materialId + '" data-material-price="' + materialPrice + '">Remove</button>' +
            '</li>'
        );

        // Update total price
        totalPrice += materialPrice;
        $('#total-price').text(totalPrice.toFixed(2));
    });

    $(document).on('click', '.remove-material-btn', function() {
        const materialId = $(this).data('material-id');
        const materialPrice = parseFloat($(this).data('material-price'));

        // Remove selected material from the list
        $('#selected-material-' + materialId).remove();

        // Update total price
        totalPrice -= materialPrice;
        $('#total-price').text(totalPrice.toFixed(2));
    });

    $('#confirm-order').on('click', function(e) {
        e.preventDefault();

        const selectedMaterials = [];
        $('#selected-materials .list-group-item').each(function() {
            const materialId = $(this).find('.remove-material-btn').data('material-id');
            selectedMaterials.push(materialId);
        });

        $.ajax({
            url: '{{ route("customOrder.store") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                materials: selectedMaterials,
                total_price: totalPrice.toFixed(2)
            },
            success: function(response) {
                console.log('Order creation response:', response);
                alert('Order created successfully!');
                $('#order_id').val(response.order_id);
                $('#confirm-order-form').submit();
            },
            error: function(response) {
                console.log('Order creation error:', response);
                alert('Failed to create order.');
            }
        });
    });
});
</script>
@endsection
