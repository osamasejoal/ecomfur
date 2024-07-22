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
                            <h4 class="mb-sm-0">Product</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Product</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <div class="add-product mb-3 float-end">
                            <a href="{{ route('product.create') }}" class="btn btn-warning btn-md"> + Add Product </a>
                        </div>

                        <table class="table table-nowrap text-center table-light table-bordered">
                            <thead>
                                <tr class="table-bordered border-warning fw-bold">
                                    <th class="fw-bolder" scope="col">Name</th>
                                    <th class="fw-bolder" scope="col">Slug</th>
                                    <th class="fw-bolder" scope="col">Code</th>
                                    <th class="fw-bolder" scope="col">Category</th>
                                    <th class="fw-bolder" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>

                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $product->name }}</td>

                                        <!-- Slug -->
                                        <td style="vertical-align:middle">{{ $product->slug }}</td>

                                        <!-- Code -->
                                        <td style="vertical-align:middle">{{ $product->code }}</td>

                                        <!-- Category -->
                                        <td style="vertical-align:middle">{{ $product->category->name }}</td>

                                        <!-- Action -->
                                        <td style="vertical-align:middle;cursor:default;">
                                            <a href="{{ route('product.details', $product->slug) }}" class="btn btn-warning btn-sm">View More</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center text-danger">There is no data to show</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection
