<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Authorized;
use App\Models\Blog;
use App\Models\Concern;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $sliders = Slider::where('status','Active')->get();
        $services = Service::where('status', 'Active')->get();
        $concerns = Concern::where('status', 'Active')->get();
        $testimonials = Testimonial::where('status', 'Active')->get();
        $blogs = Blog::orderBy('id', 'desc')->take(3)->get();
        $authorizeds = Authorized::where('status', 'Active')->get();
        $partners = Partner::where('status', 'Active')->get();
        return View('frontend.home.index',[
            'sliders' => $sliders,
            'services' => $services,
            'concerns' => $concerns,
            'testimonials' => $testimonials,
            'blogs' => $blogs,
            'authorizeds' => $authorizeds,
            'partners' => $partners
        ]);
    }
}
