<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * List of all blogs
     */
    public function index(){
        $blogs = Blog::with(['adminCreatedBy', 'adminEditedBy'])->latest()->get();
        return view('admin.pages.blog.index',[
            'blogs'=>$blogs
        ]);
    }
    /**
     * show single blog details
     */
    public function show($id)
    {
        $blog = Blog::with(['adminCreatedBy', 'adminEditedBy'])->findOrFail($id);
        return view('admin.pages.blog.show', [
            'blog' => $blog
        ]);
    }
    /**
     * Show the form of creating new blog
     */
    public function create(){
        return view('admin.pages.blog.create');
    }
    /**
     * Store a new blog information
     */
    public function store(Request $request){
        $request->validate([
            'title' => 'required|unique:blogs,title',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required'
        ]);
        Blog::create([
            'title' => $request->title,
            'Status'=> $request->Status,
            'slug' => Str::slug($request->title) . random_int(10, 99),
            'description' => $request->description,
            'image' => $request->image->store('/blog'),
            'created_by' => Auth::guard('admin')->User()->id,
        ]);
        return back()->with('Blog_create_success', 'Blog Created Successfully');
    }
    /**
     * Show the from of specifice blog information
     */
    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('admin.pages.blog.edit', [
            'blog' => $blog
        ]);
    }
    /**
     *
     * Update a specefic blog information
     *
     */
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status'=>'required',
        ]);
        $blogEdit = Blog::where('id',$id)->firstOrFail();
        $blogEdit->status = $request->status;
        $blogEdit->title = $request->title;
        $blogEdit->slug = Str::slug($request->title) . random_int(10, 99);
        $blogEdit->description = $request->description;
        $blogEdit->edited_by = Auth::guard('admin')->User()->id;

        if($request->hasFile('image')){
            Storage::delete($blogEdit->image);
            $blogEdit->image = $request->image->store('/blog');
        }
        $blogEdit->save();
        return back()->with('Blog_update_success', 'Blog Updated Successfully');
    }
    /**
     *
     * Delete single blog
     *
     */
    public function delete(Request $request,$id)
    {
        $blog = Blog::findOrFail($id);
        Storage::delete($blog->image);
        $blog->delete();
        return back()->with('Blog_delete_success', 'Blog Deleted Successfully');
    }
}
