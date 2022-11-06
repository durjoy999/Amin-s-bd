<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductTypeController extends Controller
{
    /**
     * List of all ProductTypes
     */
    public function index()
    {
        $ProductTypes = ProductType::with('adminCreatedBy', 'adminEditedBy')->latest()->get();
        return view('admin.pages.ProductType.index', [
            'ProductTypes' => $ProductTypes
        ]);
    }
    /**
     * Show the form of creating new ProductType
     */
    public function create()
    {
        return view('admin.pages.ProductType.create');
    }
    /**
     * Store a new ProductType information
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'name' => 'required'
        ]);
        ProductType::create([
            'status' => $request->status,
            'name' => $request->name,
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('slider_create_success', 'Slider Created Successfully');
    }
    /**
     * Show the from of specifice ProductType information
     */
    public function edit($id)
    {
        $ProductType = ProductType::findOrFail($id);
        return view('admin.pages.ProductType.edit', [
            'ProductType' => $ProductType
        ]);
    }
    /**
     * Update a specefic ProductType information
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'name' =>'required'
        ]);
        $ProductType = ProductType::where('id', $id)->first();
        $ProductTypeEdit = $ProductType;
        $ProductTypeEdit->status = $request->status;
        $ProductTypeEdit->name = $request->name;
        $ProductTypeEdit->edited_by = Auth::guard('admin')->User()->id;
        $ProductTypeEdit->save();
        return back()->with('ProductType_update_success', 'Slider Updated Successfully');
    }
    /**
     * Delete single ProductType
     */
    public function delete($id)
    {
        $ProductType = ProductType::findOrFail($id);
        $ProductType->delete();
        return back()->with('ProductType_delete_success', 'ProductType Deleted Successfully');
    }
}
