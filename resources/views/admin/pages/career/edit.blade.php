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
                    <h4 class="mb-sm-0 font-size-18">Create Career</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.carrers.index') }}">All Careers</a></li>
                            <li class="breadcrumb-item active">Create Career</li>
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
                          <form method="post" action="{{ route('admin.carrers.update',$careers->id) }}" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Title<span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" value="{{$careers->title ?? old('title') }}" placeholder="Enter Title" required />
                                        @error('title')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="col-6 mb-4">
                                   <div class="form-group">
                                        <label class="form-label">Location<span class="text-danger">*</span></label>
                                        <input type="text" name="location" class="form-control" value="{{$careers->location ?? old('title') }}" placeholder="Enter Title" required />
                                        @error('location')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="col-6 mb-4">
                                        <label class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror"">
                                            <option value="">select status</option>
                                            <option  value="Active" {{ ($careers->status == 'Active' ? "selected":"") }}>Active</option>
                                            <option  value="Deactive" {{ ($careers->status == 'Deactive' ? "selected":"") }}>Deactive</option>
                                        </select>
                                  </div>
                                <div class="col-6 mb-4">
                                        <label class="form-label">Type</label>
                                        <select name="type" id="" class="form-control">
                                            <option value>Select Types</option>
                                            <option value="Full Time"{{ ($careers->type=='Full Time' ? "selected":"")}}>Full Time</option>
                                            <option value="Haft Time" {{ ($careers->type=='Haft Time' ? "selected":"")}}>Haft Time</option>
                                        </select>
                                       @error('type')
                                       <span class="text text-danger">{{$message}}</span>
                                       @enderror
                                  </div>
                                 <div class="col-12 mb-4">
                                       <label class="form-label">Description<span class="text-danger">*</span></label>
                                       <textarea name="description" id="your_summernote" class="form-control">{{ $careers->description ?? old('description')}}</textarea>
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
    @if (Session::has('career_update_success'))
    <script>
            Toast.fire({
                icon: 'success',
                title: 'Career Edit Successfully'
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
