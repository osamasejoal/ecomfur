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

                            <!-- Product Category -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="category_id" class="form-label"> Select Category: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    @if ($categories->isEmpty())
                                        <select name="category_id" id="category_id" class="form-select text-center" disabled>
                                            <option> Please add Category first </option>
                                        </select>
                                    @else
                                        <select name="category_id" id="category_id" class="form-select text-center">

                                            <option selected> ** Choose Category ** </option>

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif


                                    @error('category_id')
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

                            <!-- Short Description -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="short_description" class="form-label">Short Description: </label>
                                </div>
                                <div class="col-lg-10">
                                    <textarea name="short_description" id="short_description" rows="3" class="form-control"
                                        placeholder="Short Description about the Product">{{ old('short_description') }}</textarea>

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
                                    <textarea name="description" id="description" rows="3" class="form-control"
                                        placeholder="Full Description about the Product">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Thumbnail -->
                            <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="thumbnail" class="form-label">Thumbnail: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control"
                                        accept="image/*">

                                    @error('thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4 pt-1" id="imagePreviewContainer" style="display: none;">
                                <div class="col-lg-2">
                                    <label for="showImage" class="form-label"></label>
                                </div>
                                <div class="col-lg-10">
                                    <img src="" alt="Selected Image" class="rounded-2" id="showImage"
                                        style="object-fit:cover;object-position:center;width:180px;height:180px;">
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="images" class="form-label">Images: </label>
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
                            <div class="text-center my-5">
                                <button type="submit" class="btn btn-warning">Create Product</button>
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

        <!-- Thumbnail Image to show -->
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                const thumbnailInput = document.getElementById('thumbnail');
                const showImage = document.getElementById('showImage');
                const imagePreviewContainer = document.getElementById('imagePreviewContainer');

                thumbnailInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            showImage.src = e.target.result;
                            imagePreviewContainer.style.display = 'flex';
                        }
                        reader.readAsDataURL(file);
                    } else {
                        showImage.src = "";
                        imagePreviewContainer.style.display = 'none';
                    }
                });
            });
        </script>

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
