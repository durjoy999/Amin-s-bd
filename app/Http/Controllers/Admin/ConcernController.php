<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConcernController extends Controller
{
    /**
     * List of all concerns
     */
    public function index()
    {
        $concerns = Concern::with(['adminCreatedBy', 'adminEditedBy'])->latest()->get();
        return view('admin.pages.concern.index', [
            'concerns' => $concerns
        ]);
    }
    /**
     * Show the form of creating new concern
     */
    public function create()
    {
        return view('admin.pages.concern.create');
    }
    /**
     * Store a new concern information
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'image'=> 'required'
        ]);
        Concern::create([
            'status' => $request->status,
            'image' => $request->image->store('/concern'),
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('concern_create_success', 'Concern Created Successfully');
    }
    /**
     * Show the from of specifice concern information
     */
    public function edit($id)
    {
        $concerns = Concern::findOrFail($id);
        return view('admin.pages.concern.edit', [
            'concerns' => $concerns
        ]);
    }
    /**
     * Update a specefic concern information
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);
        Concern::where('id', $id)->update([
            'status' => $request->status,
            'edited_by' => Auth::guard('admin')->User()->id
        ]);
        $concern = Concern::where('id', $id)->first();
        $concernEdit = $concern;
        $concernEdit->status = $request->status;
        $concernEdit->edited_by = Auth::guard('admin')->User()->id;

        if ($request->hasFile('image')) {
            Storage::delete('/concern', $concern->image);
            $concernEdit->image = $request->image->store('/concern');
        }
        $concernEdit->save();
        return back()->with('concerm_update_success', 'Concern Updated Successfully');
    }
    /**
     * Delete single concern
     */
    public function delete($id)
    {
        $concerns = Concern::findOrFail($id);
        Storage::delete($concerns->image);
        $concerns->delete();
        return back()->with('category_delete_success', 'Category Deleted Successfully');
    }
}
