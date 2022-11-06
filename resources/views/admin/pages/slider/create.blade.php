@extends('layouts.admin.admin_app')
@section('admin_active')
    mm-active
@endsection
@section('admin_admin_active')
    active
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Create Slider</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">All Sliders</a></li>
                            <li class="breadcrumb-item active">Create Slider</li>
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
                          <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Deactive">Deactive</option>
                                        </select>
                                        @error('status')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="col-6 mb-4">
                                        <label class="form-label">Image(size 1920px * 1080px)<span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="form-control"/>
                                        @error('image')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                  </div>
                              </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>

                          </form>
                         </div>
                         <!-- end row -->
                         <!-- end table responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>

@section('admin_js')
    @if (Session::has('slider_create_success'))
    <script>
            Toast.fire({
                icon: 'success',
                title: 'Slider Added Successfully'
            })
    </script>
    @endif
    @if ($errors->any())
    <script>
        Toast.fire({
            icon: 'error',
            title: 'Something wrong, Please try again!!'
        })
</script>
    @endif
@endsection
@endsection