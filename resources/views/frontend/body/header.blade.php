
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                {{-- <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            
                            <li><a href="page-account.html">My Cart</a></li>
                            <li><a href="shop-wishlist.html">Checkout</a></li>
                            <li><a href="shop-order.html">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>100% Secure delivery without contacting the courier</li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today</li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                           
                            <li>
                                <a class="language-dropdown-active" href="#">
                                    @if(app()->getLocale() == 'ar')
                                        {{ __('frontend/home/header.arabic') }}
                                    @elseif(app()->getLocale() == 'en')
                                    {{ __('frontend/home/header.english') }}
                                    @endif
                                    <i class="fi-rs-angle-small-down"></i>
                                </a>
                                <ul class="language-dropdown">
                                    <li>
                                        <a href="{{ route('setLocale', ['locale' => 'ar']) }}">{{ __('frontend/home/header.arabic') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('setLocale', ['locale' => 'en']) }}">{{ __('frontend/home/header.english') }}</a>
                                    </li>
                                    <!-- Add more languages as needed -->
                                </ul>
                            </li>
                            
                             <li>{{ __('frontend/home/header.need_help') }}<strong class="text-brand">{{ $setting->support_phone ?? 'N/A' }}</strong></li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('/') }}"><img src="{{ asset(optional($setting)->logo) }}" alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="{{ route('product.search') }}"  method="post">
                            @csrf
                            {{-- <select class="select-active">
                                <option>All Categories</option>
                      
                            </select> --}}
                            <input type="text" onfocus="search_result_show()" onblur="search_result_hide()" name="search" id="search" placeholder="{{ __('frontend/home/header.search_place') }}" />
                            <div id="searchProducts"></div>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            {{-- <div class="header-action-icon-2">
                                <a href="shop-wishlist.html">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                    <span class="pro-count blue">6</span>
                                </a>
                                <a href="shop-wishlist.html"><span class="lable">Wishlist</span></a>
                            </div> --}}
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="shop-cart.html">
                                    <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue" id="cartQty">0</span>
                                </a>
                                <a href="{{ route('mycart') }}"><span class="lable">{{ __('frontend/home/header.cart') }}</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <!--   // mini cart start with ajax -->
                                            <div id="miniCart">
                                    
                                            </div>
                                            <!--   // End mini cart start with ajax -->

                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span id="cartSubTotal">0</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('mycart') }}" class="outline">View cart</a>
                                            <a href="{{ route('checkout') }}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @guest
                                <div class="header-action-icon-2">
                                    <a href="{{ route('login') }}"><span class="lable ml-0">{{ __('frontend/home/header.login') }}</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{ route('register') }}"><span class="lable ml-0">{{ __('frontend/home/header.register') }}</span></a>
                                </div>
                            @endguest
                            @auth
                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                                @if (Auth::check())
                                     @if (Auth::user()->role == 'admin')
                                         <a href="{{ route('admin.dashboard') }}"><span class="label ml-0">{{ __('frontend/home/header.dashboard') }}</span></a>
                                     @elseif (Auth::user()->role == 'vendor')
                                         <a href="{{ route('vendor.dashboard') }}"><span class="label ml-0">{{ __('frontend/home/header.dashboard') }}</span></a>
                                     @else
                                         <a href="{{ route('dashboard') }}"><span class="label ml-0">{{ __('frontend/home/header.dashboard') }}</span></a>
                                     @endif                              
                                @endif                                
                                
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        {{-- <li>
                                            <a href="page-account.html"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                        </li>
                                        <li>
                                            <a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="page-account.html"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                        </li> --}}
                                        <li>
                                            <a type="submit" href="{{ route('logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>{{ __('frontend/home/header.sign_out') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>  
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ route('/') }}"><img src="{{ asset(optional($setting)->logo) }}" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> {{ __('frontend/home/header.all_categories') }}
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <?php 
                         $categories = App\Models\Category::all();
                         
                         // Split the categories into chunks
                         $categoriesChunks = $categories->chunk(1);
                         
                         // Initialize variables
                         $categoriesLeft = collect([]);
                         $categoriesRight = collect([]);
                         $categoriesMoreLeft = collect([]);
                         $categoriesMoreRight = collect([]);
                         
                         // Organize the chunks as needed
                         $alternate = 'left'; // Start with left
                         foreach ($categoriesChunks as $chunk) {
                             if ($alternate == 'left' && $categoriesLeft->count() < 5) {
                                 $categoriesLeft = $categoriesLeft->merge($chunk);
                                 $alternate = 'right';
                             } elseif ($alternate == 'right' && $categoriesRight->count() < 5) {
                                 $categoriesRight = $categoriesRight->merge($chunk);
                                 $alternate = 'left';
                             } elseif ($categoriesMoreLeft->count() < 2) {
                                 $categoriesMoreLeft = $categoriesMoreLeft->merge($chunk);
                                 $alternate = 'right';
                             } elseif ($categoriesMoreRight->count() < 2) {
                                 $categoriesMoreRight = $categoriesMoreRight->merge($chunk);
                                 $alternate = 'left';
                             }
                         }
                         ?>
                         <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading ">
                             <div class="d-flex categori-dropdown-inner">
                                 <ul>
                                     @foreach ($categoriesLeft as $cat)
                                     <li>
                                         <a href="{{ url('product/category/'.$cat->id.'/'.$cat['category_slug']) }}">
                                             <img src="{{ asset($cat['category_image']) }}" alt="" />
                                             {{ $cat['category_name'] }}
                                         </a>
                                     </li>
                                     @endforeach
                                 </ul>
                                 <ul class="end">
                                     @foreach ($categoriesRight as $cat)
                                     <li>
                                         <a href="{{ url('product/category/'.$cat->id.'/'.$cat['category_slug']) }}">
                                             <img src="{{ asset($cat['category_image']) }}" alt="" />
                                             {{ $cat['category_name'] }}
                                         </a>
                                     </li>
                                     @endforeach
                                 </ul>
                             </div>
                             <div class="more_slide_open" style="display: none">
                                 <div class="d-flex categori-dropdown-inner">
                                     <ul>
                                         @foreach ($categoriesMoreLeft as $cat)
                                         <li>
                                             <a href="{{ url('product/category/'.$cat->id.'/'.$cat['category_slug']) }}">
                                                 <img src="{{ asset($cat['category_image']) }}" alt="" />
                                                 {{ $cat['category_name'] }}
                                             </a>
                                         </li>
                                         @endforeach
                                     </ul>
                                     <ul class="end">
                                         @foreach ($categoriesMoreRight as $cat)
                                         <li>
                                             <a href="{{ url('product/category/'.$cat->id.'/'.$cat['category_slug']) }}">
                                                 <img src="{{ asset($cat['category_image']) }}" alt="" />
                                                 {{ $cat['category_name'] }}
                                             </a>
                                         </li>
                                         @endforeach
                                     </ul>
                                 </div>
                             </div>
                             <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                         </div>
                    </div>

                    
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading" style="margin: 0 17px;">
                        <nav>
                            <ul class="nav nav-tabs" role="tablist">   
                                <li role="presentation" class="active">
                                    <a  href="{{ url('/') }}">{{ __("frontend/home/header.home") }}  </a>
                                    
                                </li>
                                @foreach ($categories as $cat)
                                <li>
                                    <a href="{{ url('product/category/'.$cat->id.'/'.$cat->category_slug) }}">{{ $cat->category_name }} <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @foreach ($cat->subcategories as $subcategory)
                                            <li><a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                                <li>
                                    <a href="page-contact.html">Contact</a>
                                </li>                               
                            </ul>
                        </nav>
                    </div>
                </div>

