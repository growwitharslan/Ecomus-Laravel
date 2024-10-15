@extends('layouts.main')
@section('content')
<!-- page-title -->
<section style="margin-top: 12%;">
    <div class="tf-page-title">
        <div class="container-full">
            <div class="row">
                <div class="col-12">
                    <div class="heading text-center">Order Details</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="order-details py-5">
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderitems as $item)
                            <tr>
                                <td>{{ $item->product_name }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-active">
                                <td colspan="3" class="text-right font-weight-bold">Grand Total:</td>
                                <td class="font-weight-bold">${{ number_format($orderitems->sum(function($item) { return $item->quantity * $item->price; }), 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection