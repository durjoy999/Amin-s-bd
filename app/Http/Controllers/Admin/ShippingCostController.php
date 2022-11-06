<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\ProductType;
use App\Models\ShippingCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ShippingCostController extends Controller
{
    /**
     * List of all shippings
     */
    public function index()
    {
       $shippings = ShippingCost::with(['countries', 'products',])->orderBy('id', 'desc')->get();
        return view('admin.shippingCost.index', [
            'shippings' => $shippings
        ]);
    }
    /**
     * Show the form of creating new shipping
     */
    public function create()
    {
        $countries = Country::latest()->get();
        $products = ProductType::get();
        return view('admin.shippingCost.create', [
            'countries' => $countries,
            'products' => $products,
        ]);
    }
    /**
     * Store a new shipping information
     */
    public function store(Request $request)
    {
        $request->validate([
            'ship_type' => 'required',
            'country_id' => 'required',
            'weight' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);
        ShippingCost::create([
            'ship_type' => $request->ship_type,
            'country_id' => $request->country_id,
            'weight' => $request->weight,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'status' => $request->status,
            'created_by' => Auth::user()->name,
        ]);
        return back()->with('alert-success', 'Shipping Added Successfully');
    }
    /**
     * Show the from of specifice shipping information
     */
    public function edit($id)
    {
        $shipping = ShippingCost::where('id', $id)->first();
        $countries = Country::get();
        $products = ProductType::get();
        return view('admin.shippingCost.edit', [
            'shipping' => $shipping,
            'countries' => $countries,
            'products' => $products,
        ]);
    }
    /**
     *
     * Update a specefic blog information
     *
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'ship_type' => 'required',
            'country_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);
        ShippingCost::where('id', $id)->update([
            'ship_type' => $request->ship_type,
            'country_id' => $request->country_id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'status' => $request->status,
            'edited_by' => Auth::user()->name,
        ]);

        // $ShippingCostEdit->save();
        return back()->with('Blog_update_success', 'Blog Updated Successfully');
    }
    /**
     * Delete single blog
     */
    public function delete(Request $request, $id)
    {
        $ShippingCost = ShippingCost::findOrFail($id);
        Storage::delete($ShippingCost->image);
        $ShippingCost->delete();
        return back()->with('Blog_delete_success', 'Blog Deleted Successfully');
    }
}
