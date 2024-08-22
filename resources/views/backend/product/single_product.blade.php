@extends('backend.layout.master')

@section('header-content')
    <style>
        .custom-heading {
            display: inline-block;
            padding-bottom: 20px;
            margin: 1rem;
            margin-left: .6rem;
        }

        .custom-heading p {
            font-size: 1.5rem;
            font-weight: bolder;
            border-bottom: 2px solid #222;
            padding-bottom: 10px;
            padding-right: 70px;
        }

        .custom-heading p span {
            font-weight: 100;
        }

        .gallery-wrapper img {
            max-width: 100%;
            height: auto;
            vertical-align: middle;
            display: inline-block;
        }

        .gallery-wrapper>div {
            position: relative;
            overflow: hidden;
            border-radius: 5px;
        }

        .gallery-wrapper>div>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
            transition: all .3s;
            -webkit-transition: all .3s;
            -moz-transition: all .3s;
        }

        .gallery-wrapper {
            display: grid;
            grid-gap: 30px;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-auto-rows: 336px;
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
        
        /* Image Overlay */
        .overlay-single {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.5s ease;
            border-radius: 5px;
        }

        .overlay-single button {
            color: #fff;
            background: transparent;
            border: none;
            outline: none;
            font-size: 3rem;
            text-decoration: none;
            transition: all .5s ease;
            -webkit-transition: all .5s ease;
            -moz-transition: all .5s ease;
        }

        .single-image:hover .overlay-single {
            opacity: 1;
        }

        .overlay-button:hover {
            transform: scale(1.5);
            -webkit-transform: scale(1.5);
            -moz-transform: scale(1.5); 
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

                @if (isset($product))
                    <div class="row">
                        <div class="col-lg-11 m-auto">

                            <div class="row mb5" style="font-size:1rem">

                                <!-- Action Button -->
                                <div class="action-button text-end mb-4">

                                    <!-- Edit -->
                                    <a href="{{ route('product.edit', $product->slug) }}"
                                        class="btn btn-warning px-5">Edit</a>

                                    <!-- Delete -->
                                    <form class="d-inline mx-2" action="{{ route('product.destroy', $product->slug) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger px-5">Delete</button>
                                    </form>
                                </div>

                                <!-- Product Details -->
                                <div class="col-xxl-4">
                                    <div class="card border-warning">
                                        <div class="card-body">

                                            <div class="custom-heading">
                                                <p>Product <span>Detail</span> </p>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table mb-0">
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

                                                        <!-- Price -->
                                                        <tr>
                                                            <th class="py-4" scope="row">Price: </th>
                                                            <td class="py-4">{{ $product->price }}</td>
                                                        </tr>

                                                        <!-- Status -->
                                                        <tr>
                                                            <th class="py-4" scope="row">Status: </th>
                                                            <td class="py-4">{{ $product->status }}</td>
                                                        </tr>

                                                        <!-- Variants -->
                                                        <tr>
                                                            <th class="pt-4 border-bottom-0" scope="row">Variants: </th>
                                                        </tr>
                                                        <tr>

                                                            <table class="table table-light table-bordered text-center">
                                                                <thead>
                                                                    <tr class="table-bordered table-warning fw-bold">
                                                                        <th scope="col">Color</th>
                                                                        <th scope="col">Stock</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($product->variant as $variant)
                                                                        <tr>
                                                                            <!-- Color -->
                                                                            <td style="vertical-align:middle">
                                                                                {{ $variant->color }}</td>
                                                                            <!-- Stock -->
                                                                            <td style="vertical-align:middle">
                                                                                {{ $variant->stock }}</td>
                                                                            <!-- Action -->
                                                                            <td
                                                                                style="vertical-align:middle;cursor:default;">
                                                                                <!-- Edit -->
                                                                                <a href="{{ route('variant.edit', $variant->id) }}"
                                                                                    style="margin-right:5px"><abbr
                                                                                        title="Edit"
                                                                                        style="cursor:pointer"><i
                                                                                            data-feather="edit"
                                                                                            class="icon-md c-f2a100"></i></abbr></a>
                                                                                <!-- Delete -->
                                                                                <form class="d-inline"
                                                                                    action="{{ route('variant.destroy', $variant->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        style="border:none;background:transparent;margin-left:5px"><abbr
                                                                                            title="Delete"
                                                                                            style="cursor:pointer"><i
                                                                                                data-feather="trash-2"
                                                                                                class="icon-md c-f2a100"></i></abbr></button>
                                                                                </form>

                                                                            </td>
                                                                        </tr>
                                                                    @empty
                                                                        <tr>
                                                                            <td class="border-bottom-0 text-center text-danger"
                                                                                colspan="12">There is no Variant for this
                                                                                Product!</td>
                                                                        </tr>
                                                                    @endforelse
                                                                    <tr>
                                                                        <td colspan="12" class="fw-bold">Total Stock =
                                                                            {{ $total_stock }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- End Product Details -->

                                <!-- Product Descriptions -->
                                <div class="col-xxl-8">
                                    <div class="card border-warning">
                                        <div class="card-body">

                                            <div class="custom-heading">
                                                <p>Product <span>Description</span> </p>
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
                                <div class="col-12 mt-5">
                                    <div class="card border-warning">
                                        <div class="card-body">

                                            <div class="gallery">

                                                <div class="custom-heading">
                                                    <p>Product <span>Image</span> </p>
                                                </div>

                                                <div class="gallery-wrapper">
                                                    <div><img src="{{ asset($product->thumbnail) }}"
                                                            alt="Product Thumbnail"></div>
                                                    @if ($product->images)
                                                        @foreach ($product->images as $image)
                                                            <div class="single-image">
                                                                <img src="{{ asset($image) }}" alt="Product Image">

                                                                <div class="overlay-single">
                                                                    <form action="{{ route('product.deleteImage', $product->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('DELETE')
    
                                                                        <input type="hidden" name="image" value="{{ $image }}">
                                                                        <button type="submit" class="overlay-button"><i class="mdi mdi-delete"></i></button>
    
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>

                                                <div class="product-footer mt-5">
                                                    <p class="text-danger mb-0">NB: <span class="fst-italic">The first
                                                            Image is Product Thumbnail.</span></p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- End Product Images -->

                            </div>
                        </div>

                    </div>
                @endif

                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        @endsection
