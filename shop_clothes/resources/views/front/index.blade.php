
@extends('front.layout.master')
@Section('title','Home')
@section('body')

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag, kids</span>
                            <h1>Black friday</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                incididunt ut labore et dolore
                            </p>
                            <a href="#" class="primary-btn">Shop Now</a> I
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag, kids</span>
                            <h1>Black friday</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                incididunt ut labore et dolore
                            </p>
                            <a href="#" class="primary-btn">Shop Now</a> I
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Banner Section Begin-->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>Men's</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-2.jpg" alt="">
                        <div class="inner-text">
                            <h4>Women's</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-3.jpg" alt="">
                        <div class="inner-text">
                            <h4>Kid's</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End-->

    <!-- Women Banner Section Begin-->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/products/women-large.jpg">
                        <h2>Women's</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active item" data-tag="*" data-category="women" >All</li>
                            <li class="item" data-tag=".Clothing" data-category="women">Clothing</li>
                            <li class="item" data-tag=".Trousers" data-category="women">Trousers</li>
                            <li class="item" data-tag=".Shoes" data-category="women">Shoes</li>
                            <li class="item" data-tag=".Hat" data-category="women">Hat</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel women">

                        @foreach($featuredProducts['women'] as $product)
                            @include('front.component.product-item')
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End-->

    <!-- Deal of the week section begin -->
    <section class="deal-of-week set-bg spad" data-setbg="front/img/time-bg.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br/> do ipsum dolor sit amet,
                        consectetur adipisicing elit </p>
                    <div class="product-price">
                        $35.00
                        <span>/ HanBag</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>56</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    <!---Deal of the week section end->

    <!- Man Banner Section Begin-->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/products/man-large.jpg">
                        <h2>Man's</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active item" data-tag="*" data-category="men" >All</li>
                            <li class="item" data-tag=".Clothing" data-category="men">Clothing</li>
                            <li class="item" data-tag=".Trousers" data-category="men">Trousers</li>
                            <li class="item" data-tag=".Shoes" data-category="men">Shoes</li>
                            <li class="item" data-tag=".Hat" data-category="men">Hat</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel men">
                        @foreach($featuredProducts['men'] as $product)
                            @include('front.component.product-item')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End-->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="front/img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#"></a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#"></a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#"></a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#"></a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#"></a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#"></a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
               @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="front/img/blog/{{$blog->image}}" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    {{date('M,d,Y', strtotime($blog -> created_at))}}
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    {{count($blog->blogComment) }}
                                </div>
                            </div>
                            <a href="blog/{{$blog -> id}}">
                                <h4>{{$blog -> title}}</h4>
                            </a>
                            <p> {{$blog -> subtittle}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If goods have problem</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Recure Payment</h6>
                                <p>100% recure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
@endsection

