<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\category;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = category::latest()->paginate(5);
        $trachCat = category::onlyTrashed()->latest()->paginate(3);
        return view('admin.modules.category.index',compact('categories','trachCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.category.create');
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
            'name'=>'required|unique:categories|max:255',
        ],
        [
            'name.required'=>'Please Input Category Name',
        ]);

        category::insert([
            'name'=>$request->name,
            'user_id' => Auth::user()->id,
            'created_at'=>Carbon::now()
            
        ]);
        return Redirect()->back()->with('success','Category Inserted Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);
        return view('admin.modules.category.edit',compact('category'));
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
            'name.required'=>'Please Input Category Name',
        ]);
        category::find($id)->update([
            'name'=>$request->name,
            'user_id'=>Auth::user()->id,
            'update_at'=>Carbon::now()
        ]);
        return Redirect()->route('index.category')->with('success','Category Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = category::find($id)->delete();
        return Redirect()->back()->with('success','Category Soft Delete Successfull');
    }

    public function restore($id) {
        $delete = category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restore Successfull');
    }

    public function delete($id) {
        category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanently Deleete Successfull');

    }
}
