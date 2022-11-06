<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate('6');
        return view('frontend.blogs.index', [
            'blogs' => $blogs
        ]);
    }
    public function singleNews($id)
    {
        $blog = Blog::where('id', $id)->first();
        $blogs = Blog::orderBy('id', 'desc')->where('id', '!=', $id)->get();
        return view('frontend.blogs.single_news', [
            'blog' => $blog,
            'blogs' => $blogs,
        ]);
    }
}
