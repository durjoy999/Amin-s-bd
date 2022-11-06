<div class="container-fluid">
    <div class="container">
        <div class="d-flex justify-content-center px-5">
            <div class="section-title position-relative pb-3 mb-5">
                <h2 class="text-primary text-uppercase font-weight-bold text-center fs-6 blog-title">Our News</h2>
                <p class="title-line-5 fs-3 blog-title1">Latest From News</p>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-4 mb-5">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="{{ asset('photo') }}/{{ $blog->image }}" alt="blog image">
                    <div class="position-absolute bg-primary d-flex flex-column align-items-center justify-content-center rounded-circle blog-div">
                        <p class=" fs-5 font-weight-bold mb-0 text-white">{{ date('d', strtotime($blog->created_at)) }}</p>
                        <small class="text-white text-uppercase">{{ date('M', strtotime($blog->created_at)) }}</small>
                    </div>
                </div>
                <div class="background-clo " style="padding: 30px; padding-bottom: 70px;">
                    <div class="d-flex mb-3">
                    </div>
                    <h3 class="font-weight-bold mb-3 fs-4">{{ $blog->title }}</h3>
                    <a href="{{ route('frontend.single.news',$blog->id) }}">
                      <button class="button" style="vertical-align:middle;float: right;"><span>Read More</span></button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
