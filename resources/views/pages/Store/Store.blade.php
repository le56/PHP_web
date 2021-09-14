@extends('welcome')
@section('store')
<!-- END: Navbar Mobile -->

    <!-- START: Breadcrumbs -->
    <div class="nk-gap-1"></div>
    <div class="container">
        <ul class="nk-breadcrumbs">


            <li><a href="index.html">Home</a></li>


            <li><span class="fa fa-angle-right"></span></li>

            <li><span>Store</span></li>

        </ul>
    </div>
    <div class="nk-gap-1"></div>
    <!-- END: Breadcrumbs -->




    <div class="container">
        <!-- START: Categories -->
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

        <!-- START: Some Products -->
        <div class="nk-gap-2"></div>
        <div class="row vertical-gap">
            <div class="col-md-6 col-lg-4">
                <div class="nk-gallery-item-box">
                    <a href="store-product.html" class="nk-gallery-item">
                        <span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                        <img src="public/assets/images/product-4-lg.jpg" alt="She was bouncing">
                    </a>
                    <div class="nk-gallery-item-label">
                        <h4 class="mb-0">She was bouncing</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 order-lg-3">
                <div class="nk-gallery-item-box">
                    <a href="store-product.html" class="nk-gallery-item">
                        <span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                        <img src="public/assets/images/product-2-lg.jpg" alt="However, I have reason">
                    </a>
                    <div class="nk-gallery-item-label">
                        <h4 class="mb-0">However, I have reason</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="row vertical-gap">
                    <div class="col-md-6">
                        <div class="nk-gallery-item-box">
                            <a href="store-product.html" class="nk-gallery-item">
                                <span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                                <img src="public/assets/images/product-3-lg.jpg" alt="It was some time before">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="nk-gallery-item-box">
                            <a href="store-product.html" class="nk-gallery-item">
                                <span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                                <img src="public/assets/images/product-1-lg.jpg" alt="So saying he unbuckled">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="nk-gallery-item-box">
                            <a href="store-product.html" class="nk-gallery-item">
                                <span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                                <img src="public/assets/images/product-5-lg.jpg" alt="In all revolutions of">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="nk-gallery-item-box">
                            <a href="store-product.html" class="nk-gallery-item">
                                <span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                                <img src="public/assets/images/product-6-lg.jpg" alt="Just then her head ">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Some Products -->

        <!-- START: Top 10 Best Sellers -->
        <div class="nk-gap-3"></div>
        <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Top 10</span> Best Sellers</span></h3>
        <div class="nk-gap"></div>
        <div class="nk-carousel nk-carousel-x4" data-autoplay="5000" data-dots="false" data-cell-align="left" data-arrows="true">
            <div class="nk-carousel-inner">


                @foreach($ListImageXS as $product)
                <div>
                    <div class="pl-5 pr-5">
                        <div class="nk-product-cat-3">
                            <a class="nk-product-image" href="product/{{$product->id}}">
                                <img src="{{ asset('public/assets/images/'.$product->image) }}" alt="{{$product->title}}">
                            </a>
                            <div class="nk-product-cont">
                                <div class="nk-gap-1"></div>
                                <h3 class="nk-product-title h5"><a href="product/{{$product->id}}">{{$product->title}}</a></h3>
                                <div class="nk-gap-1"></div>
                                <div class="nk-product-price">€ {{$product->price}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- END: Top 10 Best Sellers -->

        <!-- START: Featured Games -->
        <div class="nk-gap-3"></div>
        <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Featured</span> Games</span></h3>
        <div class="nk-gap"></div>
        <div class="row vertical-gap">

            @foreach($products as $product)

            <div class="col-lg-6">
                <div class="nk-product-cat-2">
                    <a class="nk-product-image" href="product/{{$product->id}}">
                        <img src="{{ asset('public/assets/images/'.$product->image) }}" alt="{{$product->title}}">
                    </a>
                    <div class="nk-product-cont">
                        <h3 class="nk-product-title h5"><a href="product/{{$product->id}}">{{$product->title}}</a></h3>
                        <div class="nk-gap-1"></div>
                        <div class="nk-product-rating">
                            @for ($i = 1; $i <=5; $i++)
                                @if ($i < $product->rate)
                                    <i class="fa fa-star"></i>
                                @elseif($i === $product->rate) <i class="fas fa-star-half-alt"></i>
                                @else  <i class="far fa-star"></i>
                                @endif
                            @endfor</div>
                        <div class="nk-gap-1"></div>
                        {{$product->content}}
                        <div class="nk-gap-2"></div>
                        <div class="nk-product-price">€ {{$product->price}}</div>
                        <div class="nk-gap-1"></div>
                        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Add to Cart</a>
                    </div>
                </div>
            </div>
                @break($loop->index == 3)
            @endforeach



        </div>
        <!-- END: Featured Games -->

        <!-- START: Most Popular -->
        <div class="nk-gap-3"></div>
        <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Most</span> Popular</span></h3>
        <div class="nk-gap"></div>
        <div class="row vertical-gap">

            @foreach($ListImageXS as $product)
                @break($loop->index == 6)
            <div class="col-lg-4 col-md-6">
                <div class="nk-product-cat">
                    <a class="nk-product-image" href="product/{{$product->id}}">
                        <img src="{{ asset('public/assets/images/'.$product->image) }}" alt="{{$product->title}}">
                    </a>
                    <div class="nk-product-cont">
                        <h3 class="nk-product-title h5"><a href="product/{{$product->id}}">{{$product->title}}</a></h3>
                        <div class="nk-gap-1"></div>
                        <div class="nk-product-rating">
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
                    </div>
                </div>
            </div>
            @endforeach


        <!-- END: Most Popular -->
    </div>

    <div class="nk-gap-2"></div>
</div>

@endsection
