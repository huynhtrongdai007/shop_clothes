<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $brands_name = DB::table('brands')->select('name')->where('id',1);
        $brands_name = $brands_name->get();
        $brands_name_2 = DB::table('brands')->select('name')->where('id',2);
        $brands_name_2 = $brands_name_2->get();
        $brands_name_3 = DB::table('brands')->select('name')->where('id',3);
        $brands_name_3 = $brands_name_3->get();
        $brands_name_4 = DB::table('brands')->select('name')->where('id',4);
        $brands_name_4 = $brands_name_4->get();
        $categories_name = DB::table('product_categories')->select('name')->where('id',1);
        $categories_name = $categories_name->get();
        $categories_name_2 = DB::table('product_categories')->select('name')->where('id',2);
        $categories_name_2 = $categories_name_2->get();
        $categories_name_3 = DB::table('product_categories')->select('name')->where('id',3);
        $categories_name_3 = $categories_name_3->get();

        return view('front.shop.index', compact('brands_name','brands_name_2','brands_name_3','brands_name_4',
            'categories_name','categories_name_2','categories_name_3'));

        //return view('front.shop.index');
    }
    public function product($id)
    {
        return view('front.shop.product');
    }
}
