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
                            <h4 class="mb-sm-0">Create Variant</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('variant.view') }}">Variant</a></li>
                                    <li class="breadcrumb-item active">Create</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <form action="{{ route('variant.store') }}" method="POST" class="mt-5">
                            @csrf

                            <!-- Variant Product -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="product_id" class="form-label"> Select Product: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <select name="product_id" id="product_id" class="form-select text-center"
                                        {{ $products ? '' : 'disabled' }}>
                                        
                                        <option selected> ** Choose Product ** </option>

                                        @forelse ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @empty
                                            <option value="" selected> There is no Product to show! </option>
                                        @endforelse

                                    </select>

                                    @error('product_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Variant Color -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="color_id" class="form-label"> Select Color: </label>
                                </div>
                                <div class="col-lg-10">
                                    <select name="color_id" id="color_id" class="form-select text-center"
                                        {{ $colors ? '' : 'disabled' }}>

                                        <option selected> ** Choose Color ** </option>

                                        @forelse ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->code . ' / ' . $color->title }}
                                            </option>
                                        @empty
                                            <option value="" selected class="text-danger"> There is no Color to show!
                                            </option>
                                        @endforelse

                                    </select>

                                    @error('color_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Variant Size -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="size" class="form-label"> Select Size: </label>
                                </div>
                                <div class="col-lg-10">
                                    <select name="size" id="size" class="form-select text-center"
                                        {{ $sizes ? '' : 'disabled' }}>

                                        <option selected> ** Choose Size ** </option>

                                        @forelse ($sizes as $size)
                                            <option value="{{ $size->title }}">{{ $size->title }}</option>
                                        @empty
                                            <option value="" selected class="text-danger"> There is no Size to show!
                                            </option>
                                        @endforelse

                                    </select>

                                    @error('size')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Stock -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="stock" class="form-label">Stock: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="number" name="stock" value="{{ old('stock') }}" id="stock"
                                        class="form-control" placeholder="Product's Stock for this Variant">

                                    @error('stock')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Create Variant</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection
