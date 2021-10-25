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
                        @foreach($products as $product)
                        <div class="nk-widget-post" >
                            <a href="{{URL::to('/product')}}/{{$product->id}}" class="nk-post-image">
                                <img src="{{ asset('public/images/'.$product->image0) }}" alt="">
                            </a>
                            <h3 class="nk-post-title"><a href="{{URL::to('/product')}}/{{$product->id}}">{{$product->title}}</a></h3>
                            <div class="nk-product-rating" data-rating="4"> @for ($i = 1; $i <=5; $i++) @if ($i < $product->rate)
                                    <i class="fa fa-star"></i>
                                    @elseif($i === $product->rate) <i class="fas fa-star-half-alt"></i>
                                    @else <i class="far fa-star"></i>
                                    @endif
                                    @endfor</div>
                            <div class="nk-product-price">€ {{$product->price}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </aside>

            <!-- END: Sidebar -->
        </div>
    </div>
</div>

<div class="nk-gap-2"></div>
@endsection