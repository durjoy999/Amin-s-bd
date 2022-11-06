<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * List of all partners
     */
    public function index()
    {
        $partners = Partner::with(['adminCreatedBy', 'adminEditedBy'])->latest()->get();
        return view('admin.pages.partner.index', [
            'partners' => $partners
        ]);
    }
    /**
     * Show the form of creating new partner
     */
    public function create()
    {
        return view('admin.pages.partner.create');
    }
    /**
     * Store a new partner information
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'image' => 'required'
        ]);
        Partner::create([
            'status' => $request->status,
            'image' => $request->image->store('/partner'),
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('partner_create_success', 'Partner Created Successfully');
    }
    /**
     * Show the from of specifice partner information
     */
    public function edit($id)
    {
        $partners = Partner::findOrFail($id);
        return view('admin.pages.partner.edit', [
            'partners' => $partners
        ]);
    }
    /**
     * Update a specefic partner information
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);
        $partner = Partner::where('id', $id)->first();
        $partnerEdit = $partner;
        $partnerEdit->status = $request->status;
        $partnerEdit->edited_by = Auth::guard('admin')->User()->id;

        if ($request->hasFile('image')) {
            Storage::delete('/partner', $partner->image);
            $partnerEdit->image = $request->image->store('/partner');
        }
        $partnerEdit->save();
        return back()->with('partner_update_success', 'Partner Updated Successfully');
    }
    /**
     * Delete single partner
     */
    public function delete($id)
    {
        $partners = Partner::findOrFail($id);
        $partners->delete();
        return back()->with('partner_delete_success', 'Category Deleted Successfully');
    }

}
