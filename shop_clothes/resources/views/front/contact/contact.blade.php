@extends('front.layout.master')
@Section('title','Contact')
@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!--Map Section Begin -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d848.0108174258912!2d106.71498326425738!3d10.810829937622469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752898fbed2b39%3A0x2afa4499cf604464!2zU8OibiBUZW5uaXMgVMawIEjhu5NuZw!5e0!3m2!1svi!2s!4v1717420776751!5m2!1svi!2s"
                                width="500" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>>
                </iframe>
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
    </div>
    <!--Map Section End -->
    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <section class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contacts Us</h4>
                        <p>Contrary to popular belief, Lorem Ipsum is simply random text. It has roots in a piece of classical Latin literature from 45 BC, maki years old.</p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="c1-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Nguyen Hai Dang</span>
                                <p>P25 Binh Thanh, tp HCM</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="c1-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone</span>
                                <p>0792987401</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="c1-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>2231121508@ut.edu.vn</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <p>Our staff will call back later and answer your questions.</p> <form action="#" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Your name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Your email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Your message "></textarea>
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- Contact Section End 11-->
@endsection
