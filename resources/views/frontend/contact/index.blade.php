@extends('layouts.frontend.frontend_app')
@section('frontend_title')
Contact
@endsection
@section('contact_active')
active
@endsection
@section('frontend_content')
<!-- Header Start -->
<section id="breadcrumb">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="title">contact</h1>
      </div>
    </div>
  </div>
</section>
<!-- Header End -->
<!-- contact Start -->
@include('frontend.includes.contact')
<!-- contact End -->
@endsection
