<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    /**
     * List of all countrys
     */
    public function index()
    {
        $countrys = Country::with('adminCreatedBy', 'adminEditedBy')->latest()->get();
        return view('admin.pages.country.index', [
            'countrys' => $countrys
        ]);
    }
    /**
     * Show the form of creating new country
     */
    public function create()
    {
        return view('admin.pages.country.create');
    }
    /**
     * Store a new country information
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'name' => 'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'message'=>'required'
        ]);
        Country::create([
            'status' => $request->status,
            'name' =>$request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message'=> $request->message,
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('Country_create_success', 'Country Created Successfully');
    }
    /**
     * Show the from of specifice country information
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.pages.country.edit', [
            'country' => $country
        ]);
    }
    /**
     * Update a specefic country information
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'message' => 'required'
        ]);
        $slider = Country::where('id', $id)->first();
        $sliderEdit = $slider;
        $sliderEdit->status = $request->status;
        $sliderEdit->name = $request->name;
        $sliderEdit->email = $request->email;
        $sliderEdit->phone = $request->phone;
        $sliderEdit->address = $request->address;
        $sliderEdit->message = $request->message;
        $sliderEdit->edited_by = Auth::guard('admin')->User()->id;
        $sliderEdit->save();
        return back()->with('Country_update_success', 'Country Updated Successfully');
    }
    /**
     * Delete single country
     */
    public function delete($id)
    {
        $Country = Country::findOrFail($id);
        $Country->delete();
        return back()->with('slider_delete_success', 'Slider Deleted Successfully');
    }
}
