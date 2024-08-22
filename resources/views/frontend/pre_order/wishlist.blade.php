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
                <h2 class="title mb-3">Wishlist</h2>

                <ul class="d-block m-auto">
                    <li class="d-inline-block"><a href="{{ route('frontpage') }}">Home</a></li>
                    <span>&nbsp; > &nbsp;</span>
                    <li class="d-inline-block active">Wishlist</li>
                </ul>
            </div>
            
        </div>
    </div>
    <!-- Page Banner Section End -->

    <!-- Shopping Wishlist Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="cart-wrapper">
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
                                        <form class="d-inline" action="{{ route('wishlist.destroy', $wishlist->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="remove"
                                                style="border:none;background:transparent;"><abbr
                                                    title="Delete" style="cursor:pointer"><i class="pe-7s-trash fs-2"></i></abbr></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center text-danger">There is no Wishlist to show!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Shopping Wishlist Section End -->
@endsection
