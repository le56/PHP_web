@extends('welcome')
@section('catalog')
<style>
   .nk-product-image img {
        height: 100% !important;
        object-fit: cover;
        border-radius:5px
    }
    .active  {
        color: #dd163b !important;
    }
</style>
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">


        <li><a href="index.html">Home</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><a href="store.html">Store</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><span>Action Games</span></li>

    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->




<div class="container">

   <x-slider />

    <!-- START: Categories -->
    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="public/assets/images/icon-mouse.png" alt="">
                </div>
                <div class="nk-feature-cont">
                    <h3 class="nk-feature-title"><a href="#">PC</a></h3>
                    <h3 class="nk-feature-title text-main-1"><a href="#">View Games</a></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="public/assets/images/icon-gamepad.png" alt="">
                </div>
                <div class="nk-feature-cont">
                    <h3 class="nk-feature-title"><a href="#">PS4</a></h3>
                    <h3 class="nk-feature-title text-main-1"><a href="#">View Games</a></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="public/assets/images/icon-gamepad-2.png" alt="">
                </div>
                <div class="nk-feature-cont">
                    <h3 class="nk-feature-title"><a href="#">Xbox</a></h3>
                    <h3 class="nk-feature-title text-main-1"><a href="#">View Games</a></h3>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Categories -->

    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-8">
            <!-- START: Products -->
            <div class="row vertical-gap">
                 @foreach($products as $product)
                <div class="col-md-6">
                    <div class="nk-product-cat">
                        <a class="nk-product-image" href="product/{{$product->id}}">
                            <img src="{{ asset('public/images/'.$product->image0) }}" alt="{{$product->title}}">
                        </a>
                        <div class="nk-product-cont">
                            <h3 class="nk-product-title h5"><a href="product/{{$product->id}}">{{$product->title}}</a></h3>
                            <div class="nk-gap-1"></div>
                            <div class="nk-product-rating" >
                                @for ($i = 1; $i <=5; $i++)
                                    @if ($i < $product->rate)
                                        <i class="fa fa-star"></i>
                                        @elseif($i === $product->rate) <i class="fas fa-star-half-alt"></i>
                                        @else  <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="nk-gap-1"></div>
                            <div class="nk-product-price">€ {{$product->price}}</div>
                            <div class="nk-gap-1"></div>
                            <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Add to Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="nk-gap-3"></div>
            <!-- END: Products -->

            <!-- START: Pagination -->
        
            {{ $products->links('vendor.pagination.custom') }}

            <!-- END: Pagination -->
        </div>
        <div class="col-lg-4">
           
            <aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
            <div class="nk-widget-content">
                <a  href="{{asset('/catalog')}}" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1 " style="display:block; margin-bottom: 1.5rem !important;">Reset filter</a>
                </div>
                <div class="nk-widget">
    <div class="nk-widget-content">
        <form class="nk-form nk-form-style-1 " id = "search-form" novalidate="novalidate">
            <div class="input-group">
                <input type="text" value="{{request('search')}}" class="form-control" name='search' placeholder="Type something...">
                <button class="nk-btn nk-btn-color-main-1"><span class="ion-search"></span></button>
            </div>
        </form>
    </div>
</div>
<div class="nk-widget nk-widget-highlighted">
                    <select class="form-control" id="sort-select">
                        <option value="" disabled selected>Sort</option>
                        <option value="asc"><a href="">Price from low to high</a></option>
                        <option value="desc">Price from high to low</option>
                      
                    </select>
                    </div>
<div class="nk-widget nk-widget-highlighted">
    <h4 class="nk-widget-title"><span><span class="text-main-1">Category</span> Menu</span></h4>
    <div class="nk-widget-content">
        <ul class="nk-widget-categories">
        <li ><a class="@if(!request('category')) active @endif" href="?allcate=true<?= ((request("search")) ? "&search=".request("search") : "") ?><?= ((request("plt")) ? "&plt=".request("plt") : "") ?><?= ((request("pgt")) ? "&pgt=".request("pgt") : "") ?><?= ((request("sort")) ? "&sort=".request("sort") : "") ?>"
             >
            All categories
            </a></li>
            @foreach ($categories as $category)
            <li><a href="?category={{$category->id}}<?= ((request("search")) ? "&search=".request("search") : "") ?><?= ((request("plt")) ? "&plt=".request("plt") : "") ?><?= ((request("pgt")) ? "&pgt=".request("pgt") : "") ?><?= ((request("sort")) ? "&sort=".request("sort") : "") ?>"
             class="@if($category->id == request('category')) active @endif">
             {{$category->nameCategory}}
            </a></li>
            @endforeach
        </ul>
    </div>
</div>

