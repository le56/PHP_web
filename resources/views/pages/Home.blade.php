@extends('welcome')
@section('content')
<style>
    .nk-product-image img {
        height: 100% !important;
        object-fit: cover;
    }

    .max-2-line {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    .max-4-line {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 4;
    }
</style>
<div class="nk-gap-2"></div>
<div class="container">
    <x-slider />

    <!-- START: Categories -->
    <div class="nk-gap-2"></div>
    <x-view-game></x-view-game>
    <!-- END: Categories -->

    <!-- START: Latest News -->
    <div class="nk-gap-2"></div>
    <h3 class="nk-decorated-h-2" style="font-weight: none"><span><span class="text-main-1">Hot</span> News</span></h3>
    <div class="nk-gap"></div>
    
    <div style="position: relative; display: flex;">
        <img style="width: 40%; height: auto; position: absolute; left: -50px;" src="{{ asset('public/images/Jett_-_Full_body.png') }}" alt="">
        <x-card-of-new></x-card-of-new>
    </div>

    <!-- <div class="nk-gap-2"></div>
    <div class="nk-blog-grid">
        <div class="row">
            @foreach($postList as $post)
            <div class="col-md-6 col-lg-3">
                <div class="nk-blog-post">
                    <a href="blog-article.html" class="nk-post-img">
                        <img src="{{ asset('public/images/'.$post->image) }}" alt="{{$post->title}}">
                    </a>
                    <div class="nk-gap"></div>
                    <h2 class="nk-post-title h4"><a  class="max-2-line" href="blog-article.html">{{$post->title}}</a></h2>
                    <div class="nk-post-text">
                        <p class="max-4-line">{{$post->shortContent}}</p>
                    </div>
                    <div class="nk-gap"></div>
                    <a href="blog-article.html" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Read More </a>
                </div>
                {{date('d-m-Y', strtotime($post->created_at))}}
            </div>
            @endforeach

        </div>
    </div> -->

    <!-- END: Latest News -->

    <div class="nk-gap-2"></div>


    <div class="row vertical-gap">
        <div class="col-lg-8">

            <!-- START: Latest Posts -->
          <!--   <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> Posts</span></h3>
            <div class="nk-gap"></div>
            <div class="nk-blog-grid">
                <div class="row">
                    @foreach($lastpost as $post)
                    <div class="col-md-6">
                   
                        <div class="nk-blog-post">
                            <a href="blog-article.html" class="nk-post-img">
                                <img src="{{ asset('public/images/'.$post->image) }}" alt="{{$post->title}}">
                                <span class="nk-post-comments-count">13</span>
                            </a>
                            <div class="nk-gap"></div>
                            <h2 class="nk-post-title h4"><a href="blog-article.html">{{$post->title}}</a></h2>
                            <div class="nk-post-by">
                                <img src="" alt="Wolfenstein" class="rounded-circle" width="35"> By <a href="#"></a> in {{date('d-m-Y', strtotime($post->created_at))}}
                            </div>
                            <div class="nk-gap"></div>
                            <div class="nk-post-text">
                                <p>{{$post->ShortContent}}</p>
                            </div>
                            <div class="nk-gap"></div>
                            <a href="blog-article.html" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Read More</a>
                        </div>
                     
                    </div>
                    @endforeach
                </div>
            </div> -->
            <!-- END: Latest Posts -->

            <!-- START: Latest Matches -->
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> Matches</span></h3>
            <div class="nk-gap"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="nk-match-score bg-dark-3">
                        Now Playing
                    </div>
                    <div class="nk-gap-2"></div>
                    @foreach($nowMatch as $match)
                    <div class="nk-widget-match p-0">
                        <div class="nk-widget-match-teams">
                            <div class="nk-widget-match-team-logo">
                                <img src="{{ asset('public/assets/images/'.$match->logoTeam1) }}" alt="">
                            </div>
                            <div class="nk-widget-match-vs">VS</div>
                            <div class="nk-widget-match-team-logo">
                                <img src="{{ asset('public/assets/images/'.$match->logoTeam2) }}" alt="">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="nk-gap-2"></div>
                    <a href="tournaments.html" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Match Details</a>
                </div>
                <div class="col-md-8">
                    <script>
                        var s = "!!!=ejw!dmbtt>#sftqpotjwf.fncfe!sftqpotjwf.fncfe.27y:#?!!!!!!!!!!!!!!!!!!!!=jgsbnf!tsd>#iuuqt;00qmbzfs/uxjudi/uw0@wjefp>224777:581\'qbsfou>mpdbmiptu#!gsbnfcpsefs>#1#!bmmpxgvmmtdsffo>#usvf#!tdspmmjoh>#op#!ifjhiu>#489#!xjeui>#731#?=0jgsbnf?!!!!!!!!!!!!!!!!!!!!=0ejw?";
                        var m = "";
                        for (var i = 0; i < s.length; i++) m += String.fromCharCode(s.charCodeAt(i) - 1);
                        document.write(m);
                    </script>
                </div>
            </div>
            <div class="nk-gap"></div>
            <x-last-Match></x-last-Match>
            <!-- END: Latest Matches -->
            <x-tabbed-news></x-tabbed-news>
            <!-- START: Latest Pictures -->
            <x-last-picture></x-last-picture>
            <!-- END: Latest Pictures -->
            <!-- START: Best Selling -->
            <div class="nk-gap-3"></div>
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Best</span> Selling</span></h3>
            <div class="nk-gap"></div>
            <div class="row vertical-gap">
                @foreach($topsell as $product)
                <div class="col-md-6">
                    <div class="nk-product-cat">
                        <a class="nk-product-image" href="product/{{$product->id}}">
                            <img src="{{ asset('public/images/'.$product->image0) }}" alt="{{$product->title}}">
                        </a>
                        <div class="nk-product-cont">
                            <h3 class="nk-product-title h5"><a href="product/{{$product->id}}">{{$product->title}}</a></h3>
                            <div class="nk-gap-1"></div>
                            <div class="nk-product-rating" data-rating="3">
                                @for ($i = 1; $i <=5; $i++) @if ($i < $product->rate)
                                    <i class="fa fa-star"></i>
                                    @elseif($i === $product->rate)
                                    <!--  <i class="fas fa-star-half-alt"></i> --><i class="fa fa-star"></i>
                                    @else <i class="far fa-star"></i>
                                    @endif
                                    @endfor
                            </div>
                            <div class="nk-gap-1"></div>
                            <div class="nk-product-price">€ {{$product->price}}</div>
                            <div class="nk-gap-1"></div>
                            <button data-add-product-cart="{{$product->id}}" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Add to Cart</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- END: Best Selling -->
        </div>
        <x-side-bar></x-side-bar>
    </div>
</div>
<div class="nk-gap-4"></div>
@endsection