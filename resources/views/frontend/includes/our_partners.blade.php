{{-- <section id="our-partner" class="smt-100"> --}}
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="d-flex justify-content-center px-5">
                    <div class="section-title position-relative pb-3 mb-5">
                        <p class="tittle-line6 fs-3" style="margin-bottom: 0px;padding-left: 22px;">OUR PARTNERS</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 wow slideInLeft" data-wow-duration="2s" data-wow-delay="0s">
                <div class="partners">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row justify-content-center">
                                @forelse ($partners as $partner)
                                @if( $loop->iteration == 1)
                                <div class="col-1"></div>
                                @endif
                                <div class="col-4 col-lg-2 col-md-3 col-sm-4 mt-3">
                                    <div class="partner-box shadow">
                                        <img src="{{ asset('photo') }}/{{ $partner->image }}" alt="image">
                                    </div>
                                </div>
                                @if(($loop->iteration % 5) == 0 && ($loop->iteration != 1))
                                <div class="col-1"></div>
                                <div class="col-1"></div>
                                @endif
                                @empty
                                No Items Found
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
</section> --}}
