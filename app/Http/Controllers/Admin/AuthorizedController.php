<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Authorized;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthorizedController extends Controller
{
    public function index()
    {
        /**
         * List of all authorizeds
         */
        $authorizeds = Authorized::with(['adminCreatedBy', 'adminEditedBy'])->latest()->get();
        return view('admin.pages.authorized.index', [
            'authorizeds' => $authorizeds
        ]);
    }
    /**
     * Show the form of creating new authorized
     */
    public function create()
    {
        return view('admin.pages.authorized.create');
    }
    /**
     * Store a new authorized information
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'image' => 'required'
        ]);
        Authorized::create([
            'status' => $request->status,
            'image' => $request->image->store('authorized'),
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('authorized_create_success', 'Authorized Created Successfully');
    }
    /**
     * Show the from of specifice authorized information
     */
    public function edit($id)
    {
        $authorized = Authorized::findOrFail($id);
        return view('admin.pages.authorized.edit', [
            'authorized' => $authorized
        ]);
    }
    /**
     *
     * Update a specefic authorized information
     *
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);
        $slider = Authorized::where('id', $id)->first();
        $sliderEdit = $slider;
        $sliderEdit->status = $request->status;
        $sliderEdit->edited_by = Auth::guard('admin')->User()->id;

        if ($request->hasFile('image')) {
            Storage::delete('/authorized', $slider->image);
            $sliderEdit->image = $request->image->store('/authorized');
        }
        $sliderEdit->save();
        return back()->with('category_update_success', 'Category Updated Successfully');
    }
    /**
     *
     * Delete single authorized
     *
     */
    public function delete($id)
    {
        $Authorized = Authorized::findOrFail($id);
        Storage::delete($Authorized->image);
        $Authorized->delete();
        return back()->with('category_delete_success', 'Category Deleted Successfully');
    }
}
