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
                            <h4 class="mb-sm-0">Category</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Category</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <div class="add-category mb-3 float-end">
                            <a href="{{ route('category.create') }}" class="btn btn-warning btn-md"> + Add Category </a>
                        </div>

                        <table class="table table-nowrap text-center table-light table-bordered">
                            <thead>
                                <tr class="table-bordered border-warning fw-bold">
                                    <th class="fw-bolder" scope="col">Name</th>
                                    <th class="fw-bolder" scope="col">Slug</th>
                                    <th class="fw-bolder" scope="col">Image</th>
                                    <th class="fw-bolder" scope="col">Featured</th>
                                    <th class="fw-bolder" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        
                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $category->name }}</td>

                                        <!-- Slug -->
                                        <td style="vertical-align:middle">{{ $category->slug }}</td>

                                        <!-- Image -->
                                        <td style="vertical-align:middle">
                                            @if ($category->image)
                                                <img style="object-fit:cover;object-position:center;width:200px"
                                                    src="{{ asset($category->image) }}" alt=""
                                                    class="rounded-2">
                                            @else
                                                <span class="fw-light fst-italic">Null</span>
                                            @endif
                                        </td>
                                        
                                        <!-- Featured in Front Page -->
                                        <td style="vertical-align:middle;background:transparent">
                                            <div
                                                class="form-check form-switch form-switch-warning form-switch-md text-center">
                                                <input class="form-check-input featured_toggle" type="checkbox"
                                                    role="switch" id="featuredSwitch{{ $category->id }}"
                                                    data-id="{{ $category->id }}"
                                                    {{ $category->featured === 'on' ? 'checked' : '' }}>
                                            </div>
                                        </td>

                                        <!-- Action -->
                                        <td style="vertical-align:middle;cursor:default;">
                                            <!-- Edit -->
                                            <a href="{{ route('category.edit', $category->slug) }}"
                                                style="margin-right:5px"><abbr title="Edit"
                                                    style="cursor:pointer"><i data-feather="edit"
                                                        class="icon-xl c-f2a100"></i></abbr></a>
                                            <!-- Delete -->
                                            <form class="d-inline" action="{{ route('category.destroy', $category->slug) }}"
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
                // Handle featured Toggle
                $('.featured_toggle').change(function() {
                    var toggleSwitch = $(this);
                    var category_id = toggleSwitch.data('id');
                    var featuredStatus = toggleSwitch.is(':checked') ? 'on' : 'off';

                    $.ajax({
                        url: '{{ route('category.toggleFeatured', '') }}/' + category_id,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            featured: featuredStatus
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
            });
        </script>
    @endsection

