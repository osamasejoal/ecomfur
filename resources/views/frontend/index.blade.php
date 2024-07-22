@extends('frontend.layout.master')

@section('main-content')
    <!-- Slider Section Start -->
    <div class="section slider-section-02">
        <div class="slider-active">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- Single Slider Start  -->
                    <div class="single-slider slider-02 swiper-slide animation-style-01"
                        style="
                                background-image: url({{ asset('frontend') }}/assets/images/slider/slider-01.jpg);
                            ">
                        <div class="container">
                            <!-- Slider Content Start -->
                            <div class="slider-content-02 text-center">
                                <h2 class="title">
                                    Stylish Kitchen Furniture
                                </h2>
                                <p>
                                    Unique Furniture Style Design for Your
                                    Family and Welcome <br />
                                    Our Shop, 30% Offer All Stylish Kitchen
                                    Furniture
                                </p>
                                <a href="shop-grid-4-column.html" class="btn btn-primary btn-hover-dark btn-margin">purchase
                                    now</a>
                            </div>
                            <!-- Slider Content End -->
                        </div>
                    </div>
                    <!-- Single Slider End  -->

                    <!-- Single Slider Start  -->
                    <div class="single-slider slider-02 swiper-slide animation-style-01"
                        style="
                                background-image: url({{ asset('frontend') }}/assets/images/slider/slider-02.jpg);
                            ">
                        <div class="container">
                            <!-- Slider Content Start -->
                            <div class="slider-content-02 text-center">
                                <h2 class="title">
                                    Stylish Kitchen Furniture
                                </h2>
                                <p>
                                    Unique Furniture Style Design for Your
                                    Family and Welcome <br />
                                    Our Shop, 30% Offer All Stylish Kitchen
                                    Furniture
                                </p>
                                <a href="shop-grid-4-column.html" class="btn btn-primary btn-hover-dark btn-margin">purchase
                                    now</a>
                            </div>
                            <!-- Slider Content End -->
                        </div>
                    </div>
                    <!-- Single Slider End  -->

                    <!-- Add Arrows -->
                    <div class="swiper-button-next">Next</div>
                    <div class="swiper-button-prev">Prev</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Section End -->

    <!-- Benefit Section Start -->
    <div class="section section-padding-02">
        <div class="container">
            <!-- Benefit Wrapper Start -->
            <div class="benefit-wrapper">
                <div class="row">

                    <!-- Single Benefit Start -->
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-benefit">
                                <img src="{{ $service->icon }}" width="70"
                                    height="92" alt="Service Icon" />
                                <h3 class="title">{{ $service->title }}</h3>
                                <p>{{ $service->sub_title }}</p>
                            </div>
                        </div>
                    @endforeach <!-- Single Benefit End -->


                    {{-- <div class="col-lg-4 col-md-6">
                        <!-- Single Benefit Start -->
                        <div class="single-benefit">
                            <img src="{{ asset('frontend') }}/assets/images/icon/icon-2.png" width="70" height="92" alt="Icon" />
                            <h3 class="title">Safe Payment</h3>
                            <p>
                                Get 10% cash back, free shipping, free
                                returns, and more at 1000+ top retailers!
                            </p>
                        </div>
                        <!-- Single Benefit End -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!-- Single Benefit Start -->
                        <div class="single-benefit">
                            <img src="{{ asset('frontend') }}/assets/images/icon/icon-3.png" width="70" height="92" alt="Icon" />
                            <h3 class="title">Online Support</h3>
                            <p>
                                Get 10% cash back, free shipping, free
                                returns, and more at 1000+ top retailers!
                            </p>
                        </div>
                        <!-- Single Benefit End -->
                    </div> --}}
                </div>
            </div>
            <!-- Benefit Wrapper End -->
        </div>
    </div>
    <!-- Benefit Section End -->

    <!-- New Product Section Start -->
    <div class="section section-padding-02">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title-02 text-center">
                <h2 class="title">New Products</h2>
            </div>
            <!-- Section Title End -->

            <!-- Product Wrapper 02 Start -->
            <div class="product-wrapper-02">
                <!-- Product Menu End -->

                <!-- Product Tabs Content Start -->
                <div class="product-tabs-content">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-01.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Elona bedside grey
                                                    table</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-02.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Simple minimal Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-03.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Pendant Chandelier
                                                    Light</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-04.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">High quality vase
                                                    bottle</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-05.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Living & Bedroom
                                                    Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-06.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Herman Arm Grey
                                                    Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-11.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Lace Bar Stool</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-08.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Herman Seater Sofa</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-09.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Reece Seater Sofa</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-10.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Round Swivel Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-11.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">
                                                    Lace Bar Stool</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-12.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Modern Accent Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-08.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Herman Seater Sofa</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-06.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Herman Arm Grey
                                                    Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-07.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Wooden decorations</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-02.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Simple minimal Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-03.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Pendant Chandelier
                                                    Light</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-04.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">High quality vase
                                                    bottle</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-08.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Herman Seater Sofa</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-01.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Elona bedside grey
                                                    table</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-07.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Wooden decorations</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-09.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Reece Seater Sofa</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-02.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Simple minimal Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-07.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Wooden decorations</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab4">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-03.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Pendant Chandelier
                                                    Light</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-02.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Simple minimal Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-05.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Living & Bedroom
                                                    Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-04.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">High quality vase
                                                    bottle</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-10.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Round Swivel Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-11.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Lace Bar Stool</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-05.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Living & Bedroom
                                                    Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-07.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Wooden decorations</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab5">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-03.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Pendant Chandelier
                                                    Light</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-02.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Simple minimal Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-09.jpg"
                                                    width="270" height="303" alt="product" /></a>

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
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Reece Seater Sofa</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-04.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">High quality vase
                                                    bottle</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-12.jpg"
                                                    width="270" height="303" alt="product" /></a>

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

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Modern Accent Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-10.jpg"
                                                    width="270" height="303" alt="product" /></a>

                                            <ul class="product-meta">
                                                <li>
                                                    <a class="action" data-bs-toggle="modal"
                                                        data-bs-target="#quickView" href="#"><i
                                                            class="pe-7s-search"></i></a>
                                                </li>
                                                <li>
                                                    <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                                </li>
                                                <li>
                                                    <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Round Swivel Chair</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-11.jpg"
                                                    width="270" height="303" alt="product" /></a>

                                            <ul class="product-meta">
                                                <li>
                                                    <a class="action" data-bs-toggle="modal"
                                                        data-bs-target="#quickView" href="#"><i
                                                            class="pe-7s-search"></i></a>
                                                </li>
                                                <li>
                                                    <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                                </li>
                                                <li>
                                                    <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                </li>
                                            </ul>

                                            <span class="discount">-50%</span>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Lace Bar Stool</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$20.00</span>
                                                <span class="old-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Single Product Start -->
                                    <div class="single-product-02">
                                        <div class="product-images">
                                            <a href="product-details.html"><img
                                                    src="{{ asset('frontend') }}/assets/images/product/product-01.jpg"
                                                    width="270" height="303" alt="product" /></a>

                                            <ul class="product-meta">
                                                <li>
                                                    <a class="action" data-bs-toggle="modal"
                                                        data-bs-target="#quickView" href="#"><i
                                                            class="pe-7s-search"></i></a>
                                                </li>
                                                <li>
                                                    <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                                </li>
                                                <li>
                                                    <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title">
                                                <a href="product-details.html">Elona bedside grey
                                                    table</a>
                                            </h4>
                                            <div class="price">
                                                <span class="sale-price">$40.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Tabs Content End -->
            </div>
            <!-- Product Wrapper 02 End -->
        </div>
    </div>
    <!-- New Product Section End -->

    <!-- Banner Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Single Banner Start -->
                    <div class="single-banner-03">
                        <img src="{{ asset('frontend') }}/assets/images/banner/banner-05.jpg" width="570"
                            height="299" alt="Banner" />

                        <div class="banner-content">
                            <h6 class="sub-title">High-Quality</h6>
                            <h3 class="title">
                                <a href="shop-grid-left-sidebar.html">New Kitchen <br />
                                    Furniture</a>
                            </h3>
                            <a class="btn btn-primary btn-hover-dark" href="shop-grid-left-sidebar.html">Shop Now</a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                </div>
                <div class="col-lg-6">
                    <!-- Single Banner Start -->
                    <div class="single-banner-03">
                        <img src="{{ asset('frontend') }}/assets/images/banner/banner-06.jpg" width="570"
                            height="299" alt="Banner" />

                        <div class="banner-content">
                            <h6 class="sub-title">Best-Quality</h6>
                            <h3 class="title">
                                <a href="shop-grid-left-sidebar.html">Bed Room <br />
                                    Furniture</a>
                            </h3>
                            <a class="btn btn-primary btn-hover-dark" href="shop-grid-left-sidebar.html">Shop Now</a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Countdown Section Start -->
    <div class="section section-padding overflow-hidden bg-color-01">
        <div class="container">
            <div class="countdown-main-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <!-- Countdown Content Start -->
                        <div class="countdown-content">
                            <h2 class="title">
                                Chair Collection <span>50%</span> Off
                            </h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipisicing sed do eiusmol tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad
                                mini veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip eao commodo
                                consequat Duis aute irure.
                            </p>

                            <div class="countdown-wrapper">
                                <div class="countdown" data-countdown="2024/11/20" data-format="short">
                                    <div class="single-countdown">
                                        <span class="count countdown__time daysLeft"></span>
                                        <span class="value countdown__time daysText"></span>
                                    </div>
                                    <div class="single-countdown">
                                        <span class="count countdown__time hoursLeft"></span>
                                        <span class="value countdown__time hoursText"></span>
                                    </div>
                                    <div class="single-countdown">
                                        <span class="count countdown__time minsLeft"></span>
                                        <span class="value countdown__time minsText"></span>
                                    </div>
                                    <div class="single-countdown">
                                        <span class="count countdown__time secsLeft"></span>
                                        <span class="value countdown__time secsText"></span>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="btn btn-primary btn-hover-dark">Shop Now</a>
                        </div>
                        <!-- Countdown Content End -->
                    </div>

                    <div class="col-lg-6">
                        <!-- Countdown Images Start -->
                        <div class="countdown-images">
                            <div class="shape-1"></div>
                            <div class="shape-2"></div>
                            <div class="shape-3"></div>

                            <div class="image-box">
                                <img src="{{ asset('frontend') }}/assets/images/countdown.png" width="480"
                                    height="383" alt="Countdown" />
                            </div>
                        </div>
                        <!-- Countdown Images End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Countdown Section End -->

    <!-- Sale Product Section Start -->
    <div class="section section-padding-02">
        <div class="container">
            <div class="">
                <!-- Product Active Start -->
                <div class="product-active-02">
                    <!-- Product Top Wrapper Start -->
                    <div class="product-top-wrapper">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="title"># Sale Products</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Product Menu Start -->
                        <div class="product-menu">
                            <ul class="nav">
                                <li>
                                    <button class="active" data-bs-toggle="tab" data-bs-target="#tab7">
                                        All Time
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-toggle="tab" data-bs-target="#tab8">
                                        This Year
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-toggle="tab" data-bs-target="#tab9">
                                        This Month
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <!-- Product Menu End -->

                        <!-- Swiper Arrows End -->
                        <div class="swiper-arrows">
                            <!-- Add Arrows -->
                            <div class="swiper-button-prev">
                                <i class="pe-7s-angle-left"></i>
                            </div>
                            <div class="swiper-button-next">
                                <i class="pe-7s-angle-right"></i>
                            </div>
                        </div>
                        <!-- Swiper Arrows End -->
                    </div>
                    <!-- Product Top Wrapper End -->

                    <!-- Product Tabs Content Start -->
                    <div class="product-tabs-content">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab7">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-12.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Modern Accent
                                                            Chair</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-08.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Herman Seater
                                                            Sofa</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-09.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Reece Seater
                                                            Sofa</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-10.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Round Swivel
                                                            Chair</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab8">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-12.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Modern Accent
                                                            Chair</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-07.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Wooden
                                                            decorations</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-06.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Herman Arm Grey
                                                            Chair</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-05.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Living &
                                                            Bedroom Chair</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab9">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-04.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">High quality
                                                            vase bottle</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-03.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Pendant
                                                            Chandelier
                                                            Light</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-02.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Simple minimal
                                                            Chair</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product-02">
                                                <div class="product-images">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('frontend') }}/assets/images/product/product-01.jpg"
                                                            width="270" height="303" alt="product" /></a>

                                                    <ul class="product-meta">
                                                        <li>
                                                            <a class="action" data-bs-toggle="modal"
                                                                data-bs-target="#quickView" href="#"><i
                                                                    class="pe-7s-search"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        </li>
                                                        <li>
                                                            <a class="action" href="#"><i
                                                                    class="pe-7s-like"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Elona bedside
                                                            grey table</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Tabs Content End -->
                </div>
                <!-- Product Active End -->
            </div>
        </div>
    </div>
    <!-- Sale Product Section End -->


    <!-- Call To Action Section Start -->
    {{-- <div class="section call-to-action" style="background-image: url({{ asset('frontend') }}/assets/images/bg-1.jpg)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Call To Action Content Start -->
                    <div class="call-to-action-content text-center">
                        <h1 class="title">Welcome To Store</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                        </p>
                        <a href="shop-grid-left-sidebar.html" class="btn btn-primary btn-hover-dark btn-margin">purchase
                            now</a>
                    </div>
                    <!-- Call To Action Content End -->
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Call To Action Section End -->


    <div class="section section-padding-02">
        <div class="products-banner products-banner-active">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <!-- Single Products Banner Start -->
                        <div class="single-products-banner">
                            <img src="{{ asset('frontend/assets') }}/images/products-banner/products-01.jpg"
                                width="480" height="600" alt="Products" />

                            <div class="products-banner-content">
                                <div class="banner-content-wrapper">
                                    <h4 class="title">
                                        <a href="product-details.html">Drawing Furniture</a>
                                    </h4>
                                    <span class="products-count">15 Products</span>
                                    <a href="product-details.html" class="arrow"><i
                                            class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Products Banner End -->
                    </div>
                    <div class="swiper-slide">
                        <!-- Single Products Banner Start -->
                        <div class="single-products-banner">
                            <img src="{{ asset('frontend/assets') }}/images/products-banner/products-02.jpg"
                                width="480" height="600" alt="Products" />

                            <div class="products-banner-content">
                                <div class="banner-content-wrapper">
                                    <h4 class="title">
                                        <a href="product-details.html">Drawing Furniture</a>
                                    </h4>
                                    <span class="products-count">15 Products</span>
                                    <a href="product-details.html" class="arrow"><i
                                            class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Products Banner End -->
                    </div>
                    <div class="swiper-slide">
                        <!-- Single Products Banner Start -->
                        <div class="single-products-banner">
                            <img src="{{ asset('frontend/assets') }}/images/products-banner/products-03.jpg"
                                width="480" height="600" alt="Products" />

                            <div class="products-banner-content">
                                <div class="banner-content-wrapper">
                                    <h4 class="title">
                                        <a href="product-details.html">Drawing Furniture</a>
                                    </h4>
                                    <span class="products-count">15 Products</span>
                                    <a href="product-details.html" class="arrow"><i
                                            class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Products Banner End -->
                    </div>
                    <div class="swiper-slide">
                        <!-- Single Products Banner Start -->
                        <div class="single-products-banner">
                            <img src="{{ asset('frontend/assets') }}/images/products-banner/products-04.jpg"
                                width="480" height="600" alt="Products" />

                            <div class="products-banner-content">
                                <div class="banner-content-wrapper">
                                    <h4 class="title">
                                        <a href="product-details.html">Drawing Furniture</a>
                                    </h4>
                                    <span class="products-count">15 Products</span>
                                    <a href="product-details.html" class="arrow"><i
                                            class="pe-7s-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Products Banner End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Banner Section End -->

    <!-- Blog Section Start -->
    <div class="section section-padding">
        <div class="container">
            <!-- Blog Wrapper End -->
            <div class="blog-active">
                <!-- Blog Top Wrapper Start -->
                <div class="blog-top-wrapper">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2 class="title"># Latest Blog</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Swiper Arrows End -->
                    <div class="swiper-arrows">
                        <!-- Add Arrows -->
                        <div class="swiper-button-prev">
                            <i class="pe-7s-angle-left"></i>
                        </div>
                        <div class="swiper-button-next">
                            <i class="pe-7s-angle-right"></i>
                        </div>
                    </div>
                    <!-- Swiper Arrows End -->
                </div>
                <!-- Blog Top Wrapper End -->

                <!-- Blog Items Wrapper End -->
                <div class="blog-items-wrapper">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- Single Blog Start -->
                                <div class="single-blog">
                                    <a href="blog-details-left-sidebar.html"><img
                                            src="{{ asset('frontend/assets') }}/images/blog/blog-01.jpg" width="370"
                                            height="230" alt="Blog" /></a>

                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li>
                                                <i class="pe-7s-user"></i>
                                                <span>
                                                    BY:<a href="#">ADMIN</a></span>
                                            </li>
                                            <li>
                                                <i class="pe-7s-date"></i>
                                                <span>27 FEB 2023</span>
                                            </li>
                                        </ul>
                                        <h4 class="title">
                                            <a href="blog-details-left-sidebar.html">Unique products that will
                                                impress your home.</a>
                                        </h4>
                                        <a href="blog-details-left-sidebar.html"
                                            class="btn btn-dark btn-hover-primary">Read More</a>
                                    </div>
                                </div>
                                <!-- Single Blog End -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Single Blog Start -->
                                <div class="single-blog">
                                    <a href="blog-details-left-sidebar.html"><img
                                            src="{{ asset('frontend/assets') }}/images/blog/blog-02.jpg" width="370"
                                            height="230" alt="Blog" /></a>

                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li>
                                                <i class="pe-7s-user"></i>
                                                <span>
                                                    BY:<a href="#">ADMIN</a></span>
                                            </li>
                                            <li>
                                                <i class="pe-7s-date"></i>
                                                <span>27 FEB 2023</span>
                                            </li>
                                        </ul>
                                        <h4 class="title">
                                            <a href="blog-details-left-sidebar.html">Interior designer Nancy,
                                                the witch of the unique
                                                space.</a>
                                        </h4>
                                        <a href="blog-details-left-sidebar.html"
                                            class="btn btn-dark btn-hover-primary">Read More</a>
                                    </div>
                                </div>
                                <!-- Single Blog End -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Single Blog Start -->
                                <div class="single-blog">
                                    <a href="blog-details-left-sidebar.html"><img
                                            src="{{ asset('frontend/assets') }}/images/blog/blog-03.jpg" width="370"
                                            height="230" alt="Blog" /></a>

                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li>
                                                <i class="pe-7s-user"></i>
                                                <span>
                                                    BY:<a href="#">ADMIN</a></span>
                                            </li>
                                            <li>
                                                <i class="pe-7s-date"></i>
                                                <span>27 FEB 2023</span>
                                            </li>
                                        </ul>
                                        <h4 class="title">
                                            <a href="blog-details-left-sidebar.html">Decorate your home with the
                                                most modern furnishings.</a>
                                        </h4>
                                        <a href="blog-details-left-sidebar.html"
                                            class="btn btn-dark btn-hover-primary">Read More</a>
                                    </div>
                                </div>
                                <!-- Single Blog End -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Items Wrapper End -->
            </div>
            <!-- Blog Wrapper End -->
        </div>
    </div>
    <!-- Blog Section End -->

    <!-- Brand Logo Section Start -->
    <div class="section brand-logo">
        <div class="container">
            <!-- Brand Logo Wrapper Start -->
            <div class="brand-logo-wrapper brand-active">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Brand Logo Wrapper Start -->
                        <div class="swiper-slide single-brand-02">
                            <img src="{{ asset('frontend/assets') }}/images/brand/brand-2-1.png" width="118"
                                height="87" alt="Brand" />
                        </div>
                        <!-- Brand Logo Wrapper End -->
                        <!-- Brand Logo Wrapper Start -->
                        <div class="swiper-slide single-brand-02">
                            <img src="{{ asset('frontend/assets') }}/images/brand/brand-2-2.png" width="118"
                                height="87" alt="Brand" />
                        </div>
                        <!-- Brand Logo Wrapper End -->
                        <!-- Brand Logo Wrapper Start -->
                        <div class="swiper-slide single-brand-02">
                            <img src="{{ asset('frontend/assets') }}/images/brand/brand-2-3.png" width="118"
                                height="87" alt="Brand" />
                        </div>
                        <!-- Brand Logo Wrapper End -->
                        <!-- Brand Logo Wrapper Start -->
                        <div class="swiper-slide single-brand-02">
                            <img src="{{ asset('frontend/assets') }}/images/brand/brand-2-4.png" width="118"
                                height="87" alt="Brand" />
                        </div>
                        <!-- Brand Logo Wrapper End -->
                        <!-- Brand Logo Wrapper Start -->
                        <div class="swiper-slide single-brand-02">
                            <img src="{{ asset('frontend/assets') }}/images/brand/brand-2-5.png" width="118"
                                height="87" alt="Brand" />
                        </div>
                        <!-- Brand Logo Wrapper End -->
                    </div>
                </div>
            </div>
            <!-- Brand Logo Wrapper End -->
        </div>
    </div>
    <!-- Brand Logo Section End -->

    <!-- Product Banner Section Start -->
@endsection
