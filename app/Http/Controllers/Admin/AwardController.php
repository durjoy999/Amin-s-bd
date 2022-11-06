<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AwardController extends Controller
{
    /**
     * List of all awards
     */
    public function index()
    {
        $awards = Award::with(['adminCreatedBy', 'adminEditedBy'])->latest()->get();
        return view('admin.pages.award.index', [
            'awards' => $awards
        ]);
    }
    /**
     * Show the form of creating new award
     */
    public function create()
    {
        return view('admin.pages.award.create');
    }
    /**
     * Store a new award information
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        Award::create([
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $request->image->store('/award'),
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('partner_create_success', 'Partner Created Successfully');
    }
    /**
     * Show the from of specifice award information
     */
    public function edit($id)
    {
        $awards = Award::findOrFail($id);
        return view('admin.pages.award.edit', [
            'awards' => $awards
        ]);
    }
    /**
     * Update a specefic award information
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' =>'required'
        ]);
        $awards = Award::where('id', $id)->first();
        $awardEdit = $awards;
        $awardEdit->title = $request->title;
        $awardEdit->description = $request->description;
        $awardEdit->status = $request->status;
        $awardEdit->edited_by = Auth::guard('admin')->User()->id;

        if ($request->hasFile('image')) {
            Storage::delete('/award', $awards->image);
            $awardEdit->image = $request->image->store('/award');
        }
        $awardEdit->save();
        return back()->with('award_edit_success', 'Award Updated Successfully');
    }
    public function delete($id)
    {
        $awards = Award::findOrFail($id);
        Storage::delete($awards->image);
        $awards->delete();
        return back()->with('award_delete_success', 'Category Deleted Successfully');
    }
}
