<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\RequestQuote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $superAdmin = Admin::count();
        // $admin = User::where('role', '2')->count();
        // $moderator = User::where('role', '3')->count();
        $blog = Blog::count();
        $requestQuote = RequestQuote::count();
        $partner = Partner::count();
        return view('admin.pages.home.index',[
            'blog' => $blog,
            'requestQuote' => $requestQuote,
            'partner' => $partner,
            'superAdmin' => $superAdmin
        ]);
    }
}
