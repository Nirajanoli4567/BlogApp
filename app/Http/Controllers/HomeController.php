<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;


class HomeController extends Controller
{
    public function index()
    {
        $totalBlogs = Blog::count();
        $approvedBlogs = Blog::where('status', 'approved')->count();
        $pendingBlogs = Blog::where('status', 'pending')->count();
    
    
        return view('admin.dashboard', [
            'totalBlogs' => $totalBlogs,
            'approvedBlogs' => $approvedBlogs,
            'pendingBlogs' => $pendingBlogs
        ]);
    }
    public function blog()
    {
        $blogs = Blog::all();


        return view('admin.blogs', [
            'blogs' => $blogs,
     
        ]);
    }

}
