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
                            <h4 class="mb-sm-0">Coupon</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Coupon</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <div class="add-coupon mb-3 float-end">
                            <a href="{{ route('coupon.create') }}" class="btn btn-warning btn-md"> + Add Coupon </a>
                        </div>

                        <table class="table table-nowrap text-center table-light table-bordered">
                            <thead>
                                <tr class="table-bordered border-warning fw-bold">
                                    <th class="fw-bolder" scope="col">Name</th>
                                    <th class="fw-bolder" scope="col">code</th>
                                    <th class="fw-bolder" scope="col">discount</th>
                                    <th class="fw-bolder" scope="col">validity</th>
                                    <th class="fw-bolder" scope="col">limit</th>
                                    <th class="fw-bolder" scope="col">Status</th>
                                    <th class="fw-bolder" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($coupons as $coupon)
                                    <tr>

                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $coupon->name }}</td>

                                        <!-- Code -->
                                        <td style="vertical-align:middle">{{ $coupon->code }}</td>

                                        <!-- Discount -->
                                        <td style="vertical-align:middle">{{ $coupon->discount . '%' }}</td>

                                        <!-- Validity -->
                                        <td style="vertical-align:middle">{{ $coupon->validity }}</td>

                                        <!-- Limit -->
                                        <td style="vertical-align:middle">{{ $coupon->limit }}</td>

                                        <!-- Status -->
                                        <!-- Status -->
                                        <td style="vertical-align:middle;background:transparent">
                                            <div
                                                class="form-check form-switch form-switch-warning form-switch-md text-center">
                                                <input class="form-check-input status_toggle" type="checkbox" role="switch"
                                                    id="statusSwitch{{ $coupon->id }}" data-id="{{ $coupon->id }}"
                                                    {{ $coupon->status === 'active' ? 'checked' : '' }}>
                                            </div>
                                        </td>

                                        <!-- Action -->
                                        <td style="vertical-align:middle;cursor:default;">
                                            <!-- Edit -->
                                            <a href="{{ route('coupon.edit', $coupon->id) }}"
                                                style="margin-right:5px"><abbr title="Edit"
                                                    style="cursor:pointer"><i data-feather="edit"
                                                        class="icon-xl c-f2a100"></i></abbr></a>
                                            <!-- Delete -->
                                            <form class="d-inline" action="{{ route('coupon.destroy', $coupon->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="border:none;background:transparent;margin-left:5px"><abbr
                                                        title="Delete" style="cursor:pointer"><i data-feather="trash-2"
                                                            class="icon-xl c-f2a100"></i></abbr></button>
                                            </form>

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

            // Handle Status Toggle
            $('.status_toggle').change(function() {
                var toggleSwitch = $(this);
                var coupon_id = toggleSwitch.data('id');
                var currentStatus = toggleSwitch.is(':checked') ? 'active' : 'inactive';

                $.ajax({
                    url: '{{ route('coupon.toggleStatus', '') }}/' + coupon_id,
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
