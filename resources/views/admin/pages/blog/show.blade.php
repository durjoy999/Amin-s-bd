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
                    <h4 class="mb-sm-0 font-size-18">Blog Details</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">All Blogs</a></li>
                            <li class="breadcrumb-item active">Blog Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
            <div class="container">
                <div class="row">
                  <div class="col-12">
                    <img src="{{ asset('photo') }}/{{ $blog->image }}" alt="blog"  style="height:400px;">
                  </div>
            <div class="container mb-4 pt-5">
              <div class="row">
                <div class="col-12">
                    <h2>Title:</h2>
                    <b>{{ $blog->title }}</b>
                </div>
                <div class="col-4">
                    <h2>Status:</h2>
                    <b>{{ $blog->status }}</b>
                </div>
                <div class="co-4">
                    <h2>Created By:</h2>
                    <b>{{ $blog->adminCreatedBy->name }}</b>
                </div>
                <div class="col-4">
                    <h2>Edited By:</h2>
                    @if ($blog->edited_by==1)
                    <b>{{ $blog->adminEditedBy->name }}</b>
                    @endif
                </div>
              </div>
            </div>
                  <div class="col-12">
                    <h2>Description:</h2>
                    <p>{!! $blog->description !!}</p>
                  </div>
                </div>
              </div>


    </div> <!-- container-fluid -->
</div>
{{-- @section('admin_js')
    <script>
       $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                        $('.sweet_delete').click(function(){
                var delete_id = $(this).closest("tr").find('.role_val_id').val();
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
                         url:'/admin/roles/destroy/'+delete_id,
                         data: data,
                         success: function (response){
                         Swal.fire(
                               'Deleted!',
                               'Role & Permissions deleted.',
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
@endsection --}}
@endsection
