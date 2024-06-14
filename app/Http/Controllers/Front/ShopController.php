<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index()
    {
        return view('front.shop.index');
    }
    public function product($id)
    {
        return view('front.shop.product');
    }
}
