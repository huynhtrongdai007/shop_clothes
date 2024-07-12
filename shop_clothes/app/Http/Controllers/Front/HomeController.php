<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Blog\BlogServiceInterface;
use App\Service\Product\ProductServiceInterface;


class HomeController extends Controller
{
    private $blogService;
    private $productService;

    public function __construct(    BlogServiceInterface $blogService,
                                    ProductServiceInterface $productService)
    {
        $this->blogService = $blogService;
        $this->productService = $productService;
    }
    public function index()
    {
        $blogs = $this -> blogService ->getLatestBlogs();
        $featuredProducts = $this -> productService -> getFeaturedProducts();

        return view('front.index',compact('blogs'),compact('featuredProducts'));

    }
}
