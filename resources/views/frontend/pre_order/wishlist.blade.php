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
            <!-- Page Banner Content End -->
            <div class="page-banner-content" style="color: #fff">
                <h2 class="title mb-3">Wishlist</h2>

                <ul class="d-block m-auto">
                    <li class="d-inline-block"><a href="{{ route('frontpage') }}">Home</a></li>
                    <span>&nbsp; > &nbsp;</span>
                    <li class="d-inline-block active">Wishlist</li>
                </ul>
            </div>
            <!-- Page Banner Content End -->
        </div>
    </div>
    <!-- Page Banner Section End -->

    <!-- Shopping Cart Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="cart-wrapper">
                <!-- Cart Wrapper Start -->
                <div class="cart-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumb">Image</th>
                                <th class="product-info">
                                    product Information
                                </th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-add-to-cart">
                                    Add to Cart
                                </th>
                                <th class="product-action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (wishlists() as $wishlist)
                                <tr>
                                    <td class="product-thumb">
                                        <a href="#"><img src="{{ asset($wishlist->product->thumbnail) }}" alt="Product Image" style="border-radius: 2px" /></a>
                                    </td>
                                    <td class="product-info">
                                        <h5 class="mb-2">
                                            <a href="#" class="fs-4">{{ $wishlist->product->name }}</a>
                                        </h5>
                                        <p>{{ '$ ' . $wishlist->product->price }}</p>
                                    </td>
                                    <td class="quantity">
                                        <div class="product-quantity d-inline-flex">
                                            <button type="button" class="sub">
                                                -
                                            </button>
                                            <input type="text" value="1" />
                                            <button type="button" class="add">
                                                +
                                            </button>
                                        </div>
                                    </td>
                                    <td class="product-add-to-cart">
                                        <a href="#" class="btn btn-dark btn-hover-primary">Add to Cart</a>
                                    </td>
                                    <td class="product-action">
                                        <button class="remove">
                                            <i class="pe-7s-trash fs-2"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            {{-- <tr>
                                <td class="product-thumb">
                                    <img src="assets/images/product/product-03.jpg" alt="" />
                                </td>
                                <td class="product-info">
                                    <h6 class="name">
                                        <a href="product-details.html">Pendant Chandelier Light</a>
                                    </h6>
                                    <div class="product-prices">
                                        <span class="old-price">$35.90</span>
                                        <span class="sale-price">$28.72</span>
                                    </div>
                                    <div class="product-size-color">
                                        <p>Size <span>S</span></p>
                                        <p>Color <span>White</span></p>
                                    </div>
                                </td>
                                <td class="quantity">
                                    <div class="product-quantity d-inline-flex">
                                        <button type="button" class="sub">
                                            -
                                        </button>
                                        <input type="text" value="1" />
                                        <button type="button" class="add">
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td class="product-total-price">
                                    <span class="price">$28.72</span>
                                </td>
                                <td class="product-add-to-cart">
                                    <a href="#" class="btn btn-dark btn-hover-primary">Add to Cart</a>
                                </td>
                                <td class="product-action">
                                    <button class="remove">
                                        <i class="pe-7s-trash"></i>
                                    </button>
                                </td>
                            </tr> --}}


                            {{-- <tr>
                                <td class="product-thumb">
                                    <img src="assets/images/product/product-04.jpg" alt="" />
                                </td>
                                <td class="product-info">
                                    <h6 class="name">
                                        <a href="product-details.html">High quality vase bottle</a>
                                    </h6>
                                    <div class="product-prices">
                                        <span class="sale-price">$35.72</span>
                                    </div>
                                    <div class="product-size-color">
                                        <p>Size <span>S</span></p>
                                        <p>Color <span>White</span></p>
                                    </div>
                                </td>
                                <td class="quantity">
                                    <div class="product-quantity d-inline-flex">
                                        <button type="button" class="sub">
                                            -
                                        </button>
                                        <input type="text" value="1" />
                                        <button type="button" class="add">
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td class="product-total-price">
                                    <span class="price">$28.72</span>
                                </td>
                                <td class="product-add-to-cart">
                                    <a href="#" class="btn btn-dark btn-hover-primary">Add to Cart</a>
                                </td>
                                <td class="product-action">
                                    <button class="remove">
                                        <i class="pe-7s-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-thumb">
                                    <img src="assets/images/product/product-08.jpg" alt="" />
                                </td>
                                <td class="product-info">
                                    <h6 class="name">
                                        <a href="product-details.html">Reece Seater Sofa</a>
                                    </h6>
                                    <div class="product-prices">
                                        <span class="sale-price">$28.72</span>
                                    </div>
                                    <div class="product-size-color">
                                        <p>Size <span>S</span></p>
                                        <p>Color <span>White</span></p>
                                    </div>
                                </td>
                                <td class="quantity">
                                    <div class="product-quantity d-inline-flex">
                                        <button type="button" class="sub">
                                            -
                                        </button>
                                        <input type="text" value="1" />
                                        <button type="button" class="add">
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td class="product-total-price">
                                    <span class="price">$28.72</span>
                                </td>
                                <td class="product-add-to-cart">
                                    <a href="#" class="btn btn-dark btn-hover-primary">Add to Cart</a>
                                </td>
                                <td class="product-action">
                                    <button class="remove">
                                        <i class="pe-7s-trash"></i>
                                    </button>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <!-- Cart Wrapper End -->
            </div>
        </div>
    </div>
    <!-- Shopping Cart Section End -->
@endsection
