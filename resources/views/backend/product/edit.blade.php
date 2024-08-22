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
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row mb-5">
                    <div class="col-lg-11 m-auto">

                        <form action="{{ route('product.update', $product->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
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

                            <!-- Short Description -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="short_description" class="form-label">Short Description: </label>
                                </div>
                                <div class="col-lg-10">
                                    <textarea name="short_description" id="short_description" rows="3" class="form-control"
                                        placeholder="Short Description about this Product">{{ $product->short_description }}</textarea>

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
                                    <textarea name="description" id="description" rows="8" class="form-control"
                                        placeholder="Full Description about this Product">{{ $product->description }}</textarea>

                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="images" class="form-label">Add Images: </label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="file" name="images[]" id="images" class="form-control" multiple>

                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="showImages" class="form-label"></label>
                                </div>
                                <div class="col-lg-10">
                                    <div id="showImages" class="d-flex flex-wrap">
                                        <!-- Selected images will be displayed here -->
                                    </div>
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

    @section('footer-content')
        <!-- Images to show -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#images').change(function(e) {
                    $('#showImages').empty(); // Clear any existing images
                    var files = e.target.files;

                    $.each(files, function(index, file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = $('<img>').attr('src', e.target.result)
                                .addClass('rounded-2 me-2 mb-2')
                                .css({
                                    'object-fit': 'cover',
                                    'object-position': 'center',
                                    'width': '180px',
                                    'height': '180px'
                                });
                            $('#showImages').append(img);
                        }
                        reader.readAsDataURL(file);
                    });
                });
            });
        </script>
    @endsection
