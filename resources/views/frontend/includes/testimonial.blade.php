<div class="container-xxl py-5 ">
  <div class="d-flex justify-content-center p-4">
    <div class="section-title position-relative pb-3 mb-5">
      <p class="text-primary text-uppercase font-weight-bold text-center responsive-test-title1 p-tittle-testimon fs-6">Testimonial</p>
      <p class=" fs-3 responsive-test-title2 m-p-ourClient">Our Clients Say</p>
    </div>
  </div>
  <div class="container py-3">
    <div class="row g-5">
      <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="border-start border-5 border-primary1 ps-4 mb-5">
          <h6 class="text-body text-uppercase mb-2">Testimonial</h6>
          <h1 class="display-6 mb-0">What Our Happy Clients Say!</h1>
        </div>
        <p class="mb-4">
          Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat
          ipsum et lorem et sit, sed stet lorem sit clita duo justo magna
          dolore erat amet
        </p>
        <div class="row g-4">
          <div class="col-sm-6">
            <div class="d-flex align-items-center mb-2">
              <i class="fa fa-users fa-2x text-primary flex-shrink-0 test-icon-size"></i>
              <h1 class="ms-3 mb-0">123+</h1>
            </div>
            <h5 class="mb-0">Our Happy Clients</h5>
          </div>
          <div class="col-sm-6">
            <div class="d-flex align-items-center mb-2">
              <i class="fa fa-check fa-2x text-primary flex-shrink-0 test-icon-size"></i>
              <h1 class="ms-3 mb-0">200+</h1>
            </div>
            <h5 class="mb-0">We Are Working With</h5>
          </div>
        </div>
      </div>
      @if($testimonials->count()> 0)

      <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
        <div class="owl-carousel testimonial-carousel">
          @foreach ($testimonials as $testimonial)
          <div class="testimonial-item">
            <img class="img-fluid rounded-circle " src="{{asset('photo')}}/{{$testimonial->image}}" alt="testimontinal">
            <div class="ml-3" style="padding-left: 8px;">
              @for ($i = 0; $i < $testimonial->reting; $i++)
                <span class="fa fa-star checked"></span>
                @endfor
                <p class="fw-bold m-0 fs-5 py-3">{{ $testimonial->name }}</p>
                <small>- {{ $testimonial->designation }}</small>
            </div>
            <p class="m-0">{!! $testimonial->description !!}</p>
            <div class=" mb-3" style="width: 60px; height: 5px"></div>
            {{-- <h5>Client Name</h5> --}}
            {{-- <span>Profession</span> --}}
          </div>
          @endforeach
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
