<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use app\Utilities\Constant;



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
        $data = $request -> all();
        $data ['status']  = Constant::order_status_ReceiveOrders;
        $order = $this->orderService->create($data);

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

        if ($request->payment_type == 'pay_later') {
            //03.Xóa giỏ hàng
            Cart::destroy();
                    
            //04. Trả về kết quả thông báo
            return redirect('checkout/result')->with('notification','Success! you will pay delivery. Please check your email');
        }

        if ($request->payment_type == 'online_paypal') {
            //01.Lấy URL thanh toán VNPay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id, //ID của đơn hàng.
                'vnp_OrderInfo' => 'Mô tả đơn hàng ở đây...', // Mô tả đơn hàng (điền tùy ý phù hợp)
                'vnp_Amount' => Cart::total(0,'','') * 23070,  // Tổng giá đơn hàng * với tỉ giá chuyển sang tiền việc 

            ]);
                    
            //02. Chuyển hướng tới URL lấy được
            dd($data_url);
            return redirect()->to($data_url);
        }
    }

    public function vnPayCheck(Request $request) {
        //01. Lấy data từ URL (do VNPay gửi về qua $vnp_ResponseCode) 
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); // Mã phản hồi kết quả thanh toán. 00= Thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef'); // order_id
        $vnp_Amount = $request->get('vnp_Amount'); //Số tiền thanh toán
        //02.Kiểm tra data, xem kết quả giao dịch trả về từ VNPay hợp lệ không:
        if ($vnp_ResponseCode != null) {
            // Nếu thành công:
            if ($vnp_ResponseCode == 00){
                // Xóa giỏ hàng
                Cart::destroy();
                // Thông báo kết quả
                return redirect('checkout/result')->with('notification','Success! Has paid online. Please check your email.');
            }else{ //Nếu không thành công
                $this->orderService->delete($vnp_T);
                // Thông báo Lỗi
                return redirect('checkout/result')->with('notification','ERROR: Payment failed or canceled.');
            }
        }
    }

    public function result(){
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }
}