<div class="nk-widget nk-widget-highlighted">
    <h4 class="nk-widget-title"><span><span class="text-main-1">Price</span> Filter</span></h4>
    <div class="nk-widget-content">
        <div class="nk-input-slider">
            <input
                type="text"
                name="price-filter"
                data-slider-min="0"
                data-slider-max="1800"
                data-slider-step="1"
                data-slider-value="[<?php if(request('pgt')) echo request('pgt'); else echo 0; ?>,<?php if(request('plt')) echo request('plt'); else echo 1800; ?>]"
                data-slider-tooltip="hide"
                name="filter-price"
            >
            <div class="nk-gap"></div>
            <div>
                <div class="text-white mt-4 float-left">
                    PRICE:
                    <strong class="text-main-1">€ <span class="nk-input-slider-value-0"></span></strong>
                    -
                    <strong class="text-main-1">€ <span class="nk-input-slider-value-1"></span></strong>
                </div>
                <button class="nk-btn nk-btn-rounded nk-btn-color-white float-right" id="btn_filter_price">Apply</button>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="nk-widget nk-widget-highlighted">
    <h4 class="nk-widget-title"><span><span class="text-main-1">We</span> Are Social</span></h4>
    <div class="nk-widget-content">
      
        <ul class="nk-social-links-3 nk-social-links-cols-4">
            <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a></li>
            <li><a class="nk-social-instagram" href="#"><span class="fab fa-instagram"></span></a></li>
            <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
            <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
            <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube"></span></a></li>
            <li><a class="nk-social-twitter" href="#" target="_blank"><span class="fab fa-twitter"></span></a></li>
            <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a></li>
            <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>

          
        </ul>
    </div>
</div>
<div class="nk-widget nk-widget-highlighted">
    <h4 class="nk-widget-title"><span><span class="text-main-1">Most</span> Popular</span></h4>
    <div class="nk-widget-content">

        <div class="nk-widget-post">
            <a href="store-product.html" class="nk-post-image">
                <img src="public/assets/images/product-1-xs.jpg" alt="So saying he unbuckled">
            </a>
            <h3 class="nk-post-title"><a href="store-product.html">So saying he unbuckled</a></h3>
            <div class="nk-product-rating" data-rating="4"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i></div>
            <div class="nk-product-price">€ 23.00</div>
        </div>

        <div class="nk-widget-post">
            <a href="store-product.html" class="nk-post-image">
                <img src="public/assets/images/product-2-xs.jpg" alt="However, I have reason">
            </a>
            <h3 class="nk-post-title"><a href="store-product.html">However, I have reason</a></h3>
            <div class="nk-product-rating" data-rating="2.5"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fas fa-star-half"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></div>
            <div class="nk-product-price">€ 32.00</div>
        </div>

        <div class="nk-widget-post">
            <a href="store-product.html" class="nk-post-image">
                <img src="public/assets/images/product-3-xs.jpg" alt="It was some time before">
            </a>
            <h3 class="nk-post-title"><a href="store-product.html">It was some time before</a></h3>
            <div class="nk-product-rating" data-rating="5"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
            <div class="nk-product-price">€ 14.00</div>
        </div>

    </div>
</div>
<div class="nk-widget nk-widget-highlighted">
    <h4 class="nk-widget-title"><span>Instagram</span></h4>
    <div class="nk-widget-content">
        <div class="nk-instagram row sm-gap vertical-gap multi-column"></div>
    </div>
</div>
<div class="nk-widget nk-widget-highlighted">
    <h4 class="nk-widget-title"><span>Our Twitter</span></h4>
    <div class="nk-widget-content">
        <div class="nk-twitter-list" data-twitter-count="2"></div>
    </div>
</div>

            </aside>
            <!-- END: Sidebar -->
        </div>
    </div>
</div>

<div class="nk-gap-2"></div>

<form id='form_filter'>
  
</form>

<script>
   $('#search-form').submit((e) => {
       e.preventDefault();
       location.href = `?search=${$("input[name=search]").val()}<?= ((request("category")) ? "&category=".request("category") : "") ?><?= ((request("plt")) ? "&plt=".request("plt") : "") ?><?= ((request("pgt")) || (request("pgt")==0) ? "&pgt=".request("pgt") : "") ?><?= ((request("sort")) ? "&sort=".request("sort") : "") ?>`;
   })
   $('#sort-select').change(() => {
    location.href = `?sort=${$("#sort-select").val()}<?= ((request("category")) ? "&category=".request("category") : "") ?><?= ((request("plt")) ? "&plt=".request("plt") : "") ?><?= ((request("pgt")) || (request("pgt")==0)  ? "&pgt=".request("pgt") : "") ?><?= ((request("search")) ? "&search=".request("search") : "") ?>`
   
   })
   $('#btn_filter_price').click(() => {
    let minPrice = $(".nk-input-slider-value-0").text()
    let maxPrice = $(".nk-input-slider-value-1").text()
    location.href = `?pgt=${minPrice}&plt=${maxPrice}<?= ((request("category")) ? "&category=".request("category") : "") ?><?= ((request("sort")) ? "&sort=".request("sort") : "") ?><?= ((request("search")) ? "&search=".request("search") : "") ?>`;
   })
</script>
@endsection
