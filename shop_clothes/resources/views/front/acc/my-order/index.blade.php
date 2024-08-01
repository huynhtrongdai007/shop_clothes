@extends('front.layout.master')
@Section('title','My Order')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <span>My Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- Shopping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>
                                        <i onclick="confirm('Are you sure to delete all carts?') === true ? destroyCart() : ''"
                                           style="cursor:pointer" class="ti-close"></i>
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)

                                    <tr>
                                        <td class="cart-pic first-row">
                                            <img style="height: 100px;"
                                                src="front/img/products/{{ $order->orderDetails[0]->product->productImages[0]->path }}"
                                                alt="">
                                        </td>
                                        <td class="first-row">#{{ $order->id }}</td>
                                        <td class="cart-title first-row">
                                        <h5>
                                            {{ $order->orderDetails[0]->product->name }}
                                            @if(count($order->orderDetails) > 1)
                                            (and {{ (count($order->orderDetails))-1 }} other products)
                                            @endif
                                        </h5>
                                        </td>
                                        <td class="total-price first-row">
                                            ${{ array_sum(array_column ($order->orderDetails->toArray(), 'total')) }}
                                        </td>
                                        <td class="first-row">
                                            <a class="btn" href="./acc/my-order/{{ $order->id }}">Details</a>
                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection

