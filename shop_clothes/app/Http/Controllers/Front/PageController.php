<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
class PageController extends Controller
{
    public function details ()
    {
        return view('front.page.details');
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
