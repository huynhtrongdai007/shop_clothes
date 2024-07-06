<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        $products = DB::table('products')->get();
        $product_images = DB::table('product_images')->get();


        return view('front.shop.index', compact('categories','brands','products','product_images'));

    }
    public function product($id)
    {
        $products = DB::table('products')->get();
        $product_images = DB::table('product_images')->get();
        $product_comments = DB::table('product_comments')->get();
        return view('front.shop.product',compact('products','product_images', 'product_comments'));
    }
}
