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
                    <h4 class="mb-sm-0 font-size-18">All Requests Quotes</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Requests Quotes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                         <div class="row align-items-center">     <!-- end row -->
                         @if (Session::has('Blog_delete_success'))
                             <div class="alert alert-success">
                                 {{ Session::get('Blog_delete_success') }}
                             </div>
                         @endif

                         <div class="table-responsive mb-4">
                             <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                 <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Link</th>
                                    <th>Quantity</th>
                                    <th>Cost With Shipping</th>
                                    <th>Cost Without Shipping</th>
                                    <th>Reply</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requestsQuotes as $requestsQuote)
                                <tr @if ($requestsQuote->read_status == 'Unread')
                                    class="bg-secondary text-white"
                                    @endif>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $requestsQuote->product_name }}</td>
                                    <td>{{ $requestsQuote->product_link }}</td>
                                    <td>{{ $requestsQuote->quantity }}</td>
                                    <td>{{ $requestsQuote->shipping_with_cost }}</td>
                                    <td>{{ $requestsQuote->shipping_without_cost }}</td>
                                    <td>
                                        @if ( $requestsQuote->reply_status == 'Active')
                                        <span class="badge bg-danger">Un Reply</span>
                                        @else
                                        <span class="badge bg-success">Replied</span>
                                        @endif
                                    </td>
                                    <td>
                                         <a href="{{ url('admin/requestsQuotes/show') }}/{{ $requestsQuote->id  }}" class="btn btn-sm btn-primary"><i class="fas fa-eye" ></i></a>
                                        {{-- <a href="" class="btn btn-sm btn-success waves-effect waves-light">
                                            <i class="far fa-eye d-block font-size-16 p-1"></i>
                                        </a> --}}
                                        <a href="" class="btn btn-sm btn-info waves-effect waves-light">
                                            <i class="fas fa-reply d-block font-size-16 p-1"></i>
                                        </a>
                                        <a href="" onclick="return confirm('Product Will Be Delete?')" class="btn btn-sm btn-danger waves-effect waves-light">
                                            <i class="mdi mdi-trash-can d-block font-size-16"></i>
                                        </a>
                                            </td>
                                        </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                             <!-- end table -->
                         </div>
                         <!-- end table responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@section('admin_js')
    <script>
       $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                        $('.sweet_delete').click(function(){
                var delete_id = $(this).closest("tr").find('.blog_val_id').val();
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                      var data = {
                          "_token": $('input[name=_token]').val(),
                          "id": delete_id,
                      };
                      $.ajax({
                         type:"GET",
                         url:'/admin/blogs/delete/'+delete_id,
                         data: data,
                         success: function (response){
                         Swal.fire(
                               'Deleted!',
                               'Blog Page Delete.',
                               'success'
                             )
                             .then((result) =>{
                                location.reload();
                             });
                         }
                      });
                  }
                })
            });
        } );
    </script>
@endsection
@endsection
