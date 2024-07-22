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
                            <h4 class="mb-sm-0">Variant</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Variant</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <div class="add-variant mb-3 float-end">
                            <a href="{{ route('variant.create') }}" class="btn btn-primary btn-md"> + add Variant </a>
                        </div>

                        <table class="table table-nowrap text-center table-light table-bordered">
                            <thead>
                                <tr class="table-bordered border-info fw-bold">
                                    <th class="fw-bolder" scope="col">Product</th>
                                    <th class="fw-bolder" scope="col">Color</th>
                                    <th class="fw-bolder" scope="col">Color Code</th>
                                    <th class="fw-bolder" scope="col">Size</th>
                                    <th class="fw-bolder" scope="col">Stock</th>
                                    <th class="fw-bolder" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($variants as $variant)
                                    <tr>
                                        <!-- Product -->
                                        <td style="vertical-align:middle">{{ $variant->product->name }}</td>

                                        <!-- Color -->
                                        <td style="vertical-align:middle">
                                            @if ($variant->color)
                                                {{ $variant->color }}
                                            @else
                                                <span class="fst-italic fw-light text-muted">Null</span>
                                            @endif
                                        </td>

                                        <!-- Color Code -->
                                        <td style="vertical-align:middle">
                                            @if ($variant->color_code)
                                                {{ $variant->color_code }}
                                            @else
                                                <span class="fst-italic fw-light text-muted">Null</span>
                                            @endif
                                        </td>

                                        <!-- Size -->
                                        <td style="vertical-align:middle">
                                            @if ($variant->size)
                                                {{ $variant->size }}
                                            @else
                                                <span class="fst-italic fw-light text-muted">Null</span>
                                            @endif
                                        </td>

                                        <!-- Stock -->
                                        <td style="vertical-align:middle">{{ $variant->stock }}</td>

                                        <!-- Action -->
                                        <td style="vertical-align:middle;cursor:default;">
                                            <!-- Edit -->
                                            <a href="{{ route('variant.edit', $variant->id) }}"
                                                style="color:deepskyblue;margin-right:5px"><abbr title="Edit"
                                                    style="cursor:pointer"><i data-feather="edit"
                                                        class="icon-xl"></i></abbr></a>
                                            <!-- Delete -->
                                            <form class="d-inline" action="{{ route('variant.destroy', $variant->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="border:none;background:transparent;color:deepskyblue;margin-left:5px"><abbr
                                                        title="Delete" style="cursor:pointer"><i data-feather="trash-2"
                                                            class="icon-xl"></i></abbr></button>
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
