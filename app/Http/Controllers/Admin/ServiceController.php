<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * List of all Services
     */
    public function index()
    {
        $Services = Service::with(['adminCreatedBy', 'adminEditedBy'])->latest()->get();
        return view('admin.pages.service.index', [
            'Services' => $Services
        ]);
    }
    /**
     * Show the form of creating new Service
     */
    public function create()
    {
        return view('admin.pages.service.create');
    }
    /**
     * Store a new Service information
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'title' => 'required',
            'description'=>'required',
            'image' => 'required'
        ]);
        Service::create([
            'status' => $request->status,
            'title' => $request->title,
            'description'=>$request->description,
            'image' => $request->image->store('/service'),
            'slug' => Str::slug($request->title) . random_int(10, 99),
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('service_create_success', 'Service Created Successfully');
    }
    /**
     * Show the from of specifice Service information
     */
    public function edit($id)
    {
        $Service = Service::findOrFail($id);
        return view('admin.pages.service.edit', [
            'Service' => $Service
        ]);
    }
    /**
     * Update a specefic Service information
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        $service = Service::where('id', $id)->first();

        $serviceEdit = $service;
        $serviceEdit->title = $request->title;
        $serviceEdit->status = $request->status;
        $serviceEdit->description = $request->description;
        $serviceEdit->slug = Str::slug($request->title) . random_int(10, 99);
        $serviceEdit->edited_by = Auth::guard('admin')->User()->id;

        if ($request->hasFile('image')) {
            Storage::delete('/service', $service->image);
            $serviceEdit->image = $request->image->store('/service');
        }
        $serviceEdit->save();
        return back()->with('Service_update_success', 'Service Updated Successfully');
    }
    /**
     * Delete single Service
     */
    public function delete($id)
    {
        $service = Service::findOrFail($id);
        Storage::delete($service->image);
        $service->delete();
        return back()->with('category_delete_success', 'Category Deleted Successfully');
    }
    /**
     * show single service details
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.pages.service.show', [
            'service' => $service
        ]);
    }
}
