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
                                    <th class="fw-bolder" scope="col">Code</th>
                                    <th class="fw-bolder" scope="col">Category</th>
                                    <th class="fw-bolder" scope="col">Best Sale</th>
                                    <th class="fw-bolder" scope="col">Status</th>
                                    <th class="fw-bolder" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>

                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $product->name }}</td>

                                        <!-- Code -->
                                        <td style="vertical-align:middle">{{ $product->code }}</td>

                                        <!-- Category -->
                                        <td style="vertical-align:middle">{{ $product->category->name }}</td>

                                        <!-- Best Sale -->
                                        <td style="vertical-align:middle;background:transparent">
                                            <div
                                                class="form-check form-switch form-switch-warning form-switch-md text-center">
                                                <input class="form-check-input best_sale_toggle" type="checkbox"
                                                    role="switch" id="bestSaleSwitch{{ $product->id }}"
                                                    data-id="{{ $product->id }}"
                                                    {{ $product->best_sale === 'on' ? 'checked' : '' }}>
                                            </div>
                                        </td>

                                        <!-- Status -->
                                        <td style="vertical-align:middle;background:transparent">
                                            <div
                                                class="form-check form-switch form-switch-warning form-switch-md text-center">
                                                <input class="form-check-input status_toggle" type="checkbox" role="switch"
                                                    id="statusSwitch{{ $product->id }}" data-id="{{ $product->id }}"
                                                    {{ $product->status === 'active' ? 'checked' : '' }}>
                                            </div>
                                        </td>

                                        <!-- Action -->
                                        <td style="vertical-align:middle;cursor:default;">
                                            <a href="{{ route('single.productDetails', $product->slug) }}"
                                                class="btn btn-warning btn-sm">View More</a>
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

    @section('footer-content')
        <script>
            $(document).ready(function() {
                // Handle Best Sale Toggle
                $('.best_sale_toggle').change(function() {
                    var toggleSwitch = $(this);
                    var product_id = toggleSwitch.data('id');
                    var bestSaleStatus = toggleSwitch.is(':checked') ? 'on' : 'off';

                    $.ajax({
                        url: '{{ route('product.toggleBestSale', '') }}/' + product_id,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            best_sale: bestSaleStatus
                        },
                        success: function(response) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: 'An error occurred while updating the Best Sale status.',
                                showConfirmButton: false,
                                timer: 2000
                            });

                            // Revert the switch to its previous state
                            toggleSwitch.prop('checked', !toggleSwitch.is(':checked'));
                        }
                    });
                });

                // Handle Status Toggle
                $('.status_toggle').change(function() {
                    var toggleSwitch = $(this);
                    var product_id = toggleSwitch.data('id');
                    var currentStatus = toggleSwitch.is(':checked') ? 'active' : 'inactive';

                    $.ajax({
                        url: '{{ route('product.toggleStatus', '') }}/' + product_id,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            status: currentStatus
                        },
                        success: function(response) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'An error occurred while updating the status.',
                                showConfirmButton: false,
                                timer: 2000
                            });

                            // Revert the switch to its previous state
                            toggleSwitch.prop('checked', !toggleSwitch.is(':checked'));
                        }
                    });
                });
            });
        </script>
    @endsection
