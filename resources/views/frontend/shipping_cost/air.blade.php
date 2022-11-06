@extends('layouts.frontend.frontend_app')
@section('frontend_title')
Air Search Result
@endsection
@section('frontend_content')
<div class="container pt-5">
  <div class="position-relative">
    <div class="d-flex justify-content-center">
      <div class="card text-dark bg-light mb-3 widget" style="width: 48rem;">
        <div class="d-flex justify-content-center px-5 pb-5">
          <div class="section-title position-relative pb-3">
            <br>
            <h3 style="margin-bottom: 0px;font-size: 17px;text-transform: uppercase; font-weight: bold;
                      padding-left: 6px; color: black;">Approximate Shipping Cost</h3>
          </div>
        </div>
        <div class="card-body" style="border-bottom:2px solid red; padding-left: 132px;padding-bottom: 50px;">
          <div class="box-approximate">
            <table class="table table-striped table-hover text-center mb-0">
              <tbody>
                <tr>
                  <td class="fw-bold">Ship By</td>
                  <td>{{ $price->ship_type }}</td>
                </tr>
                <tr>
                  <td class="fw-bold">Ship From</td>
                  <td>{{ $price->countries->name }}</td>
                </tr>
                <tr>
                  <td class="fw-bold">Ship To</td>
                  <td>Dhaka, Bangladesh</td>
                </tr>
                <tr>
                  <td class="fw-bold">Product Type</td>
                  <td>{{ $price->products->name }}</td>
                </tr>
                <tr>
                  <td class="fw-bold">Per Kg</td>
                  <td>{{ $price->price }} TK/KG</td>
                </tr>
                <tr>
                  <td class="fw-bold">Total Weight</td>
                  <td>{{ $weight }} KG</td>
                </tr>
                <tr>
                  <td colspan="2" class="fw-bold">(IF 1 CBM= 167KG)</td>
                </tr>
              </tbody>
            </table>
          </div>
          <p class="text-center pt-4 text-danger" style="padding-right: 118px;">** ১০ কেজির নিচের সকল পার্সেল এর দাম সাধারণ দামের চেয়ে<br> তুলনামূলক ভাবে বেশি থাকবে ।</p>
          <p class="read-carefully">Read Carefully</p>
        </div>
        <p class="text-center pt-4" style="line-height: 28px;">উপরের রেটটি সম্ভাব্য রেট। পণ্য পাঠানোর আগে আমাদের সাথে যোগাযোগ করে রেট নিয়ে পণ্য পাঠাবেন।</p>
      </div>
    </div>
  </div>
</div>
@endsection
