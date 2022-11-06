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
                    <h4 class="mb-sm-0 font-size-18">Create Service</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">All Services</a></li>
                            <li class="breadcrumb-item active">Create Service</li>
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
                          <form method="post" action="{{ route('admin.services.update',$Service->id) }}" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                 <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Title<span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" value="{{$Service->title ?? old('title') }}" placeholder="Enter Title" />
                                        @error('title')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                 </div>
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Status<span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="">select status</option>
                                            <option  value="Active" {{ ($Service->status == 'Active' ? "selected":"") }}>Active</option>
                                            <option  value="Deactive" {{ ($Service->status == 'Deactive' ? "selected":"") }}>Deactive</option>
                                        </select>
                                        @error('status')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="col-6 mb-4">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" />
                                  </div>
                                       @error('image')
                                       <span class="text text-danger">{{$message}}</span>
                                       @enderror
                                  <div class="col-12 mb-4">
                                       <label class="form-label">Description<span class="text-danger">*</span></label>
                                       <textarea name="description" id="your_summernote" class="form-control">{{ $Service->description ?? old('description')}}</textarea>
                                       @error('description')
                                       <span class="text text-danger">{{$message}}</span>
                                       @enderror
                                  </div>
                              </div>
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
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
    @if (Session::has('Service_update_success'))
    <script>
            Toast.fire({
                icon: 'success',
                title: 'Service Edit Successfully'
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