{{-- 
                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                    <p>{{ $setting->support_phone ?? 'N/A' }}<span> {{ __('frontend/home/header.support_center') }}</span></p>
                </div> --}}
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        {{-- <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                <span class="pro-count white">4</span>
                            </a>
                        </div> --}}
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="">
                                <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count blue" id="cartQty"></span>
                            </a>
                            <a href="{{ route('mycart') }}"><span class="lable">{{ __('frontend/home/header.cart') }}</span></a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <!--   // mini cart start with ajax -->
                                        <div id="miniCart">
                                
                                        </div>
                                        <!--   // End mini cart start with ajax -->

                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span id="cartSubTotal">0</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="{{ route('mycart') }}" class="outline">{{ __('frontend/home/header.view_cart') }}</a>
                                        <a href="{{ route('checkout') }}">{{ __('frontend/home/header.checkout') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- End Header  -->
<style>
    #searchProducts{
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>

<script>
    function search_result_show(){
        $("#searchProducts").slideDown();
    }
    function search_result_hide(){
        $("#searchProducts").slideUp();
    }
</script>


<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('/') }}"><img src="{{ asset(optional($setting)->logo) }}" alt="logo" /></a>
           </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children"><a href="{{ route('/') }}">{{ __('frontend/home/header.home') }}</a>
                             
                        </li>
                        @foreach ($categories as $cat)
                        <li class="menu-item-has-children"><a href="{{ url('product/category/'.$cat->id.'/'.$cat->category_slug) }}">{{ $cat->category_name }} </a>
                            <ul class="dropdown">
                                @foreach ($cat->subcategories as $subcategory)
                                <li class="menu-item-has-children"><a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                        
                        <li class="menu-item-has-children">
                            <a href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('setLocale', ['locale' => 'ar']) }}">{{ __('frontend/home/header.arabic') }}</a></li>
                                <li><a href="{{ route('setLocale', ['locale' => 'ar']) }}">{{ __('frontend/home/header.arabic') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{ route('login') }}"><i class="fi-rs-user"></i>{{ __('frontend/home/header.login') }}</a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2022 © Nest. All rights reserved. Powered by AliThemes.</div>
        </div>
    </div>
</div>
