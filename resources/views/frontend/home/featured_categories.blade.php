<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3>{{ __('frontend/home.featured_categories.title') }}</h3>
               
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
        </div>
        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">
                @foreach ($categories as $item)
                <div class="card-2 bg-9 wow animate__ animate__fadeInUp slick-slide slick-current slick-active" data-wow-delay=".1s" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 72px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="{{ url('product/category/'.$item['id'].'/'.$item['category_slug']) }}" tabindex="0"><img src="{{ asset($item->category_image) }}" alt=""></a>
                    </figure>
                    <h6><a href="{{ url('product/category/'.$item['id'].'/'.$item['category_slug']) }}" tabindex="0">{{ $item->category_name }}</a></h6>
                    <span>{{  $item->products->count()  }} {{ __('frontend/home.featured_categories.items') }}</span>
                </div> 
                @endforeach

            </div>
        </div>
    </div>
</section>