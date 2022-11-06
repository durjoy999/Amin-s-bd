@extends('layouts.admin.admin_app')
@section('home_active')
    active
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-muted mb-3 lh-1 d-block">Super Admin</h5>
                                <h6 class="mb-3">
                                    <span>{{ $superAdmin }}</span>
                                </h6>
                            </div>
                            <div class="admin-icon">
                                <i class="fas fa-user-shield" style="color: #f0674c;font-size:25px"></i>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-muted mb-3 lh-1 d-block">Blog</h5>
                                <h6 class="mb-3">
                                    <span>{{ $blog }}</span>
                                </h6>
                            </div>
                            <div class="admin-icon" style="color: #f0674c;font-size:25px">
                                <i class="fab fa-blogger"></i>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-muted mb-3 lh-1 d-block">RequestQuote</h5>
                                <h6 class="mb-3">
                                    <span>{{ $requestQuote }}</span>
                                </h6>
                            </div>
                            <div class="admin-icon" style="color: #f0674c;font-size:25px">
                                <i class="fas fa-poll-h"></i>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h5 class="text-muted mb-3 lh-1 d-block">Partner</h5>
                                <h6 class="mb-3">
                                    <span>{{ $partner }}</span>
                                </h6>
                            </div>
                            <div class="admin-icon" style="color: #f0674c;font-size:25px">
                                <i class="fas fa-user-friends"></i>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row-->
        <!-- end page title -->
    </div> <!-- container-fluid -->
</div>
@endsection
