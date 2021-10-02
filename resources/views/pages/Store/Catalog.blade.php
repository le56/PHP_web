@extends('welcome')
@section('catalog')
<style>
   .nk-product-image img {
        height: 100% !important;
        object-fit: cover;
        border-radius:5px
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

    <!-- START: Image Slider -->
    <div class="nk-image-slider" data-autoplay="8000">


        <div class="nk-image-slider-item">
            <img src="public/assets/images/slide-1.jpg" alt="" class="nk-image-slider-img" data-thumb="public/assets/images/slide-1-thumb.jpg">

            <div class="nk-image-slider-content">

        <h3 class="h4">As we Passed, I remarked</h3>
        <p class="text-white">As we passed, I remarked a beautiful church-spire rising above some old elms in the park; and before them, in the midst of a lawn, chimneys covered with ivy, and the windows shining in the sun.</p>
        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>

            </div>

        </div>

        <div class="nk-image-slider-item">
            <img src="public/assets/images/slide-2.jpg" alt="" class="nk-image-slider-img" data-thumb="public/assets/images/slide-2-thumb.jpg">

            <div class="nk-image-slider-content">

        <h3 class="h4">He made his passenger captain of one</h3>
        <p class="text-white">Now the races of these two have been for some ages utterly extinct, and besides to discourse any further of them would not be at all to my purpose. But the concern I have most at heart is for our Corporation of Poets, from whom I am preparing a petition to your Highness,  to be subscribed with the names of one...</p>
        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>

            </div>

        </div>

        <div class="nk-image-slider-item">
            <img src="public/assets/images/slide-3.jpg" alt="" class="nk-image-slider-img" data-thumb="public/assets/images/slide-3-thumb.jpg">

        </div>

        <div class="nk-image-slider-item">
            <img src="public/assets/images/slide-4.jpg" alt="" class="nk-image-slider-img" data-thumb="public/assets/images/slide-4-thumb.jpg">

            <div class="nk-image-slider-content">

        <h3 class="h4">At length one of them called out in a clear</h3>
        <p class="text-white">TJust then her head struck against the roof of the hall: in fact she was now more than nine feet high...</p>
        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>

            </div>

        </div>

        <div class="nk-image-slider-item">
            <img src="public/assets/images/slide-5.jpg" alt="" class="nk-image-slider-img" data-thumb="public/assets/images/slide-5-thumb.jpg">

            <div class="nk-image-slider-content">

        <h3 class="h4">For good, too though, in consequence</h3>
        <p class="text-white">She gave my mother such a turn, that I have always been convinced I am indebted to Miss Betsey for having been born on a Friday. The word was appropriate to the moment.</p>
        <p class="text-white">My mother was so much worse that Peggotty, coming in with the teaboard and candles, and seeing at a glance how ill she was, - as Miss Betsey might have done sooner if there had been light enough, - conveyed her upstairs to her own room with all speed; and immediately dispatched Ham Peggotty, her nephew, who had been for some days past secreted in the house...</p>
        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>

            </div>

        </div>

    </div>
    <!-- END: Image Slider -->

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
            <!-- END: Products -->

            <!-- START: Pagination -->
            <div class="nk-gap-3"></div>
            <div class="nk-pagination nk-pagination-center">
                <a href="?page={{$currentPage - 1}}" class="nk-pagination-prev">
                    <span class="ion-ios-arrow-back"></span>
                </a>
                <nav>
                
                    @for ($i = 1; $i <= $countPage; $i++)
                    <a href="?page={{$i}}" class="@if($currentPage == $i)<?php echo 'nk-pagination-current'?>@endif">{{ $i }}</a>
                    @endfor
                </nav>
                <a href="?page={{$currentPage + 1}}" class="nk-pagination-next">
                    <span class="ion-ios-arrow-forward"></span>
                </a>
            </div>
            <!-- END: Pagination -->
        </div>
        <div class="col-lg-4">
           
            <aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
                <div class="nk-widget">
    <div class="nk-widget-content">
        <form class="nk-form nk-form-style-1" novalidate="novalidate">
            <div class="input-group">
                <input type="text" class="form-control" name='search' placeholder="Type something...">
                <button class="nk-btn nk-btn-color-main-1"><span class="ion-search"></span></button>
            </div>
        </form>
    </div>
</div>
<div class="nk-widget nk-widget-highlighted">
    <h4 class="nk-widget-title"><span><span class="text-main-1">Category</span> Menu</span></h4>
    <div class="nk-widget-content">
        <ul class="nk-widget-categories">
         
            @foreach ($categories as $category)
            <li><a href="#">{{$category->nameCategory}}</a></li>
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
                data-slider-value="[200, 1200]"
                data-slider-tooltip="hide"
            >
            <div class="nk-gap"></div>
            <div>
                <div class="text-white mt-4 float-left">
                    PRICE:
                    <strong class="text-main-1">€ <span class="nk-input-slider-value-0"></span></strong>
                    -
                    <strong class="text-main-1">€ <span class="nk-input-slider-value-1"></span></strong>
                </div>
                <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white float-right">Apply</a>
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
  
</script>
@endsection
