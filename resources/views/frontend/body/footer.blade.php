<?php
$setting =App\Models\SiteSetting::find(1);
?>

<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                {{ __('frontend/footer.stay_home_title') }} <br />
                                {{ __('frontend/footer.stay_home_subtitle') }}
                            </h2>
                            <p class="mb-45">{{ __('frontend/footer.start_daily_shopping') }} <span class="text-brand">{{ $setting->title ?? 'N/A' }}</span></p>
                            {{-- <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form> --}}
                        </div>
                        <img src="assets/imgs/banner/banner-9.png" alt="newsletter" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-1.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Best prices & offers</h3>
                            <p>Orders $50 or more</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-2.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Free delivery</h3>
                            <p>24/7 amazing services</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-3.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Great daily deal</h3>
                            <p>When you sign up</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-4.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Wide assortment</h3>
                            <p>Mega Discounts</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-5.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Easy returns</h3>
                            <p>Within 30 days</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-6.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Safe delivery</h3>
                            <p>Within 30 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="{{ route('/') }}" class="mb-15"><img src="{{ asset(optional($setting)->logo) }}" alt="logo" /></a>
                            <p class="font-lg text-heading">{{ $setting->title ?? 'N/A' }}</p>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>{{ __('frontend/footer.company_address') }}< </strong> <span>{{ $setting->company_address ?? 'N/A'}}</span></li>
                            <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>{{ __('frontend/footer.call_us') }}</strong><span>{{ $setting->phone_one ?? 'N/A'}}</span></li>
                            <li><img src="assets/imgs/theme/icons/icon-email-2.svg" alt="" /><strong>{{ __('frontend/footer.email') }}</strong><span>{{ $setting->email ?? 'N/A'}}</span></li>
                            <li><img src="assets/imgs/theme/icons/icon-clock.svg" alt="" /><strong>{{ __('frontend/footer.stay_connected') }}</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class=" widget-title">Company</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">{{ __('frontend/home/header.support_center') }}</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Sign In</a></li>
                        <li><a href="{{ route('mycart') }}">{{ __('frontend/home/header.view_cart') }}</a></li>
                        {{-- <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">Track My Order</a></li> --}}
                        <li><a href="#">Help Ticket</a></li>
                        <li><a href="#">Shipping Details</a></li>
                        <li><a href="#">Compare products</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <h4 class="widget-title">Corporate</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{ route('become.vendor') }}">Become a Vendor</a></li>
                        <li><a href="#">Affiliate Program</a></li>
                        <li><a href="#">Farm Business</a></li>
                        <li><a href="#">Farm Careers</a></li>
                        <li><a href="#">Our Suppliers</a></li>
                        <li><a href="#">Accessibility</a></li>
                        <li><a href="#">Promotions</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <h4 class="widget-title">Popular</h4>
                    @php
                        $categories =App\Models\Category::all();
                    @endphp
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        @foreach ($categories as $cat)
                        <li><a href="{{ url('product/category/'.$cat['id'].'/'.$cat['category_slug']) }}">{{ $cat->category_name }}</a></li>
                        @endforeach    
                    </ul>
                </div>
              
            </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">&copy; {{ $setting->copyright ?? 'N/A' }}</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                 
                {{-- <div class="hotline d-lg-inline-flex">
                    <img src="assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                    <p>{{ $setting->support_phone ?? 'N/A' }}<span> {{ __('frontend/home/header.support_center') }}</span></p>
                </div> --}}
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>{{ __('frontend/footer.follow_us') }}</h6>
                    <a href="{{ $setting->facebook ?? 'N/A' }}"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    <a href="{{ $setting->twitter ?? 'N/A' }}"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                    <a href="{{ $setting->youtube ?? 'N/A' }}"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                </div>
                <p class="font-sm">Up to 15% discount on your first subscribe</p>
            </div>
        </div>
    </div>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row text-center">
                <div class="footer-bottom">
                            <i class="fa fa-heart-o" aria-hidden="true"></i> تطوير 
                            <a  href="https://wa.me//+967715876697" target="_blanck"> <i class="fa fa-send" aria-hidden="true"></i> Eng.Dhiaa Qahtan </a>
                </div>
         
        </div>
    </div>
</footer>