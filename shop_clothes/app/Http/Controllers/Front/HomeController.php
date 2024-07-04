<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Blog\BlogServiceInterface;


class HomeController extends Controller
{
    private $blogService;
    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }
    public function index()
    {
        $blogs = $this -> blogService ->getLatestBlogs();
        return view('front.index',compact('blogs'));

    }
}
