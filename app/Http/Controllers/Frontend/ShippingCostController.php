<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\ProductType;
use App\Models\Service;
use App\Models\ShippingCost;
use Illuminate\Http\Request;

class ShippingCostController extends Controller
{
    public function index()
    {
        $countries = Country::where('status', 'Active')->orderBy('name', 'asc')->get();
        $products = ProductType::where('status', 'Active')->orderBy('name', 'asc')->get();
        $services = Service::where('status', 'Active')->get();
        return view('frontend.shipping_cost.index', [
            'countries' => $countries,
            'products' => $products,
            'services' => $services
        ]);
    }
    public function airShipping(Request $request)
    {
        // dd($request->all());
        // die();
        $request->validate([
            'product' => 'required',
            'country' => 'required',
            'weight' => 'required|numeric|min:1',
        ]);

        $weight_range = 'demo data';
        if ($request->weight >= 1 && $request->weight <= 10) {
            $weight_range = '1 to 10';
        } elseif ($request->weight > 10) {
            $weight_range = '11 to unlimited';
        }

        $price = ShippingCost::with(['products', 'countries'])->where('country_id', $request->country)
            ->where('product_id', $request->product)
            ->where('weight', $weight_range)
            ->where('ship_type', $request->air)
            ->first();

        if ($price == null) {
            return back()->with('alert-danger', 'price not found');
        }
        return view('frontend.shipping_cost.air', [
            'price' => $price,
            'weight' => $request->weight
        ]);
    }
}
