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
                            <h4 class="mb-sm-0">Create Coupon</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('coupon.view') }}">Coupon</a></li>
                                    <li class="breadcrumb-item active">Create</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <form action="{{ route('coupon.store') }}" method="POST" class="mt-5">
                            @csrf

                            <!-- Name -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="name" class="form-label">Name: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="name" value="{{ old('name') }}" id="name"
                                        class="form-control" placeholder="Coupon Name">

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
                                        class="form-control" placeholder="Coupon Code">

                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Discount -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="discount" class="form-label">Discount: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="number" name="discount" value="{{ old('discount') }}" id="discount"
                                        class="form-control" placeholder="Coupon Discount">

                                    @error('discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Validity -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="validity" class="form-label">Validity: </label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="date" name="validity" value="{{ old('validity') }}" id="validity"
                                        class="form-control">

                                    @error('validity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Limit -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="limit" class="form-label">Limit: </label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="number" name="limit" value="{{ old('limit') }}" id="limit"
                                        class="form-control" placeholder="Coupon Limit">

                                    @error('limit')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-warning">Create Coupon</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection