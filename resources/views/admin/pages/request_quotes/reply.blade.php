@extends('layouts.admin.admin_app')
@section('admin_active')
    mm-active
@endsection
@section('admin_admin_active')
    active
@endsection
@section('admin_css_link')
       <!-- DataTables -->
       <link href="{{ asset('admin_assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

       <!-- Responsive datatable examples -->
       <link href="{{ asset('admin_assets') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('admin_assets') }}/css/sweetalert2.min.css">

@endsection
@section('admin_js_link')
    <!-- Required datatable js -->
    <script src="{{ asset('admin_assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin_assets') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('admin_assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin_assets') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- init js -->
    <script src="{{ asset('admin_assets') }}/js/pages/datatable-pages.init.js"></script>

@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">View Request A Quotes Details</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.requestsQuotes.index') }}">All Request A Quotes</a></li>
                            <li class="breadcrumb-item active">View Request A Quotes Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header" style="background-color: #f0674c;">
                        <h4 class="card-title text-center" style="color: #ffffff">Reply Request A Quote</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card">
                                    <!-- end card header -->
                                    @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                    @endif
                                    <div class="card-body">
                                        <div>
                                            <form method="post" action="{{ route('admin.requestsQuotes.replyStore') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="request_quotes_id" value="{{ $requestQuote->id }}">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Email: </label>
                                                    <input type="text" class="form-control" name="email" value="{{ $requestQuote->email }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Reply</label>
                                                    <textarea name="message" class="form-control"></textarea>
                                                    @error('message')
                                                    <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-header" style="background-color: #f0674c;">
                        <h4 class="card-title text-center" style="color: #ffffff">All Reply</h4>
                    </div>
                    <div class="card-body m-auto">
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 300px;"> <strong>Email </strong></th>
                                        <td>{{ $requestQuotesReply->email ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Reply </strong></th>
                                        <td>{{ $requestQuotesReply->message ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Time </strong></th>
                                        <td>{{ $requestQuotesReply->created_at ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
