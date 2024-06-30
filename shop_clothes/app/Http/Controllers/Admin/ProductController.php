<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Support\Facades\DB;
use Image;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        $trachCat = Product::onlyTrashed()->latest()->paginate(3);
        return view('admin.modules.product.index',compact('products','trachCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = category::all();

        return view('admin.modules.product.create',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|unique:products|max:255',
            'brand_id' =>'required',
            'category_id'=>'required',
            'price'=>'required',
            'qty'=>'required',
            'weight'=>'required',
            'sku'=>'required|unique:products|max:10',
        ],
        [
            'name.required'=>'Please input product name',
            'brand_id.required'=>'Please input product brand',
            'category_id.required'=>'Please input product category',
            'category_id.required'=>'Please input product category',
            'qty.required'=>'Please input product qty',
            'weight.required'=>'Please input product weight',
            'sku.required'=>'Please input product sku',
        ]);


       $product_id = DB::table('products')->insertGetId([
            'name'=>$request->name,
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'user_id'=>Auth::user()->id,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'weight'=>$request->weight,
            'sku'=>$request->sku,
            'discount'=>$request->discount,
            'description'=>$request->description,
            'featured'=>$request->featured,
            'created_at'=>Carbon::now()
        ]);

        if($request->hasFile('images')) {
            
            $product_image = $request->file('images');
                foreach($product_image as $multi_img) {

                    $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
                    Image::make($multi_img)->resize(300,200)->save('image/product/'.$name_gen);
                    $last_img = 'image/product/'.$name_gen;

                    ProductImages::insert([
                        'product_id'=>$product_id,
                        'path'=>$last_img,
                        'created_at'=>Carbon::now()
                    ]);
            }
        }

        return Redirect()->back()->with('success','Product Inserted Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = category::all();
        return view('admin.modules.product.show',compact('product','brands','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = category::all();
        $product_image = ProductImages::find($id);

        return view('admin.modules.product.edit',compact('product','brands','categories','ProductImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'brand_id' =>'required',
            'category_id'=>'required',
            'price'=>'required',
            'qty'=>'required',
            'weight'=>'required',
            'sku'=>'max:10',
        ],
        [
            'name.required'=>'Please input product name',
            'brand_id.required'=>'Please input product brand',
            'category_id.required'=>'Please input product category',
            'category_id.required'=>'Please input product category',
            'qty.required'=>'Please input product qty',
            'weight.required'=>'Please input product weight',
        ]);

        Product::find($id)->update([
            'name'=>$request->name,
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'user_id'=>Auth::user()->id,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'weight'=>$request->weight,
            'sku'=>$request->sku,
            'discount'=>$request->discount,
            'description'=>$request->description,
            'featured'=>$request->featured,
            'updated_at'=>Carbon::now()
        ]);

        return Redirect()->back()->with('success','Product Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        
        return Redirect()->back()->with('success','Product Soft Delete Successfull');
    }

    public function restore($id) {
        Product::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Product Restore Successfull');
    }

    public function delete($id) {
        Product::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Product Permanently Deleete Successfull');
    }
}
