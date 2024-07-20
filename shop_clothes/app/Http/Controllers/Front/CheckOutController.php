<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface $orderService,
        OrderDetailServiceInterface $orderDetailService ){
        
            $this->orderService = $orderService;
            $this->orderDetailService = $orderDetailService;
    }

    public function index() {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('front.checkout.index',compact('carts','total','subtotal'));
    }

    public function addOrder(Request $request) {
        //01. Thêm đơn hàng
        $order = $this->orderService->create($request->all());

        //02. Thêm chi tiết đơn hàng
        $carts = Cart::content();
        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];
            $this->orderDetailService->create($data);
        }

        //03.Xóa giỏ hàng
        Cart::destroy();
        
        //04. Trả về kết quả thông báo
        return "Success!";
    }
}
