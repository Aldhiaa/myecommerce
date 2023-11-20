<div class="container">
  
    <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                  <h3 class="">{{ __('frontend/home.vendor.all_vendors_title') }}</h3>
                  <a class="show-all" href="{{ route('front.vendor.all') }}">
                    {{ __('frontend/home.vendor.all_vendors_link') }}
                      <i class="fi-rs-angle-right"></i>
                  </a>
              </div>
  
  
  <div class="row vendor-grid">
                @foreach ($vendors as $vendor)
                <div class="col-lg-3 col-md-6 col-12 col-sm-6 justify-content-center">
                    <div class="vendor-wrap mb-40">
                        <div class="vendor-img-action-wrap">
                            <div class="vendor-img">
                                <a href="vendor-details-1.html">
                                    <img class="default-img" src="{{ (!empty($vendor->photo)) ? url('upload/vendor_images/'.$vendor->photo) : url('upload/no_image.png')}}" alt="" />
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Mall</span>
                            </div>
                        </div>
                        <div class="vendor-content-wrap">
                            <div class="d-flex justify-content-between align-items-end mb-30">
                                <div>
                                    <div class="product-category">
                                        <span class="text-muted">{{ __('frontend/home.vendor.since') }} 2012</span>
                                    </div>
                                    <h4 class="mb-5"><a href="{{ route('front.vendor.details',$vendor->id) }}">{{ $vendor->name }}</a></h4>
                                    <div class="product-rate-cover">
                                       
                                       <span class="font-small total-product">{{$vendor->product->count() }} {{ __('frontend/home.vendor.products') }}</span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="vendor-info mb-30">
                                <ul class="contact-infor text-muted">
                                    
                                    <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>{{ __('frontend/home.vendor.call_us') }}:</strong><span>(+91) - 540-025-124553</span></li>
                                </ul>
                            </div>
                            <a href="{{ route('front.vendor.details',$vendor->id) }}" class="btn btn-xs">{{ __('frontend/home.vendor.visit_store') }} <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <!--end vendor card-->  
                @endforeach
         
  </div> 
  </div>