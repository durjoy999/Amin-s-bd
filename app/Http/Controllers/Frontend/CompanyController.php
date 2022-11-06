<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Service;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    function award()
    {
        $awards = Award::where('status', 'Active')->get();
        $services = Service::where('status', 'Active')->get();
        return view('frontend.company.award', [
            'awards' => $awards,
            'services' => $services
        ]);
    }
    function carrer()
    {
        $carrers = Career::where('status', 'Active')->get();
        return view('frontend.company.carrer', [
            'carrers' => $carrers
        ]);
    }
    function singleCarrer($slug)
    {
        $carrers = Career::orderBy('id', 'desc')->where('slug', '!=', $slug)->get();
        $singleCarrer = Career::where('slug', $slug)->first();
        $blogs = Blog::orderBy('id', 'desc')->take(3)->get();
        return view('frontend.company.single_carrer', [
            'singleCarrer' => $singleCarrer,
            'blogs' => $blogs,
            'carrers' => $carrers
        ]);
    }
}
