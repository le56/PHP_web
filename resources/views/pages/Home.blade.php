@extends('welcome')
@section('content')
<div class="nk-gap-2"></div>
<div class="container">
    <x-slider />

    <!-- START: Categories -->
    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="{{('public/assets/images/icon-mouse.png')}}" alt="">
                </div>
                <div class="nk-feature-cont">
                    <h3 class="nk-feature-title"><a href="#">PC</a></h3>
                    <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="{{('public/assets/images/icon-gamepad.png')}}" alt="">
                </div>
                <div class="nk-feature-cont">
                    <h3 class="nk-feature-title"><a href="#">PS4</a></h3>
                    <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="{{('public/assets/images/icon-gamepad-2.png')}}" alt="">
                </div>
                <div class="nk-feature-cont">
                    <h3 class="nk-feature-title"><a href="#">Xbox</a></h3>
                    <h4 class="nk-feature-title text-main-1"><a href="#">View Games</a></h4>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Categories -->

    <!-- START: Latest News -->
    <div class="nk-gap-2"></div>
    <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> News</span></h3>
    <div class="nk-gap"></div>

    <div class="nk-news-box">
        <div class="nk-news-box-list">
            <div class="nano has-scrollbar">
                <div class="nano-content" tabindex="0" style="right: -17px;">
                    @foreach($newLatest as $new)
                    <div class="nk-news-box-item @if($new->id==1)nk-news-box-item-active @endif">
                        <div class="nk-news-box-item-img">
                            <img src="{{ asset('public/assets/images/'.$new->image_sm) }}" alt="{{$new->title}}">
                        </div>
                        <img src="{{ asset('public/assets/images/'.$new->image) }}" alt="{{$new->title}}" class="nk-news-box-item-full-img">
                        <h3 class="nk-news-box-item-title">{{$new->title}}</h3>

                        <span class="nk-news-box-item-categories">
                            <span class="bg-main-5">{{$new->category}}</span>
                        </span>

                        <div class="nk-news-box-item-text">
                            <p>{{$new->content}}</p>
                        </div>
                        <a href="blog-article.html" class="nk-news-box-item-url">Read More</a>
                        <div class="nk-news-box-item-date"><i class="fas fa-calendar-alt"></i>
                            <path fill="currentColor" d="M436 160H12c-6.6 0-12-5.4-12-12v-36c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48v36c0 6.6-5.4 12-12 12zM12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm116 204c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40z"></path>
                            </svg>{{date('d-m-Y', strtotime($new->created_at))}}
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="nano-pane">
                    <div class="nano-slider" style="height: 269px; transform: translate(0px, 0px);"></div>
                </div>
            </div>
        </div>
        <div class="nk-news-box-each-info">
            <div class="nano has-scrollbar">
                <div class="nano-content" tabindex="0" style="right: -17px;">
                    <!-- There will be inserted info about selected news-->
                    <div class="nk-news-box-item-image">
                        <img src="assets/images/post-1.jpg" alt="Smell magic in the air. Or maybe barbecue">
                        <span class="nk-news-box-item-categories">
                            <span class="bg-main-4">MMO</span>
                        </span>
                    </div>
                    <h3 class="nk-news-box-item-title">Smell magic in the air. Or maybe barbecue</h3>
                    <div class="nk-news-box-item-text">
                        <p>With what mingled joy and sorrow do I take up the pen to write to my dearest friend! Oh, what a change between to-day and yesterday! Now I am friendless and alone...</p>
                    </div>
                    <a href="blog-article.html" class="nk-news-box-item-more">Read More</a>
                    <div class="nk-news-box-item-date"><svg class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true" data-prefix="fa" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M436 160H12c-6.6 0-12-5.4-12-12v-36c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48v36c0 6.6-5.4 12-12 12zM12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm116 204c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40z"></path>
                        </svg><!-- <span class="fa fa-calendar"></span> --> Sep 18, 2018</div>
                </div>
                <div class="nano-pane" style="display: none;">
                    <div class="nano-slider" style="height: 407px; transform: translate(0px, 0px);"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="nk-gap-2"></div>
    <div class="nk-blog-grid">
        <div class="row">
            @foreach($postList as $post)
            <div class="col-md-6 col-lg-3">
                <div class="nk-blog-post">
                    <a href="blog-article.html" class="nk-post-img">
                        <img src="{{ asset('public/assets/images/'.$post->image) }}" alt="{{$post->title}}">
                    </a>
                    <div class="nk-gap"></div>
                    <h2 class="nk-post-title h4"><a href="blog-article.html">{{$post->title}}</a></h2>
                    <div class="nk-post-text">
                        <p>{{$post->content}}</p>
                    </div>
                    <div class="nk-gap"></div>
                    <a href="blog-article.html" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Read More </a>
                </div>
                {{date('d-m-Y', strtotime($post->created_at))}}
            </div>
            @endforeach

        </div>
    </div>
    <!-- END: Latest News -->

    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-8">

            <!-- START: Latest Posts -->
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> Posts</span></h3>
            <div class="nk-gap"></div>
            <div class="nk-blog-grid">
                <div class="row">
                    @foreach($lastpost as $post)
                    <div class="col-md-6">
                        <!-- START: Post -->
                        <div class="nk-blog-post">
                            <a href="blog-article.html" class="nk-post-img">
                                <img src="{{ asset('public/assets/images/'.$post->image) }}" alt="{{$post->title}}">
                                <span class="nk-post-comments-count">13</span>
                            </a>
                            <div class="nk-gap"></div>
                            <h2 class="nk-post-title h4"><a href="blog-article.html">{{$post->title}}</a></h2>
                            <div class="nk-post-by">
                                <img src="{{ asset('public/assets/images/avatar-3.jpg') }}" alt="Wolfenstein" class="rounded-circle" width="35"> By <a href="#">Lê Khánh Dương</a> in {{date('d-m-Y', strtotime($post->created_at))}}
                            </div>
                            <div class="nk-gap"></div>
                            <div class="nk-post-text">
                                <p>{{$post->content}}</p>
                            </div>
                            <div class="nk-gap"></div>
                            <a href="blog-article.html" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Read More</a>
                        </div>
                        <!-- END: Post -->
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- END: Latest Posts -->

            <!-- START: Latest Matches -->
            <div class="nk-gap-2"></div>
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
                            <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Add to Cart</a>
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