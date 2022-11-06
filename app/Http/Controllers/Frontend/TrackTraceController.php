<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class TrackTraceController extends Controller
{
    public function index()
    {
        $services = Service::where('status', '1')->take('6')->get();
        return view('frontend.track_trace.index', [
            'services' => $services,
        ]);
    }
    public function track_trace(Request $request){
        dd($request->all());
    }

}
