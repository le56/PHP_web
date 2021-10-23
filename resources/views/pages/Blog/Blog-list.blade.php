@extends('welcome')
@section('blog')
<!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">


        <li><a href="index.html">Home</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><a href="#">Blog</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><span>Blog List</span></li>

    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->




<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">

            <!-- START: Posts List -->
            <div class="nk-blog-list">


            @foreach ($blogs as $blog)

                <!-- START: Post -->
                <div class="nk-blog-post">
                    <div class="row vertical-gap">
                        <div class="col-md-5 col-lg-6">
                            <a href="{{URL::to('/blog')}}/{{$blog->id}}" class="nk-post-img">
                                <img src="{{asset('/public/images')}}/{{$blog->image}}" alt="{{$blog->title}}" />
                              <!--   <span class="nk-post-comments-count">0</span> -->
                            </a>
                        </div>
                        <div class="col-md-7 col-lg-6">
                            <h2 class="nk-post-title h4"><a href="{{URL::to('/blog')}}/{{$blog->id}}">{{$blog->title}}</a></h2>

                            <div class="nk-post-text">
                                <p>{{$blog->shortContent}}</p>
                            </div>

                            <div class="nk-post-by">
                                <img src="{{$blog->Admin->admin_avatar}}" alt="Hitman" class="rounded-circle" width="35"> by <a href="#">{{$blog->Admin->admin_name}}</a> {{$blog->created_at}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Post -->

            @endforeach

                <!-- START: Pagination -->
                {{ $blogs->links('vendor.pagination.custom') }}
                <!-- END: Pagination -->
            </div>
            <!-- END: Posts List -->

        </div>
        <div class="col-lg-4">
            <!--
                    START: Sidebar

                    Additional Classes:
                        .nk-sidebar-left
                        .nk-sidebar-right
                        .nk-sidebar-sticky
                -->
            <aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
               
           
            
             
               
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

            </aside>
            
            <!-- END: Sidebar -->
        </div>
    </div>
</div>

<div class="nk-gap-2"></div>
@endsection