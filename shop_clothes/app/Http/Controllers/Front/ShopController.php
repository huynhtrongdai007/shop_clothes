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


        return view('front.shop.index', compact('categories','brands'));

    }
    public function product($id)
    {
        return view('front.shop.product');
    }
}
