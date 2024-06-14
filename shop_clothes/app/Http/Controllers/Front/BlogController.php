<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
class BlogController extends Controller
{
    public function blog()
    {
        return view('Front.Blog.blog');
    }
}
