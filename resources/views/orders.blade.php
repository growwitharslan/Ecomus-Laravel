@extends('layouts.main')
@section('content')
@if(session('success'))
<section style="position: fixed; top: 0; left: 0; right: 0; z-index: 9999;">
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show w-100 w-md-75 w-lg-50 mx-auto " style="margin-top:8%" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</section>
@endif
<!-- page-title -->
<section style="margin-top: 12%;">
    <div class="tf-page-title">
        <div class="container-full">
            <div class="row">
                <div class="col-12">
                    <div class="heading text-center">All Orders</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /page-title -->

<!-- orders table -->
<section class="tf-orders-table">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    @if(count($orders) > 0)
                    <table class="table table-striped table-hover">
                        <thead class="d-none d-md-table-header-group">
                            <tr>
                                <th>#</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td data-label="#" class="d-block d-md-table-cell">{{ $loop->iteration }}</td>
                                <td data-label="Amount" class="d-block d-md-table-cell">${{ number_format($order->total_amount, 2) }}</td>
                                <td data-label="Status" class="d-block d-md-table-cell">
                                    @if($order->status == 'pending')
                                    <span class="badge bg-warning">{{ $order->status }}</span>
                                    @elseif($order->status == 'processing')
                                    <span class="badge bg-info">{{ $order->status }}</span>
                                    @else
                                    {{ $order->status }}
                                    @endif
                                </td>
                                <td data-label="Actions" class="d-block d-md-table-cell">
                                    <button class="btn btn-sm btn-primary mb-1 mb-md-0" data-id="{{ $order->id }}">View</button>
                                    <button class="btn btn-sm btn-danger btn_delete" data-id="{{ $order->id }}" data-text="Are you sure you want to Undo this Order?">Cancel</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text-center">
                        <img class="img-fluid" style="max-width: 300px;" src="{{ asset('assets/thenounproject.png') }}" alt="Nothing in Orders">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section><!-- /orders table -->

@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on("click", ".btn_delete", function() {
            var id = $(this).data("id");
            var alerttext = $(this).data("text");
            Swal.fire({
                title: 'Are you sure?',
                text: alerttext,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/orders/cancel') }}",
                        type: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': id,
                        },
                        dataType: 'json',
                        success: function(status) {
                            if (status.msg == 'success') {
                                Swal.fire({
                                    title: "Success!",
                                    text: status.response,
                                    icon: "success"
                                }).then(() => {
                                    location.reload();
                                });
                            } else if (status.msg == 'error') {
                                Swal.fire("Error", status.response, "error");
                            }
                        }
                    });
                }
            });
        });
    });
</script>
@endpush