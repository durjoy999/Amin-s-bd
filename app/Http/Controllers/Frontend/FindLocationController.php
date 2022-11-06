<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class FindLocationController extends Controller
{
    public function index()
    {
        $services = Service::where('status', '1')->take('6')->get();
        return view('frontend.find_location.index', [
            'services' => $services
        ]);
    }
}
