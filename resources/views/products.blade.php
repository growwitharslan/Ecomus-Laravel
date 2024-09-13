
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
                    <div class="heading text-center">All Products</div>
                    <p class="text-center text-2 text_black-2 mt_5">Discover our exclusive collections - Elevate your style today!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /page-title -->

<!-- grid -->
<section class="flat-spacing-1">
    <div class="container">
        <div class="tf-shop-control grid-3 align-items-center">
            <div class="tf-control-filter">
                <!-- <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Filter</span></a> -->
            </div>
            <ul class="tf-control-layout d-flex justify-content-center">
                <li class="tf-view-layout-switch sw-layout-2" data-value-grid="grid-2">
                    <div class="item"><span class="icon icon-grid-2"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-3" data-value-grid="grid-3">
                    <div class="item"><span class="icon icon-grid-3"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-4 active" data-value-grid="grid-4">
                    <div class="item"><span class="icon icon-grid-4"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-5" data-value-grid="grid-5">
                    <div class="item"><span class="icon icon-grid-5"></span></div>
                </li>
                <li class="tf-view-layout-switch sw-layout-6" data-value-grid="grid-6">
                    <div class="item"><span class="icon icon-grid-6"></span></div>
                </li>
            </ul>
        </div>
        <div class="grid-layout wrapper-shop loadmore-item" data-grid="grid-4">
            <!-- card product According to Categories -->
            @foreach($products as $product)
            <div class="card-product fl-item">
                <div class="card-product-wrapper">
                    <a href="{{ route('product.quick.view', ['product' => $product->slug]) }}" class="product-img">
                        <img class="lazyload img-product" data-src="{{asset('uploads/products/'. $product->image)}}" src="{{asset('uploads/products/'. $product->image)}}" alt="image-product" style="width: 300px; height: 300px; object-fit: cover;">
                        <img class="lazyload img-hover" data-src="{{asset('uploads/products/'. $product->image)}}" src="{{asset('uploads/products/'. $product->image)}}" alt="image-product" style="width: 300px; height: 300px; object-fit: cover;">
                    </a>
                    <div class="list-product-btn absolute-2">
                        <a href="#quick_add_{{$product->id}}" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                            <span class="icon icon-bag"></span>
                            <span class="tooltip">Quick Add</span>
                        </a>
                        <a href="{{ route('product.quick.view', ['product' => $product->slug]) }}" class="box-icon bg_white quickview tf-btn-loading">
                            <span class="icon icon-view"></span>
                            <span class="tooltip">Quick View</span>
                        </a>
                    </div>
                </div>
                <div class="card-product-info">
                    <a href="{{ route('product.quick.view', ['product' => $product->slug]) }}" class="title link">{{ $product->name }}</a>
                    @if ($product->available == 1)
                    <badge class="w-25 badge bg-success">Available</badge>
                    @else
                    <badge class="w-25 badge bg-danger">Out of stock</badge>
                    @endif
                    <span class="price">${{ $product->price }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="tf-pagination-wrap view-more-button text-center">
            <button class="tf-btn-loading tf-loading-default animate-hover-btn btn-loadmore"><span class="text">Load more</span></button>
        </div>
    </div>
</section>
<!-- /grid -->
@endsection