<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImages;
use App\Service\Product\ProductService;
use App\Utilities\Common;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $product = $this -> productService -> find($product_id);
        $productImages = $product -> productImages;
        return view('admin.product.image.index', compact('product', 'productImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $product_id)
    {

        $data = $request->all();
        //xu ly file:
        if ($request->hasFile('image'))
        {
        $data['path'] = Common::uploadFile($request->file('image'), 'front/img/products');
        unset($data['image']);
        ProductImages::create($data);
    }
        return redirect( 'admin/product/'.$product_id.'/image');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($product_id, $product_image_id)
    {

    //Xóa file:
        $file_name = ProductImages::find($product_image_id)->path;
        if ($file_name != '') {
            unlink('front/img/products/' . $file_name);
        }
    //Xóa bản ghi trong DataBase:
    ProductImages::find($product_image_id)->delete();
    return redirect( 'admin/product/' .$product_id . '/image');
    }
}
