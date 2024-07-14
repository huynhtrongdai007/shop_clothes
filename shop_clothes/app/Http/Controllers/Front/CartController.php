<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService) {
        $this->productionService = $productService;
    }

    public function add(Request $request) {
        if($request->ajax()){
            $product = $this->productionService->find($request->productId);
            $response['cart'] = Cart::add([
                'id'=>$product->id,
                'name'=>$product->name,
                'qty'=>1,
                'price'=>$product->discount ?? $product->price,
                'weight'=>$product->weight ?? 0,
                'options'=>[
                    'images'=>$product->productImages,
                ],
    
            ]);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();

            return $response;
        }
        return back();
        
    }

    public function index() {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.shop.cart', compact('carts', 'total','subtotal'));
    }

    public function delete(Request $request) {
        if($request->ajax()){
            $id = $request->rowId;
            $response['cart'] = Cart::remove($id);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();
            return $response;

        }
        return back();

    }

    public function destroy(){
        Cart::destroy();
    }
}
