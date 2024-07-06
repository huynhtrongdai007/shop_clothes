<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function details ()
    {   $blog_comments = DB::table('blog_comments')->get();
        $blogs = DB::table('blogs')->get();
        return view('front.page.details', compact('blog_comments'),compact('blogs'));
    }
    public function shoppingcart ()
    {
        return view('front.page.shoppingcart');
    }
    public function checkout ()
    {
        return view('front.page.checkout');
    }
    public function faq ()
    {
        return view('front.page.faq');
    }

}
