{{-- <section id="our-partner" class="smt-100 "> --}}
    <div class="container">
        <div class="row align-items-center">
            <div class=" col-lg-12 col-md-12 col-sm-12">
                <div class="d-flex justify-content-center p-3">
                    <div class="section-title2 position-relative pb-3 mb-5">
                        <p class="title-line4 weAreWorking fs-3">We Are Working With</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 wow slideInLeft" data-wow-duration="2s" data-wow-delay="0s">
                <div class="partners">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row justify-content-center">
                                @forelse ($concerns as $concern )
                                @if( $loop->iteration == 1)
                                <div class="col-1"></div>
                                @endif
                                <div class="col-4 col-lg-2 col-md-3 col-sm-4 mt-3">
                                    <div class="partner-box shadow">
                                        <img src="{{ asset('photo') }}/{{ $concern->image }}" alt="partner">
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
