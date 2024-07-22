@extends('backend.layout.master')

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
                            <h4 class="mb-sm-0">Edit Product</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('product.view') }}">Product</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('product.details', $product->slug) }}">Product Details</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <form action="{{ route('product.update', $product->slug) }}" method="POST" class="mt-5">
                        @method('PUT')
                        @csrf

                        <!-- Name -->
                        <div class="row mb-4">
                            <div class="col-lg-2">
                                <label for="name" class="form-label">Name: <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="name" value="{{ $product->name }}" id="name"
                                    class="form-control" placeholder="product Name">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Brand -->
                        <div class="row mb-4">
                            <div class="col-lg-2">
                                <label for="brand" class="form-label">Brand: </label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="brand" value="{{ $product->brand }}" id="brand"
                                    class="form-control" placeholder="product Brand">

                                @error('brand')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="row mb-4">
                            <div class="col-lg-2">
                                <label for="price" class="form-label">Price: <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="price" value="{{ $product->price }}" id="price"
                                    class="form-control" placeholder="product Price">

                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Discount -->
                        <div class="row mb-4">
                            <div class="col-lg-2">
                                <label for="discount" class="form-label">Discount: </label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="discount" value="{{$product->discount}}" id="discount"
                                    class="form-control" placeholder="product Discount">

                                @error('discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Short Description -->
                        <div class="row mb-4">
                            <div class="col-lg-2">
                                <label for="short_description" class="form-label">Short Description: </label>
                            </div>
                            <div class="col-lg-10">
                                <textarea name="short_description" id="short_description" rows="3" class="form-control" placeholder="Short Description about this Product">{{$product->short_description}}</textarea>

                                @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Full Description -->
                        <div class="row mb-4">
                            <div class="col-lg-2">
                                <label for="description" class="form-label">Full Description: <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-10">
                                <textarea name="description" id="description" rows="8" class="form-control" placeholder="Full Description about this Product">{{$product->description}}</textarea>

                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-warning">Update Product</button>
                        </div>
                    </form>

                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
@endsection