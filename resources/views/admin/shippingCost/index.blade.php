@php
    error_reporting(0)
@endphp
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
                    <h4 class="mb-sm-0 font-size-18">All ShippingCosts</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All ShippingCosts</li>
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
                         <div class="row align-items-center">
                             <div class="col-md-6">
                                 <div class="mb-3">
                                     {{-- <h5 class="card-title">Total Admins <span class="text-muted fw-normal ms-2">({{ $data['admins']->count() }})</span></h5> --}}
                                 </div>
                             </div>
                             <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                                    <div>
                                        <a href="{{ route('admin.ShippingCosts.create') }}" class="btn btn-primary btn-sm"><i class="bx bx-plus me-1"></i> Add New</a>
                                    </div>
                                </div>

                            </div>

                         </div>
                         <!-- end row -->
                         <div class="table-responsive mb-4">
                             <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                 <thead>
                                <tr>
                                    <th>Ship Type</th>
                                    <th>Country</th>
                                    <th>Weight</th>
                                    <th>Product Type</th>
                                    <th>Product Price</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Edited By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shippings as $shipping)
                                <tr>
                                    <input class="blog_val_id" type="hidden" name="id" value="{{ $shipping->id }}">
                                    <td>{{ $shipping->ship_type }}</td>
                                    <td>{{ $shipping->countries->name }}</td>
                                    <td>{{ $shipping->weight }}</td>
                                    <td>{{ $shipping->products->name }}</td>
                                    <td>{{ $shipping->price }}</td>
                                    <td>
                                        @if ( $shipping->status == '1')
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">In Active</span>
                                        @endif
                                    </td>
                                    <td>{{ $shipping->created_by }}</td>
                                    <td>{{ $shipping->edited_by ?? 'N/A' }}</td>
                                    <td>
                                      <a href="{{ route('admin.ShippingCosts.edit',$shipping->id ) }}" class="btn btn-sm btn-primary"><i class="fas fa-user-edit" ></i></a>
                                      <a href="javascript:void(0)"class="btn btn-sm btn-danger sweet_delete"> <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
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
                         url:'/admin/ShippingCosts/delete/'+delete_id,
                         data: data,
                         success: function (response){
                         Swal.fire(
                               'Deleted!',
                               'Shipping Cost Page Delete.',
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

