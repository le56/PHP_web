@extends('welcome')
@section('blog')
<style>
    .nk-blog-post a {
        border-radius: 10px;
    }
</style>
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">


        <li><a href="index.html">Home</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><a href="#">Blog</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><span>Blog Grid</span></li>

    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->




<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">

            <!-- START: Posts Grid -->
            <div class="nk-blog-grid">
                <div class="row">
                    @foreach ($blogs as $blog)
                    <div class="col-md-6">
                        <!-- START: Post -->
                        <div class="nk-blog-post">
                            <a href="{{URL::to('/blog')}}/{{$blog->id}}" class="nk-post-img">
                                <img src="{{asset('/public/images')}}/{{$blog->image}}" alt="{{$blog->title}}">
                                <span class="nk-post-comments-count">0</span>
                            </a>
                            <div class="nk-gap"></div>
                            <h2 class="nk-post-title h4"><a href="{{URL::to('/blog')}}/{{$blog->id}}">{{$blog->title}}</a></h2>
                            <div class="nk-post-by">
                                <img src="{{$blog->Admin->admin_avatar}}" alt="Hitman" class="rounded-circle" width="30"> by <a href="#">{{$blog->Admin->admin_name}}</a> {{$blog->created_at}}
                            </div>
                            <div class="nk-gap"></div>
                            <div class="nk-post-text">
                                <p>{{$blog->shortContent}}</p>
                            </div>
                            <div class="nk-gap"></div>
                            <a href="{{URL::to('/blog')}}/{{$blog->id}}" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Read More</a>
                        </div>
                        <!-- END: Post -->
                    </div>
                @endforeach
                </div>

                <!-- START: Pagination -->
                {{ $blogs->links('vendor.pagination.custom') }}
                <!-- END: Pagination -->
            </div>
            <!-- END: Posts Grid -->

        </div>
        <x-side-bar></x-side-bar>
    </div>
</div>

<div class="nk-gap-2"></div>
@endsection