<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * List of all testimonials
     */
    public function index()
    {
        $testimonials = Testimonial::with(['adminCreatedBy', 'adminEditedBy'])->latest()->get();
        return view('admin.pages.testimonial.index', [
            'testimonials' => $testimonials
        ]);
    }
    /**
     * show single testimonial details
     */
    public function show($id)
    {
        $Testimonial = Testimonial::with(['adminCreatedBy', 'adminEditedBy'])->findOrFail($id);
        return view('admin.pages.testimonial.show', [
            'Testimonial' => $Testimonial
        ]);
    }
    /**
     * Show the form of creating new testimonial
     */
    public function create()
    {
        return view('admin.pages.testimonial.create');
    }
    /**
     * Store a new testimonial information
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:testimonials,name',
            'description' => 'required',
            'designation'=>'required',
            'reting'=>'required',
            'status'=>'required',
            'image'=> 'required'
        ]);
        Testimonial::create([
            'name' => $request->name,
            'description' => $request->description,
            'designation' => $request->designation,
            'reting' => $request->reting,
            'status' => $request->status,
            'image' => $request->image->store('/testimonial'),
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('testimonial_create_success', 'Testimonial Created Successfully');
    }
    /**
     * Show the from of specifice testimonial information
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.pages.testimonial.edit', [
            'testimonial' => $testimonial
        ]);
    }
    /**
     * Update a specefic testimonial information
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'designation' => 'required',
            'reting' => 'required',
            'status' => 'required'
        ]);
        $testimonial = Testimonial::where('id', $id)->firstOrFail();
        $testimonialsEdit = $testimonial;
        $testimonialsEdit->name = $request->name;
        $testimonialsEdit->description = $request->description;
        $testimonialsEdit->designation = $request->designation;
        $testimonialsEdit->reting = $request->reting;
        $testimonialsEdit->status = $request->status;
        $testimonialsEdit->edited_by = Auth::guard('admin')->User()->id;

        if ($request->hasFile('image')) {
            Storage::delete('/testimonial', $testimonial->image);
            $testimonialsEdit->image = $request->image->store('/testimonial');
        }
        $testimonialsEdit->save();
        return back()->with('testimonial_update_success', 'Testimonial Updated Successfully');
    }
    /**
     * Delete single testimonial
     */
    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return back()->with('testimonial_delete_success', 'Testimonial Deleted Successfully');
    }
}
