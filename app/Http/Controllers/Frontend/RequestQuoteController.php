<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RequestQuote;
use App\Models\Service;
use Illuminate\Http\Request;

class RequestQuoteController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 'Active')->take('6')->get();
        return view('frontend.request_quote.index', [
            'services' => $services
        ]);
    }

    public function quote_store(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'product_name' => 'required',
            'quantity' => 'required',
        ]);
        // dd($request->all());
        // die();
        RequestQuote::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'product_name' => $request->product_name,
            'product_link' => $request->product_link,
            'quantity' => $request->quantity,
            'shipping_with_cost' => $request->shipping_with_cost,
            'shipping_without_cost' => $request->shipping_without_cost,
        ]);

        return back()->with('alert-info', 'Your form has been successfully submitted');
    }

}
