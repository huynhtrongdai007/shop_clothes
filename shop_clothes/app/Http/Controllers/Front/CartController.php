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

    public function add($id) {
        $product = $this->productionService->find($id);

        Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>1,
            'price'=>$product->discount ?? $product->price,
            'weight'=>$product->weight ?? 0,
            'options'=>[
                'images'=>$product->productImages,
            ],

        ]);
        dd(Cart::content());
        return back();
    }
}
