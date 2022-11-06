<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function service($slug)
    {
        $services = Service::where('status', 'Active')->where('slug', '!=', $slug)->get();
        $singleService = Service::where('slug', $slug)->first();
        return view('frontend.service.index', [
            'services' => $services,
            'singleService' => $singleService
        ]);
    }
}
