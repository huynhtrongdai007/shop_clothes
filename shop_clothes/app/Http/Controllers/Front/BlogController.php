<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog()
    {   $blogs = Blog::all();
        return view('Front.Blog.blog', compact('blogs'));
    }

}
