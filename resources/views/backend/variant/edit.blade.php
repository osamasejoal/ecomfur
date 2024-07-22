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
                            <h4 class="mb-sm-0">Edit Variant</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('variant.view') }}">Variant</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <form action="{{ route('variant.update', $variant->id) }}" method="POST" class="mt-5">
                        @method('PUT')
                        @csrf

                        <!-- Stock -->
                        <div class="row mb-4">
                            <div class="col-lg-2">
                                <label for="stock" class="form-label">Stock: <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="stock" value="{{ $variant->stock }}" id="stock"
                                    class="form-control" placeholder="Product Stock for this Variant">

                                @error('stock')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-warning">Update Variant</button>
                        </div>
                    </form>

                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
@endsection