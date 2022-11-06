<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CarerrController extends Controller
{
    /**
     * List of all Careers
     */
    public function index()
    {
        $careers = Career::with(['adminCreatedBy', 'adminEditedBy'])->latest()->get();
        return view('admin.pages.career.index', [
            'careers' => $careers
        ]);
    }
    /**
     * show single Career details
     *
     */
    public function show($id)
    {
        $career = Career::findOrFail($id);
        return view('admin.pages.career.show', [
            'career' => $career
        ]);
    }
    /**
     * Show the form of creating new Career
     */
    public function create()
    {
        return view('admin.pages.career.create');
    }
    /**
     * Store a new Career information
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
            'location' => 'required',
            'type'=>'required'
        ]);
        Career::create([
            'title' => $request->title,
            'status' => $request->status,
            'location' => $request->location,
            'slug' => Str::slug($request->title) . random_int(10, 99),
            'description' => $request->description,
            'type'=>$request->type,
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('career_create_success', 'Career Created Successfully');
    }
    /**
     * Show the from of specifice Career information
     */
    public function edit($id)
    {
        $careers = Career::findOrFail($id);
        return view('admin.pages.career.edit', [
            'careers' => $careers
        ]);
    }
    /**
     * Update a specefic Career information
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
            'location' => 'required',
            'type' => 'required'
        ]);
        $careers = Career::where('id', $id)->first();
        $careersEdit = $careers;
        $careersEdit->title = $request->title;
        $careersEdit->description = $request->description;
        $careersEdit->title = $request->location;
        $careersEdit->slug = Str::slug($request->title) . random_int(10, 99);
        $careersEdit->title = $request->title;
        $careersEdit->status = $request->type;
        $careersEdit->edited_by = Auth::guard('admin')->User()->id;

        $careersEdit->save();
        return back()->with('career_update_success', 'Career Edit Successfully');
    }
    /**
     * Delete single Career
     */
    public function delete($id)
    {
        $careers = Career::findOrFail($id);
        $careers->delete();
        return back()->with('Career_delete_success', 'Category Deleted Successfully');
    }
}
