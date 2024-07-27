@extends('frontend.layout.master')

@section('header-content')
    <style>
        .page-banner-section {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url({{ asset(bc_bg_img()->breadcrumb_bg_img) }});
        }
    </style>
@endsection

@section('main-content')
    <!-- Page Banner Section Start -->
    <div class="section page-banner-section text-center"
        style="background-size:cover;background-position:center center;height:40vh;">
        <div class="container">

            <div class="page-banner-content" style="color: #fff">
                <h2 class="title mb-3">Category</h2>

                <ul class="d-block m-auto">
                    <li class="d-inline-block"><a href="{{ route('frontpage') }}">Home</a></li>
                    <span>&nbsp; > &nbsp;</span>
                    <li class="d-inline-block active">Category</li>
                </ul>
            </div>

        </div>
    </div>
    <!-- Page Banner Section End -->

    <!-- Shop Section Start -->
    <div class="section section-padding">
        <div class="container">
            <!-- Product Section Wrapper Start -->
            <div class="product-section-wrapper">
                <!-- Shop top Bar Start -->
                <div class="shop-top-bar mb-4" style="border-bottom:1px solid #e6e6e6">
                    <div class="shop-text">
                        <p class="fs-3"><span class="fw-bold me-2">Category: </span>{{ $category->name }}</p>
                    </div>
                </div>
                <!-- Shop top Bar End -->

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="grid">
                        <!-- Shop Product Wrapper Start -->
                        <div class="shop-product-wrapper">
                            <div class="row">



                                @forelse ($products as $product)
                                    <div class="col-lg-3 col-sm-6">

                                        <div class="single-product">
                                            <a href="product-details.html">
                                                <img src="{{ asset($product->thumbnail) }}"
                                                    width="270" height="303" alt="product" />
                                            </a>
                                            <div class="product-content">
                                                <h4 class="title">
                                                    <a href="#">{{ $product->name }}</a>
                                                </h4>
                                                <div class="price">
                                                    <span class="sale-price">{{ $product->price }}</span>
                                                </div>
                                            </div>

                                            <ul class="product-meta">
                                                <li>
                                                    <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                                </li>
                                                <li>
                                                    @auth
                                                        @if (wishlist_exist($product->id))
                                                            <a class="action" style="background-color:#f2a100;border-color:#f2a100;color:#fff"><i class="pe-7s-like"></i></a>
                                                        @else
                                                            <a class="action" href="{{ route('wishlist.store', $product->id) }}"><i class="pe-7s-like"></i></a>
                                                        @endif
                                                    @else
                                                        <a class="action" href="{{ route('login') }}"><i class="pe-7s-like"></i></a>
                                                    @endauth
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                @empty
                                    <div class="col-12 text-center text-danger">There is no Product to show!</div>
                                @endforelse



                                {{-- <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a href="product-details.html"><img
                                                src="{{ asset('frontend') }}/assets/images/product/product-02.jpg"
                                                width="270" height="303" alt="product" /></a>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Simple minimal Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$240.00</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li>
                                                <a class="action" data-bs-toggle="modal" data-bs-target="#quickView"
                                                    href="#"><i class="pe-7s-search"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a href="product-details.html"><img
                                                src="{{ asset('frontend') }}/assets/images/product/product-03.jpg"
                                                width="270" height="303" alt="product" /></a>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Pendant Chandelier
                                                    Light</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$240.00</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li>
                                                <a class="action" data-bs-toggle="modal" data-bs-target="#quickView"
                                                    href="#"><i class="pe-7s-search"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a href="product-details.html"><img
                                                src="{{ asset('frontend') }}/assets/images/product/product-04.jpg"
                                                width="270" height="303" alt="product" /></a>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">High quality vase
                                                    bottle</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$240.00</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li>
                                                <a class="action" data-bs-toggle="modal" data-bs-target="#quickView"
                                                    href="#"><i class="pe-7s-search"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a href="product-details.html"><img
                                                src="{{ asset('frontend') }}/assets/images/product/product-05.jpg"
                                                width="270" height="303" alt="product" /></a>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Living & Bedroom
                                                    Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$240.00</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li>
                                                <a class="action" data-bs-toggle="modal" data-bs-target="#quickView"
                                                    href="#"><i class="pe-7s-search"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a href="product-details.html"><img
                                                src="{{ asset('frontend') }}/assets/images/product/product-06.jpg"
                                                width="270" height="303" alt="product" /></a>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Herman Arm Grey
                                                    Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$240.00</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li>
                                                <a class="action" data-bs-toggle="modal" data-bs-target="#quickView"
                                                    href="#"><i class="pe-7s-search"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a href="product-details.html"><img
                                                src="{{ asset('frontend') }}/assets/images/product/product-07.jpg"
                                                width="270" height="303" alt="product" /></a>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Wooden decorations</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$240.00</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li>
                                                <a class="action" data-bs-toggle="modal" data-bs-target="#quickView"
                                                    href="#"><i class="pe-7s-search"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a href="product-details.html"><img
                                                src="{{ asset('frontend') }}/assets/images/product/product-08.jpg"
                                                width="270" height="303" alt="product" /></a>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Herman Seater Sofa</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$240.00</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li>
                                                <a class="action" data-bs-toggle="modal" data-bs-target="#quickView"
                                                    href="#"><i class="pe-7s-search"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a href="product-details.html"><img
                                                src="{{ asset('frontend') }}/assets/images/product/product-09.jpg"
                                                width="270" height="303" alt="product" /></a>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Reece Seater Sofa</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$240.00</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li>
                                                <a class="action" data-bs-toggle="modal" data-bs-target="#quickView"
                                                    href="#"><i class="pe-7s-search"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a href="product-details.html"><img
                                                src="{{ asset('frontend') }}/assets/images/product/product-10.jpg"
                                                width="270" height="303" alt="product" /></a>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Round Swivel Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$240.00</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li>
                                                <a class="action" data-bs-toggle="modal" data-bs-target="#quickView"
                                                    href="#"><i class="pe-7s-search"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a href="product-details.html"><img
                                                src="{{ asset('frontend') }}/assets/images/product/product-12.jpg"
                                                width="270" height="303" alt="product" /></a>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Modern Accent Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$240.00</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li>
                                                <a class="action" data-bs-toggle="modal" data-bs-target="#quickView"
                                                    href="#"><i class="pe-7s-search"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <a href="product-details.html"><img
                                                src="{{ asset('frontend') }}/assets/images/product/product-13.jpg"
                                                width="270" height="303" alt="product" /></a>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">
                                                    Wood Dining Table</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$240.00</span>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li>
                                                <a class="action" data-bs-toggle="modal" data-bs-target="#quickView"
                                                    href="#"><i class="pe-7s-search"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                            </li>
                                            <li>
                                                <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Single Product End -->
                                </div> --}}


                            </div>
                        </div>
                        <!-- Shop Product Wrapper End -->
                    </div>
                </div>

                <!-- Page pagination Start -->
                <div class="page-pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link active" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- Page pagination End -->
            </div>
            <!-- Product Section Wrapper End -->
        </div>
    </div>
    <!-- Shop Section End -->
@endsection
