@extends('front.layout.master')
@Section('title','Cart')
@section('body')

<!-- Shopping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <tbody>
                            @foreach ($carts as $cart)
                                
                            <tr>
                                <td class="cart-pic first-row"><img style="height:170px;" src="front/img/products/{{$cart->options->images[0]->path}}" alt=""></td>
                                <td class="cart-title first-row">
                                    <h5>{{$cart->name}}</h5>
                                </td>
                                <td class="p-price first-row">${{number_format($cart->price, 2)}}</td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{$cart->qty}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row">${{number_format($cart->price * $cart->qty, 2)}}</td>
                                <td class="close-td first-row"><i class="ti-close"></i></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="cart-buttons">
                    <a href="" class="primary-btn continute-shop">Continue shopping</a>
                    <a href="" class="primary-btn up-cart">Update cart</a>
                </div>
                <div class="discount-coupon">
                    <h6>Discount Codes</h6>
                    <form action="#" class="coupon-form"></form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-4">
                <div class="proceed-checkout">
                    <ul>
                        <li class="subtotal">Subtotal <span>${{$total}}</span></li>
                        <li class="cart-total">Total <span>${{$subtotal}}</span></li>
                    </ul>
                    <a href="" class="proceed-btn">PROCEED TO CHECK OUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

