<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Service\Blog\BlogServiceInterface;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    private $blogService;
    public function __construct(    BlogServiceInterface $blogService

    )
    {
        $this->blogService = $blogService;

    }
    public function blog()
    {   $blogs = Blog::all();
        return view('Front.Blog.blog', compact('blogs'));
    }
    public function show($id)
    {
        $blog_comments = DB::table('blog_comments')->get();
        $blogs = $this->blogService->find($id);
        return view('Front.blog.show',compact('blogs','blog_comments'));
    }

}
