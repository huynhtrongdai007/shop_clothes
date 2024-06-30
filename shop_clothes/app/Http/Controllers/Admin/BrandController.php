<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(5);
        $trachCat = Brand::onlyTrashed()->latest()->paginate(3);
        return view('admin.modules.brand.index',compact('brands','trachCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.brand.create');
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
            'name'=>'required|unique:brands|max:255',
        ],
        [
            'name.required'=>'Please Input Brand Name',
        ]);

        Brand::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->back()->with('success','Brand Inserted Sucessfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.modules.brand.edit',compact('brand'));
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
        ],
        [
            'name.required'=>'Please Input Brand Name',
        ]);

        Brand::find($id)->update([
            'name'=>$request->name,
            'update_at'=>Carbon::now()
        ]);
        return Redirect()->back()->with('success','Brand Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        return Redirect()->back()->with('success','Brand Deleted Sucessfully');
    }

    public function restore($id) {
        $delete = Brand::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Brand Restore Successfull');
    }

    public function delete($id) {
        Brand::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Brand Permanently Deleete Successfull');

    }
}
