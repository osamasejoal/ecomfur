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
                            <h4 class="mb-sm-0">Review</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Review</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <table class="table table-nowrap text-center table-light table-bordered">
                            <thead>
                                <tr class="table-bordered border-warning fw-bold">
                                    <th class="fw-bolder" scope="col">User</th>
                                    <th class="fw-bolder" scope="col">Product</th>
                                    <th class="fw-bolder" scope="col">Comment</th>
                                    <th class="fw-bolder" scope="col">Rating</th>
                                    <th class="fw-bolder" scope="col">Reply</th>
                                    <th class="fw-bolder" scope="col">Status</th>
                                    <th class="fw-bolder" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviews as $review)
                                    <tr>
                                        
                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $review->user->name }}</td>
                                        
                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $review->product->name }}</td>
                                        
                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $review->comment }}</td>
                                        
                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $review->rating }}</td>
                                        
                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $review->reply }}</td>

                                        <!-- Status -->
                                        <td style="vertical-align:middle">{{ $review->status }}</td>

                                        <!-- Action -->
                                        <td style="vertical-align:middle;cursor:default;">
                                            <!-- Edit -->
                                            <a href="{{ route('review.edit', $review->id) }}"
                                                style="margin-right:5px"><abbr title="Edit"
                                                    style="cursor:pointer"><i data-feather="edit"
                                                        class="icon-xl c-f2a100"></i></abbr></a>
                                            <!-- Delete -->
                                            <form class="d-inline" action="{{ route('review.destroy', $review->id) }}"
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
