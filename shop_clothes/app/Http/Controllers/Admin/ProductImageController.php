<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use Illuminate\Support\Carbon;
use Image;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product_iamges = ProductImages::where('product_id', $id)
               ->latest()
               ->paginate(5);
        return view('admin.modules.product_image.index',compact('product_iamges'));
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
        if($request->hasFile('image')) {
            
            $product_image = $request->file('image');

            $old_image = $request->old_image;
            $name_gen = hexdec(uniqid()).'.'.$product_image->getClientOriginalExtension();
            Image::make($product_image)->resize(270,303)->save('images/product/'.$name_gen);
            $last_img = 'images/product/'.$name_gen;
            unlink($old_image);

            ProductImages::find($id)->update([
                'path'=>$last_img,
                'updated_at'=>Carbon::now()
            ]);

        }

        return Redirect()->back()->with('success','Product Iamge Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductImages::find($id)->delete();
        return Redirect()->back()->with('success','Product Iamge Soft Delete Successfull');
    }
}
