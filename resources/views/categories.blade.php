@extends('layouts.main')
@section('content')

<!-- page-title -->
<section style="margin-top: 8%;">
    <div class="tf-page-title">
        <div class="container-full">
            <div class="row">
                <div class="col-12">
                    <div class="heading text-center">All Categories</div>
                    <p class="text-center text-2 text_black-2 mt_5">Discover our exclusive collection of Categories - Elevate your style today!</p>
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
            @foreach($category as $category)
            <div class="card-product fl-item">
                <div class="card-product-wrapper">
                    <a href="{{ route('category.quick.view', ['id' => $category->id, 'category' => $category->slug]) }}" class="product-img">
                        <img class="lazyload img-product" data-src="{{asset('uploads/products/'. $category->image)}}" src="{{asset('uploads/products/'. $category->image)}}" alt="image-product" style="width: 300px; height: 300px; object-fit: contain;">
                        <img class="lazyload img-hover" data-src="{{asset('uploads/products/'. $category->image)}}" src="{{asset('uploads/products/'. $category->image)}}" alt="image-product" style="width: 300px; height: 300px; object-fit: contain;">
                    </a>
                    <div class="list-product-btn absolute-2 bg-white">

                    </div>
                    <div class="article-content">
                        <div class="article-title">
                            <a href="" class="text-decoration-none"><strong>{{ $category->name }}</strong></a>
                        </div>
                        <p class="article-description">
                            {{ Str::limit($category->description, 20) }}
                        </p>
                        <div class="article-btn">
                            <a href="{{ route('category.quick.view', ['id' => $category->id, 'category' => $category->slug]) }}" class="tf-btn btn-line fw-6">Explore <i class="icon icon-arrow1-top-left ml-2"></i></a>
                        </div>
                    </div>
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