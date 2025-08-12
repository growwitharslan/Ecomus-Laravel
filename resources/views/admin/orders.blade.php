@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
                <h2>Orders</h2>
                <div class="col-lg-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                                    <td>${{ number_format($order->total_amount, 2) }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm view-order" data-id="{{ $order->id }}">
                                            View
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Items</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="order-items">
                            <tr>
                                <td colspan="5" class="text-center">Loading...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.view-order').on('click', function() {
                const orderId = $(this).data('id');

                // Show loading text while fetching
                $('#order-items').html('<tr><td colspan="4" class="text-center">Loading...</td></tr>');

                // Show the modal
                const orderModal = new bootstrap.Modal(document.getElementById('orderModal'));
                orderModal.show();

                // Ajax call to fetch order items
                $.ajax({
                    url: '/admin/orders/items',
                    method: 'GET',
                    data: {
                        id: orderId
                    },
                    success: function(response) {
                        if (response.success) {
                            let rows = '';
                            response.items.forEach(item => {
                                rows += `
          <tr>
            <td><img src="${item.product_image}" alt="${item.product_name}" style="width:50px; height:auto;"></td>
            <td>${item.product_name}</td>
            <td>${item.quantity}</td>
            <td>$${parseFloat(item.price).toFixed(2)}</td>
            <td>$${(item.quantity * item.price).toFixed(2)}</td>
          </tr>
        `;
                            });
                            $('#order-items').html(rows);
                        } else {
                            $('#order-items').html(
                                '<tr><td colspan="5" class="text-center">No items found</td></tr>'
                            );
                        }
                    },
                    error: function() {
                        $('#order-items').html(
                            '<tr><td colspan="5" class="text-center text-danger">Failed to load items</td></tr>'
                        );
                    }
                });

            });
        });
    </script>
@endpush
