<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Concern;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        //juwel
        $testimonials = Testimonial::where('status', 'Active')->orderBy('id', 'desc')->get();
        $concerns = Concern::where('status', 'Active')->get();
        $partners = Partner::where('status', 'Active')->get();
        return view('frontend.about.index', [
            'testimonials' => $testimonials,
            'concerns' => $concerns,
            'partners' => $partners
        ]);
    }
}
