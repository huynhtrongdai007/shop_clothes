<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;


class ShopController extends Controller
{
    private $productService;
    private $productCommentService;
    private $productCategoryService;
    private $brandService;
    public function __construct(    ProductServiceInterface $productService,
                                    ProductCommentRepositoryInterface $productCommentService,
                                    ProductCategoryServiceInterface $productCategoryService,
                                    BrandServiceInterface $brandService
    )
    {
        $this->productService = $productService;
        $this -> productCommentService = $productCommentService;
        $this -> productCategoryService = $productCategoryService;
        $this -> brandService = $brandService;
    }


    public function index(\Illuminate\Http\Request $request)
    {

          $categories =$this -> productCategoryService -> all() ;
          $products = $this -> productService -> getProductOnIndex($request);
          $brands = $this -> brandService -> all() ;
        return view('front.shop.index',compact('products','categories','brands'));
    }
    public function product($id)
    {
        $brands = $this -> brandService -> all() ;
        $categories =$this -> productCategoryService -> all() ;
        $product = $this -> productService -> find($id);
        $relatedProducts = $this -> productService ->getRelatedProducts($product);

        return view('front.shop.product', compact('product','brands','categories'), compact('relatedProducts'));
    }

    public function postComment(\Illuminate\Http\Request $request)
    {
        $this -> productCommentService ->create($request-> all());
        return redirect()->back();
    }

    public function category ($categoryName, \Illuminate\Http\Request $request)
    {


        $categories = $this -> productCategoryService-> all();
        $products = $this -> productService-> getproductsByCategory($categoryName, $request);
        $brands = $this -> brandService -> all() ;
        return view('front.shop.index',compact('categories','products','brands'));
    }

}
