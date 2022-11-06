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
                    <h4 class="mb-sm-0 font-size-18">Edit ShippingCost</h4>

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
                             @if(Session::has('partner_update_success'))
                                 <div class="alert alert-success">
                                    {{ Session::get('partner_update_success') }}
                                 </div>
                             @endif
                          <form method="post" action="{{ route('admin.ShippingCosts.update',$shipping->id) }}" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                  <label class="form-label">Ship Type<span class="text-danger">*</span></label>
                                  <select name="ship_type" id="" class="form-control">
                                      <option value="">Select Ship</option>
                                      <option @if ($shipping->ship_type == 'air') selected @endif value="air">Air</option>
                                      <option @if ($shipping->ship_type == 'sea') selected @endif value="sea">Sea</option>
                                  </select>
                                  @error('ship_type')
                                  <span class="text text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                             </div>
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                  <label class="form-label">Country<span class="text-danger">*</span></label>
                                  <select name="country_id" id="" class="form-control">
                                      <option value="">Select Country</option>
                                      @foreach ($countries as $country)
                                      <option @if ($shipping->country_id == $country->id) selected @endif value="{{$country->id }}">{{ $country->name }}</option>
                                      @endforeach
                                  </select>
                                  @error('country_id')
                                  <span class="text text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                            </div>
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                  <label class="form-label">Weight<span class="text-danger">*</span></label>
                                  <input type="number" name="weight" class="form-control" value="{{$shipping->weight?? old('weight') }}"/>
                                  @error('weight')
                                  <span class="text text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                                  </div>
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                  <label class="form-label">Product Type<span class="text-danger">*</span></label>
                                  <select name="product_id" id="" class="form-control">
                                      <option value="">Select Product Type</option>
                                      @foreach ($products as $product)
                                      <option @if ($shipping->product_id == $product->id) selected @endif value="{{ $product->id }}">{{ $product->name }}</option>
                                      @endforeach
                                  </select>
                                  @error('product_id')
                                  <span class="text text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                             </div>
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                  <label class="form-label">Product Price<span class="text-danger">*</span></label>
                                  <input type="number" name="price" class="form-control" value="{{$shipping->price ?? old('price') }}" />
                                  @error('price')
                                  <span class="text text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                            </div>
                                  <div class="col-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror"">
                                            <option value="">select status</option>
                                            <option  value="Active" {{ ($shipping->status == 'Active' ? "selected":"") }}>Active</option>
                                            <option  value="Deactive" {{ ($shipping->status == 'Deactive' ? "selected":"") }}>Deactive</option>
                                        </select>
                                  @error('status')
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
    @if (Session::has('ProductType_update_success'))
    <script>
            Toast.fire({
                icon: 'success',
                title: 'Product type Edit Successfully'
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
