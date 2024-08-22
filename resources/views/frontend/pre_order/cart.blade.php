@extends('frontend.layout.master')

@section('header-content')
    <style>
        .page-banner-section {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url({{ asset(bc_bg_img()->breadcrumb_bg_img) }});
        }

        @media (max-width: 767.99px) {}
    </style>
@endsection

@section('main-content')
    <!-- Page Banner Section Start -->
    <div class="section page-banner-section text-center"
        style="background-size:cover;background-position:center center;height:40vh;">
        <div class="container">

            <div class="page-banner-content" style="color: #fff">
                <h2 class="title mb-3">Cart</h2>

                <ul class="d-block m-auto">
                    <li class="d-inline-block"><a href="{{ route('frontpage') }}">Home</a></li>
                    <span>&nbsp; > &nbsp;</span>
                    <li class="d-inline-block active">Cart</li>
                </ul>
            </div>

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
                        <thead class="">
                            <tr class="">
                                <th class="product-thumb">Image</th>
                                <th class="product-info">product Information</th>
                                <th class="product-variant">Variant</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total-price">Total Price</th>
                                <th class="product-action">Action</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @forelse (carts() as $cart)
                                <tr class="">
                                    <!-- Product Image -->
                                    <td class="product-thumb">
                                        <img src="{{ asset($cart->product->thumbnail) }}" alt="Product Image" />
                                    </td>
                                    <!-- Product Information -->
                                    <td class="product-info">
                                        <h6 class="name">
                                            <a href="product-details.html">{{ $cart->product->name }}</a>
                                        </h6>
                                        <div class="product-prices mt-2">
                                            <span class="sale-price"><i
                                                    class="mdi mdi-currency-bdt"></i>{{ $cart->product->price }}</span>
                                        </div>
                                        <div class="product-size-color">
                                            {{-- @if (isset($cart->variant->color)) --}}
                                            <p class="mt-3">Variant: <span
                                                    id="variant-color-{{ $cart->id }}">{{ $cart->variant->color ?? 'Null' }}</span>
                                            </p>
                                            {{-- @else --}}
                                            {{-- <p class="mt-3">Variant: <span
                                                        class="text-secondary fst-italic">Null</span></p> --}}
                                            {{-- @endif --}}
                                        </div>
                                    </td>
                                    <!-- Product Variant -->
                                    <td>
                                        <select name="variant" id="variant-{{ $cart->id }}"
                                            class="form-select variant-select" data-cart-id="{{ $cart->id }}">
                                            <option value="">Select Variant</option>
                                            @foreach ($cart->product->variant as $variant)
                                                <option value="{{ $variant->id }}"
                                                    {{ $cart->variant_id == $variant->id ? 'selected' : '' }}>
                                                    {{ $variant->color }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!-- Product Quantity -->
                                    <td class="quantity">
                                        <div class="product-quantity d-inline-flex">
                                            <button type="button" class="sub" data-cart-id="{{ $cart->id }}">
                                                -
                                            </button>
                                            <input type="text" value="{{ $cart->quantity }}"
                                                id="quantity-{{ $cart->id }}" class="quantity-input"
                                                data-cart-id="{{ $cart->id }}" />
                                            <button type="button" class="add" data-cart-id="{{ $cart->id }}">
                                                +
                                            </button>
                                        </div>
                                    </td>
                                    <!-- Total Price -->
                                    <td class="product-total-price" width="15%">
                                        <span class="price" id="total-price-{{ $cart->id }}"><i
                                                class="mdi mdi-currency-bdt"></i>{{ number_format($cart->product->price * $cart->quantity, 2) }}</span>
                                    </td>
                                    <!-- Action -->
                                    <td class="product-action">
                                        <form class="d-inline" action="{{ route('cart.destroy', $cart->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="remove">
                                                <abbr title="Delete" style="cursor:pointer"><i
                                                        class="pe-7s-trash fs-1"></i></abbr>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center text-danger">There is no Product in your Cart!
                                    </td>
                                </tr>
                            @endforelse



                        </tbody>
                    </table>
                </div>
                <!-- Cart Wrapper End -->

                <!-- Cart btn Start -->
                @if (carts()->count() > 0)
                    <div class="cart-btn">

                        <form action="{{ route('cart.clear') }}" method="POST" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-dark btn-hover-primary">Clear Cart</button>
                        </form>

                    </div>
                @endif
                <!-- Cart btn Start -->
            </div>

            @if (carts()->count() > 0)
                <div class="row justify-content-between">

                    <!-- Cart Shipping Start -->
                    <div class="col-lg-4">
                        <div class="cart-shipping">
                            <div class="cart-title">
                                <h4 class="title">Coupon Code</h4>
                                <p>Enter your coupon code if you have one.</p>
                            </div>
                            <div class="cart-form">
                                <form action="{{ route('cart.coupon') }}" method="POST">
                                    @csrf
                                    <div class="single-form">
                                        <input type="text" name="coupon" class="form-control"
                                            placeholder="Enter your coupon code.." style="color:#000;font-style:normal" />
                                    </div>
                                    <div class="single-form">
                                        <button type="submit" class="btn btn-dark btn-hover-primary">
                                            Apply Coupon
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Cart Shipping End -->

                    <div class="col-lg-4">
                        <!-- Cart Totals Start -->
                        <div class="cart-totals">
                            <div class="cart-title">
                                <h4 class="title">Cart totals</h4>
                            </div>
                            <div class="cart-total-table">
                                <table class="table">
                                    <tbody>
                                        <!-- Subtotal -->
                                        <tr>
                                            <td>
                                                <p class="value">Subtotal</p>
                                            </td>
                                            <td>
                                                <p class="price"><i class="mdi mdi-currency-bdt"></i>{{ number_format($cartSubtotal, 2) }}</p>
                                            </td>
                                        </tr>
                                        <!-- Discount -->
                                        <tr>
                                            <td>
                                                <p class="value">Discount</p>
                                            </td>
                                            <td>
                                                <p class="price">{{ session('coupon') ? session('discount') . '%' : '0%' }}</p>
                                            </td>
                                        </tr>
                                        <!-- Total -->
                                        <tr>
                                            <td>
                                                <p class="value">Total</p>
                                            </td>
                                            <td>
                                                <p class="price"><i class="mdi mdi-currency-bdt"></i>{{ number_format($totalAfterDiscount, 2) }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="12">
                                                <p class="text-danger pt-4">NB: Customer will bear the shipping cost. </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart-total-btn">
                                <a href="#" class="btn btn-dark btn-hover-primary btn-block">Proceed To Checkout</a>
                            </div>
                        </div>
                        <!-- Cart Totals End -->
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Shopping Cart Section End -->
@endsection

@section('footer-content')
    <script>
        $(document).ready(function() {
            $('.variant-select').change(function() {
                var cartId = $(this).data('cart-id');
                var variantId = $(this).val();
                updateCart(cartId, variantId, null);
            });

            $('.quantity-input').change(function() {
                var cartId = $(this).data('cart-id');
                var quantity = $(this).val();
                updateCart(cartId, null, quantity);
            });

            $('.sub, .add').click(function() {
                var cartId = $(this).data('cart-id');
                var quantityInput = $('#quantity-' + cartId);
                var quantity = parseInt(quantityInput.val());
                if ($(this).hasClass('sub')) {
                    quantity = Math.max(quantity - 1, 1);
                } else {
                    quantity += 1;
                }
                quantityInput.val(quantity);
                updateCart(cartId, null, quantity);
            });

            function updateCart(cartId, variantId, quantity) {
                $.ajax({
                    url: '/cart/update',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        cart_id: cartId,
                        variant_id: variantId,
                        quantity: quantity
                    },
                    success: function(response) {

                        // Optionally update other parts of the cart, like the total cart price
                        $('#total-price-' + cartId).text('$' + response.total_price.toFixed(2));
                        if (response.variant_color) {
                            $('#variant-color-' + cartId).text(response.variant_color);
                        }

                        // Update cart total and discount
                        $('#cart-subtotal').text('৳' + response.cart_subtotal.toFixed(2));
                        $('#cart-discount').text(response.discount + '%');
                        $('#cart-total').text('৳' + response.total_after_discount.toFixed(2));

                        // If there's a success message, show it with SweetAlert2
                        if (response.success) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.success,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }

                    // If there's a error message, show it with SweetAlert2
                    error: function(xhr) {
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong. Please try again.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    </script>
@endsection
