@extends('backend.layout.master')

@section('header-content')
    <style>
        .product-heading {
            display: inline-block;
            padding-bottom: 20px;
            margin: 1rem;
            margin-left: .6rem;
        }

        .product-heading p {
            font-size: 1.5rem;
            font-weight: bolder;
            border-bottom: 2px solid #222;
            padding-bottom: 10px;
            padding-right: 70px;
        }

        .product-heading p span {
            font-weight: 100;
        }

        .gallery-wrapper img {
            max-width: 100%;
            height: auto;
            vertical-align: middle;
            display: inline-block;
        }

        .gallery-wrapper>div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .gallery-wrapper>div>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .gallery-wrapper {
            display: grid;
            grid-gap: 10px;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            grid-auto-rows: 350px;
            grid-auto-flow: dense;
        }

        .gallery-wrapper .wide {
            grid-column: span 2;
        }

        .gallery-wrapper .tall {
            grid-row: span 2;
        }

        .gallery-wrapper .big {
            grid-column: span 2;
            grid-row: span 2;
        }
    </style>
@endsection


@section('main-content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Product Details</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('product.view') }}">Product</a></li>
                                    <li class="breadcrumb-item active">Details</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <div class="row my-5" style="font-size:1rem">

                            <!-- Product Details -->
                            <div class="col-xxl-4">
                                <div class="card border-info">
                                    <div class="card-body">

                                        <div class="product-heading">
                                            <p>Product <span>Detail</span> </h3>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>

                                                    <!-- Category -->
                                                    <tr>
                                                        <th class="py-3" scope="row"> Category: </th>
                                                        <td class="py-3">{{ $product->category->name }}</td>
                                                    </tr>

                                                    <!-- Name -->
                                                    <tr>
                                                        <th class="py-4" scope="row">Name: </th>
                                                        <td class="py-4">{{ $product->name }}</td>
                                                    </tr>

                                                    <!-- Slug -->
                                                    <tr>
                                                        <th class="py-4" scope="row">Slug: </th>
                                                        <td class="py-4">{{ $product->slug }}</td>
                                                    </tr>

                                                    <!-- Code -->
                                                    <tr>
                                                        <th class="py-4" scope="row">Code: </th>
                                                        <td class="py-4">{{ $product->code }}</td>
                                                    </tr>

                                                    <!-- Brand -->
                                                    <tr>
                                                        <th class="py-4" scope="row">Brand: </th>
                                                        @if ($product->brand)
                                                            <td class="py-4">{{ $product->brand }}</td>
                                                        @else
                                                            <td class="py-4 fw-light fst-italic text-muted">Null</td>
                                                        @endif
                                                    </tr>

                                                    <!-- Price -->
                                                    <tr>
                                                        <th class="py-4" scope="row">Price: </th>
                                                        <td class="py-4">{{ $product->price }}</td>
                                                    </tr>

                                                    <!-- Discount -->
                                                    <tr>
                                                        <th class="py-4" scope="row">Discount: </th>
                                                        @if ($product->discount)
                                                            <td class="py-4">{{ $product->discount . '%' }}</td>
                                                        @else
                                                            <td class="py-4 fw-light fst-italic text-muted">Null</td>
                                                        @endif
                                                    </tr>

                                                    <!-- Status -->
                                                    <tr>
                                                        <th class="py-4" scope="row">Status: </th>
                                                        <td class="py-4">{{ $product->status }}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Action Button -->
                                        <div class="action-button mt-5 mb-2 text-center">

                                            <!-- Edit -->
                                            <a href="{{ route('product.edit', $product->slug) }}"
                                                class="btn btn-primary mx-2">Edit</a>

                                            <!-- Delete -->
                                            <form class="d-inline mx-2"
                                                action="{{ route('product.destroy', $product->slug) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- End Product Details -->

                            <!-- Product Descriptions -->
                            <div class="col-xxl-8">
                                <div class="card border-info">
                                    <div class="card-body">

                                        <div class="product-heading">
                                            <p>Product <span>Description</span> </h3>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <!-- Short Description -->
                                                    <tr>
                                                        <td class="pb-5">
                                                            <div class="d-inline-block fw-bold mb-3 border-bottom border-dark"
                                                                style="padding-right:10px">Short Description: </div>
                                                            <div class="mx-3">
                                                                @if ($product->short_description)
                                                                    {{ $product->short_description }}
                                                                @else
                                                                    <p class="fw-light fst-italic text-muted">Null</p>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- Full Description -->
                                                    <tr>
                                                        <td class="pt-5 pb-3 border-bottom-0">
                                                            <div class="d-inline-block fw-bold mb-3 border-bottom border-dark"
                                                                style="padding-right:10px">Full Description: </div>
                                                            <div class="mx-3">{{ $product->description }}</div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- End Product Descriptions -->

                            <!-- Product Images -->
                            <div class="col-12">
                                <div class="card border-info">
                                    <div class="card-body">

                                        <div class="gallery">

                                            <div class="product-heading">
                                                <p>Product <span>Image</span> </h3>
                                            </div>

                                            <div class="gallery-wrapper">
                                                @if ($product->images)
                                                    @foreach ($product->images as $image)
                                                        <div><img src="{{ $image }}" alt="Product Image"></div>
                                                    @endforeach
                                                @else
                                                    <p>There is no Images to show!</p>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div> <!-- End Product Images -->

                        </div>
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        @endsection
