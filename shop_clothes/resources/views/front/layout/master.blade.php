@php use Illuminate\Support\Facades\Session; @endphp
<!DOCTYPE html>
<html lang="zxx">

<head>

    <base href="{{asset('/')}}">
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Code AAA</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
</head>

<body>
    <!-- Start coding here -->
    <!-- Pre load -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope"></i>
                        2231121508@ut.edu.vn
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone"></i>
                        0792987401
                    </div>
                </div>
                <div class="ht-right">
                    @if (Auth::check())
                        <span class="login-panel"> <i class="fa fa-user"></i>
                        {{ Auth::user()->name }}
                         <a href="./acc/logout" >
                        <button>Logout</button>
                        </a>
                        </span>
                    @else
                        <a href="./acc/login" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    @endif


                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width: 300px;">
                            <option value="yt" data-image="front/img/flag-1.jpg" data-imagecss=" flag yt" data-title="English">English</option>
                            <option value="yt" data-image="front/img/flag-2.jpg" data-imagecss=" flag yu" data-title="German">German</option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="https://www.facebook.com/nguyen.haidang.9212"><i class="ti-facebook"> </i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="https://www.linkedin.com/in/nguyen-hai-dang-0a6891187/"><i class="ti-linkedin"></i></a>
                        <a href="https://www.pinterest.com/nguyenhaidang0128/"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./">
                               <img src="front/img/home3.png" height="25" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">

                        <form action="shop">
                            <div class="advanced-search">
                                <button type="button" class="category-btn">All categories</button>
                                <div class="input-group">
                                    <input name="search" value="{{request ('search')}}" type="text" placeholder="What do you need" />
                                    <button type="submit"> <i class="ti-search"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="col-lg-3 col-md-3 texxt-right">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="./cart">
                                    <i class="icon_bag_alt"></i>
                                    <span class="cart-count">{{Cart::count()}}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @foreach (Cart::content() as $cart)

                                                <tr data-rowId="{{$cart->rowId}}">
                                                    <td class="si-pic"><img style="height: 70px;" src="front/img/products/{{$cart->options->images[0]->path}}" />
                                                    </td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>{{$cart->price}} x {{$cart->qty}}</p>
                                                            <h6>{{$cart->name}}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i onclick="removeCart('{{$cart->rowId}}')" class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>${{Cart::total()}}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="./cart" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="./checkout" class="primary-btn checkout-card">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">${{Cart::total()}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li><a href="#">Women's Clothing</a></li>
                            <li><a href="#">Men's Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand code leanon</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ (request()->segment (1)=='') ? 'active':''}}"> <a href="./">Home</a></li>
                        <li class="{{ (request()->segment (1) == 'shop') ? 'active':''}}"> <a href="./shop">Shop</a></li>
                        <li class="{{ (request()->segment (1) == 'blog') ? 'active':''}}"><a href="./blog">Blog</a></li>
                        <li class="{{ (request()->segment (1) == 'contact') ? 'active':''}}"><a href="./contact">Contact</a></li>
                        <li class="{{ (request()->segment (1) == 'my-order') ? 'active':''}}"><a href="./my-order">My-Order</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Body -->
    @yield('body')

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-1.png">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-2.png">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-3.png">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-4.png">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-5.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-Logo">
                            <a href="./">
                                <img src="front/img/home3.png" height="25" alt="">
                            </a>
                        </div>
                        <ul>
                            <li>Pho di bo Nguyen Hue</li>
                            <li>Phone:0792987401</li>
                            <li>Email:2231121508@ut.edu.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/nguyen.haidang.9212"><i class="ti-facebook"> </i></a>
                            <a href="#"><i class="ti-twitter-alt"></i></a>
                            <a href="https://www.linkedin.com/in/nguyen-hai-dang-0a6891187/"><i class="ti-linkedin"></i></a>
                            <a href="https://www.pinterest.com/nguyenhaidang0128/"><i class="ti-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Checkout</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="">My Account</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Shopping Cart</a></li>
                            <li><a href="">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright ©
                            <script>document.write(new Date().getFullYear());</script> All rights reserved
                        </div>
                        <div class="payment-pic">
                            <img src="front/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section  End -->

    <!-- Js Plugins -->
    <script src="front/js/jquery-3.3.1.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery-ui.min.js"></script>
    <script src="front/js/jquery.countdown.min.js"></script>
    <script src="front/js/jquery.nice-select.min.js"></script>
    <script src="front/js/jquery.zoom.min.js"></script>
    <script src="front/js/jquery.dd.min.js"></script>
    <script src="front/js/jquery.slicknav.js"></script>
    <script src="front/js/owl.carousel.min.js"></script>
    <script src="front/js/owlcarousel2-filter.min.js"></script>
    <script src="front/js/main.js"></script>
</body>

</html>
