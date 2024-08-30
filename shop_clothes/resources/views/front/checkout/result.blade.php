@extends('front.layout.master')
@Section('title','Check out')
@section('body')


    <!-- Shopping Cart Section Begin -->
    <div class="checkout-section spad">
        <div class="container">
            <div class="col-lg-12">
                <h4>{{$notification}}</h4>
            </div>
            <a href="./shop" class="primary-btn mt-5">Continute shopping</a>

        </div>
    </div>
    <!-- Shopping Cart Section End -->
@endsection

