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
                    <h4 class="mb-sm-0 font-size-18">Edit Country</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.countrys.index') }}">All Countrys</a></li>
                            <li class="breadcrumb-item active">Create Country</li>
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
                          <form method="post" action="{{ route('admin.countrys.update',$country->id) }}" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Status<span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="">select status</option>
                                            <option  value="Active" {{ ($country->status == 'Active' ? "selected":"") }}>Active</option>
                                            <option  value="Deactive" {{ ($country->status == 'Deactive' ? "selected":"") }}>Deactive</option>
                                        </select>
                                        @error('status')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{$country->name ?? old('name') }}" placeholder="Enter Name" />
                                        @error('name')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Email<span class="text-danger">*</span></label>
                                        <input type="text" name="email" class="form-control" value="{{$country->email ?? old('email') }}" placeholder="Enter Email"  />
                                        @error('email')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Phone<span class="text-danger">*</span></label>
                                        <input type="text" name="phone" class="form-control" value="{{$country->phone ?? old('phone') }}" placeholder="Enter Phone" />
                                        @error('phone')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Address<span class="text-danger">*</span></label>
                                        <input type="text" name="address" class="form-control" value="{{$country->address ?? old('address') }}" placeholder="Enter Address" />
                                        @error('address')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                 <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Message<span class="text-danger">*</span></label>
                                        <input type="text" name="message" class="form-control" value="{{$country->message ?? old('message') }}" placeholder="Enter Message" />
                                        @error('message')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
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
    @if (Session::has('Country_update_success'))
    <script>
            Toast.fire({
                icon: 'success',
                title: 'Country Edit Successfully'
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
