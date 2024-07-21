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
                            <h4 class="mb-sm-0">Create Product</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('product.view') }}">Product</a></li>
                                    <li class="breadcrumb-item active">Create</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                            class="mt-5">
                            @csrf

                            <!-- Category -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="title" class="form-label"> Select Category: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <select name="category_id" id="category_id" class="form-select text-center" {{ $categories ? '' : 'disabled' }}>

                                        @if ($categories)
                                            <option selected> ** Choose Category ** </option>

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @else
                                            <option value="" selected> There is no Category to show! </option>
                                        @endif

                                    </select>

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Name -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="name" class="form-label">Name: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="name" value="{{ old('name') }}" id="name"
                                        class="form-control" placeholder="Product Name">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Code -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="code" class="form-label">Code: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="code" value="{{ old('code') }}" id="code"
                                        class="form-control" placeholder="Product Code">

                                    @error('code')
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
                                    <input type="text" name="brand" value="{{ old('brand') }}" id="brand"
                                        class="form-control" placeholder="Product Brand">

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
                                    <input type="number" name="price" value="{{ old('price') }}" id="price"
                                        class="form-control" placeholder="Product Price">

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
                                    <input type="number" name="discount" value="{{ old('discount') }}" id="discount"
                                        class="form-control" placeholder="Product Discount">

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
                                    <textarea name="short_description" id="short_description" rows="3" class="form-control" placeholder="Short Description about the Product">{{old('short_description')}}</textarea>

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
                                    <textarea name="description" id="description" rows="3" class="form-control" placeholder="Full Description about the Product">{{old('description')}}</textarea>

                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="images" class="form-label">Images: <span
                                        class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="file" name="images" id="images" class="form-control" multiple>

                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="showImage" class="form-label"></label>
                                </div>
                                <div class="col-lg-10">
                                    <img src="{{ asset('upload/no-image.png') }}" alt="No Image" class="rounded-circle "
                                        id="showImage"
                                        style="object-fit:cover;object-position:center;width:180px;height:180px;">
                                </div>
                            </div> --}}


                            <!-- Submit Button -->
                            <div class="text-center my-5">
                                <button type="submit" class="btn btn-primary">Create Product</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection

    @section('footer-content')
        <!-- The script to show the image what have been chosen by user but didn't submit yet. -->
        {{-- <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script> --}}
    @endsection
