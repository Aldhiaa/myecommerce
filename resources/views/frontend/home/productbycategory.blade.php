@foreach ($categories as $cat)
    @php
        $categoryProducts =App\Models\Product::where('category_id', $cat->id);
    @endphp

    @if ($categoryProducts->count() > 0)
    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>{{ __($cat->category_name) }}</h3>           
            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @foreach ($products as $product)
                        @if ($product->category_id == $cat->id)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                                                <img class="default-img" src="{{ asset($product->product_thambnail) }}" alt="" />
                                                {{-- <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="" /> --}}
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            {{-- <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            <a aria-label="{{ __('frontend/home.featured_products.quick_view') }}" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="productview(this.id)"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if ($product->discount_price == NULL)
                                            <span class="badge rounded-pill bg-info">{{ __('frontend/home.new_products.new') }}</span>  
                                            @else
                                            @php
                                            $amount = $product->selling_price - $product->discount_price;
                                            $discount = 0;
                                        
                                            if ($product->selling_price > 0) {
                                                $discount = ($amount / $product->selling_price) * 100;
                                            }
                                            @endphp
                                            <span class="badge rounded-pill bg-info">{{ round($discount) }}%</span>  
        
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{ url('product/category/'.$product->category->id.'/'.$product->category->category_slug) }}">{{ $product->category->category_name }}</a>
                                        </div>
                                        <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h2>
                                        {{-- <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div> --}}
                                        <div>
                                            <span class="font-small text-muted">By <a href="{{ route('vendor.details', $product->vendor->id)  }}">{{ $product->vendor->name }}</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            @if ($product->discount_price == NULL)
                                            <div class="product-price">
                                                <span>${{ $product->selling_price }}</span>
                                            </div>
                                            @else
                                            <div class="product-price">
                                                <span>${{ $product->selling_price - $product->discount_price }}</span>
                                                <span class="old-price">${{ $product->selling_price }}</span>
                                            </div>
                                            @endif
        
                                            <div class="add-cart">
                                                <a class="add" href="javascript:void(0)" onclick="addproductToCart('{{ $product->id }}', '{{ $product->vendor->id }}')"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach                 
                    </div>
                    <!--End product-grid-4-->
                </div>
               
               
            </div>
            <!--End tab-content-->
        </div>
    
    
    </section> 
    @endif
@endforeach
