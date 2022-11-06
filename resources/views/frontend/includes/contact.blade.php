<div class="container-fluid py-5 wow fadeInUp background-img4" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h1 class="mb-0" style="padding-left: 28px;"> Contact Us</h1>
                </div>
                <div class="row gx-3">
                    <div class="col-sm-6 wow zoomIn tab-content " data-wow-delay="0.2s">
                        <p class="mb-4 fs-5"><i class="fa fa-reply me-3"></i>Reply within 24 hours</p>
                    </div>
                    <div class="col-sm-6 wow zoomIn tab-content " data-wow-delay="0.4s">
                        <p class="mb-4 fs-5"><i class="fa fa-phone-alt me-3 "></i>24 hrs telephone support</p>
                    </div>
                </div>
                <p class="py-3">Are you a customer who needs help. Amin’s is welcoming you to contact us 24/7 through Calls or SMS.</p>
                <p class="mb-4 py-3">If you wondering about an order, our service, products, or website, throw an email or call to us. For any size business, small or large, you can confidently rely on Amin's to import goods from China. To let you know more about our service, we are open for your calls and mails.</p>
                <div class="row row-sm-12">
                    <div class=" col-xl-6 col-sm-12">
                        <div class="p-2">
                            <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                                <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 42px; height: 41px;">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="ps-4">
                                    <p class="mb-2 fs-5">Call to ask any question</p>
                                    <p><a class="text-decoration-none text-primary mb-0 fs-6" href="tel:+8801766766771">+8801766766771</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-xl-6 col-sm-12">
                        <div class="ml-auto p-2 res-mt-con">
                            <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                                <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 42px; height: 41px;">
                                    <i class="fa fa-envelope  text-white"></i>
                                </div>
                                <div class="ps-4">
                                    <p class="mb-2 fs-5">E-Mail</p>
                                    <p><a class="text-primary text-decoration-none mb-0 fs-6" href="mailto:aminsbdofficial@gmail.com">aminsbdofficial@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('message_submit_successfully'))
                        <div class="alert alert-success">
                            {{ Session::get('message_submit_successfully') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s" style="background-color: rgb(248, 242, 240) !important;">
                    <form action="{{ route('frontend.contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-xl-12">
                                <input type="text" class="form-control bg-light border-0" name="name" placeholder="Your Name*" style="height: 55px;" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control bg-light border-0" name="email" placeholder="Your Email*" style="height: 55px;" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <input type="number" class="form-control bg-light border-0" name="phone" placeholder="Your Phone*" style="height: 55px;" required>
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control bg-light border-0" name="address" placeholder="Address*" style="height: 55px;" required>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-light border-0" rows="3" name="message" placeholder="Message*" required></textarea>
                                @error('message')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
