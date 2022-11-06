<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * List of all sliders
     */
    public function index()
    {
        $sliders = Slider::with('adminCreatedBy', 'adminEditedBby')->latest()->get();
        return view('admin.pages.slider.index', [
            'sliders' => $sliders
        ]);
    }
    /**
     * Show the form of creating new slider
     */
    public function create()
    {
        return view('admin.pages.slider.create');
    }
    /**
     * Store a new slider information
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'image' => 'required'
        ]);
        Slider::create([
            'status' => $request->status,
            'image' => $request->image->store('/slider'),
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('slider_create_success', 'Slider Created Successfully');
    }
    /**
     * Show the from of specifice slider information
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.pages.slider.edit', [
            'slider' => $slider
        ]);
    }
    /**
     * Update a specefic slider information
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);
        $slider = Slider::where('id', $id)->first();
        $sliderEdit = $slider;
        $sliderEdit->status = $request->status;
        $sliderEdit->edited_by = Auth::guard('admin')->User()->id;

        if ($request->hasFile('image')) {
            Storage::delete('/slider', $slider->image);
            $sliderEdit->image = $request->image->store('/slider');
        }
        $sliderEdit->save();
        return back()->with('slider_update_success', 'Slider Updated Successfully');
    }
    /**
     * Delete single slider
     */
    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        Storage::delete($slider->image);
        $slider->delete();
        return back()->with('slider_delete_success', 'Slider Deleted Successfully');
    }
}
