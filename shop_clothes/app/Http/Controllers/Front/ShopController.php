<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Service\Product\ProductService;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    private $productService;
    private $productCommentService;
    private $productCategoryService;
    public function __construct(    ProductServiceInterface $productService,
                                    ProductCommentRepositoryInterface $productCommentService,
                                    ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productService = $productService;
        $this -> productCommentService = $productCommentService;
        $this -> productCategoryService = $productCategoryService;
    }


    public function index(\Illuminate\Http\Request $request)
    {

         $categories =$this -> productCategoryService -> all() ;
          $products = $this -> productService -> getProductOnIndex($request);
        return view('front.shop.index',compact('products','categories'));
    }
    public function product($id)
    {
          $product = $this -> productService -> find($id);
          $relatedProducts = $this -> productService ->getRelatedProducts($product);

        return view('front.shop.product', compact('product'), compact('relatedProducts'));
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
        return view('front.shop.index',compact('categories','products'));
    }

}
