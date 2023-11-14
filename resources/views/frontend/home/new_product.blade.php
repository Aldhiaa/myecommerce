<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> New Products </h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-all" type="button" role="tab" aria-controls="tab-all" aria-selected="true">All</button>
                </li>
                @foreach ($categories as $item)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="category{{ $item->id }}-tab" data-bs-toggle="tab" data-bs-target="#category{{ $item->id }}-content" type="button" role="tab" aria-controls="category{{ $item->id }}-content" aria-selected="false">{{ $item->category_name }}</button>
                </li>
                @endforeach
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="nav-tab-one">
                <div class="row product-grid-4">
                    @foreach ($products as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="">
                                            <img class="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}" src="{{ asset($product->product_thambnail) }}" alt="" />
                                            {{-- <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="" /> --}}
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="productview(this.id)"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        @if ($product->discount_price == NULL)
                                        <span class="badge rounded-pill bg-info">New</span>  
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
                                            <a class="add" href="javascript:void(0)" onclick="addproductToCart('{{ $product->id }}', '{{ $product->vendor->id }}')">Add</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @foreach ($categories as $category)
            <div class="tab-pane fade" id="category{{ $category->id }}-content" role="tabpanel" aria-labelledby="category{{ $category->id }}-tab">
                <div class="row product-grid-4">
                    @foreach ($products as $product)
                    @if ($product->category_id == $category->id)
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
                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="productview(this.id)"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        @if ($product->discount_price == NULL)
                                        <span class="badge rounded-pill bg-info">New</span>  
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
                    <!-- Handle case when there are no products for this category -->
                    @if ($products->where('category_id', $category->id)->isEmpty())
                    <div class="col-12">
                        <p>No products available for this category.</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <!--End tab-content-->
    </div>
</section>
