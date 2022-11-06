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
            <div class="col-12">
                <div class="card">
                    {{-- @include('partials.toast') --}}
                    <div class="card-body m-auto">
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 300px;"> <strong>Email </strong></th>
                                        <td>{{ $requestQuote->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Phone </strong></th>
                                        <td>{{ $requestQuote->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Product Name </strong></th>
                                        <td>{{ $requestQuote->product_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Product Link </strong></th>
                                        <td><a href="">{{ $requestQuote->product_link }}</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Quantity </strong></th>
                                        <td>{{ $requestQuote->quantity }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Shipping With Cost </strong></th>
                                        <td>{{ $requestQuote->shipping_with_cost }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Shipping Without Cost </strong></th>
                                        <td>{{ $requestQuote->shipping_without_cost }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Quantity </strong></th>
                                        <td>{{ $requestQuote->quantity }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.requestsQuotes.reply',$requestQuote->id) }}" class="mb-sm-0 mt-2 font-size-15 btn btn-primary text-center">Send Mail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>





    </div> <!-- container-fluid -->
</div>
@endsection
