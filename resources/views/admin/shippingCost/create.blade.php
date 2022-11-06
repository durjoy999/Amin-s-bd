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
                    <h4 class="mb-sm-0 font-size-18">Create ShippingCost</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.ShippingCosts.index') }}">All ShippingCosts</a></li>
                            <li class="breadcrumb-item active">Create ShippingCost</li>
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
                             @if(Session::has('service_create_success'))
                                 <div class="alert alert-success">
                                    {{ Session::get('service_create_success') }}
                                 </div>
                             @endif
                          <form action="{{ route('admin.ShippingCosts.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">

                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                     <label class="form-label">Ship Type <span class="text-danger">*</span> </label>
                                     <select name="ship_type" id="" class="form-control">
                                         <option value="">Select Ship</option>
                                         <option value="air">Air</option>
                                         <option value="sea">Sea</option>
                                     </select>
                                     @error('ship_type')
                                     <span class="text text-danger">{{$message}}</span>
                                     @enderror
                                   </div>
                                  </div>
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                    <label class="form-label">Country <span class="text-danger">*</span> </label>
                                    <select name="country_id" id="" class="form-control">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <span class="text text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                  </div>
                                  <div class="col-6 mb-4">
                                      <label class="form-label">Weight <span class="text-danger">*</span> </label>
                                      <select name="weight" id="" class="form-control">
                                          <option value="">Select weight Type</option>
                                          <option value="1 to 10">1 to 10</option>
                                          <option value="11 to unlimited">10+</option>
                                      </select>
                                      @error('weight')
                                      <span class="text text-danger">{{$message}}</span>
                                      @enderror
                                  </div>
                                 <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Product Type <span class="text-danger">*</span> </label>
                                        <select name="product_id" id="" class="form-control">
                                            <option value="">Select Product Type</option>
                                            @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_id')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                 <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Product Price <span class="text-danger">*</span> </label>
                                        <input type="number" name="price" class="form-control" value="{{ old('price') }}" />
                                        @error('price')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="form-group">
                                       <label class="form-label">Status <span class="text-danger">*</span> </label>
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
    @if (Session::has('alert-success'))
    <script>
            Toast.fire({
                icon: 'success',
                title: 'Shipping Cost Added Successfully'
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
