 <!-- START: Tabbed News  -->
 <div class="nk-gap-3"></div>
 <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Tabbed</span> News</span></h3>
 <div class="nk-gap"></div>
 <div class="nk-tabs">
     <ul class="nav nav-tabs nav-tabs-fill" role="tablist">
         <li class="nav-item">
             <a class="nav-link active" href="#tabs-1-1" role="tab" data-toggle="tab">Action</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#tabs-1-2" role="tab" data-toggle="tab">MMO</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#tabs-1-3" role="tab" data-toggle="tab">Strategy</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#tabs-1-4" role="tab" data-toggle="tab">Adventure</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#tabs-1-5" role="tab" data-toggle="tab">Racing</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#tabs-1-6" role="tab" data-toggle="tab">Indie</a>
         </li>
     </ul>
     <div class="tab-content">
         <div role="tabpanel" class="tab-pane fade show active" id="tabs-1-1">
             <div class="nk-gap"></div>
             <!-- START: Action Tab -->
             @foreach($bannerAction as $banner )
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <a href="blog-article.html" class="nk-post-img">
                     <img src="{{ asset('public/assets/images/'.$banner->image_banner) }}" alt="{{$banner->title}}">
                     <span class="nk-post-categories">
                         <span class="bg-main-1">{{$banner->category}}</span>
                     </span>
                 </a>
                 <div class="nk-gap-1"></div>
                 <h2 class="nk-post-title h4"><a href="blog-article.html">{{$banner->title}}</a></h2>
                 <div class="nk-post-date mt-10 mb-10">
                     <i class="fas fa-calendar"></i>&emsp;{{ date('d-m-Y', strtotime($banner->created_at))}}
                 </div>
                 <div class="nk-post-text">
                     <p>{{$banner->content}}</p>
                 </div>
             </div>
             @endforeach
             @foreach($actions as $action )
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <div class="row vertical-gap">
                     <div class="col-lg-3 col-md-5">
                         <a href="blog-article.html" class="nk-post-img">
                             <img src="{{ asset('public/assets/images/'.$action->image) }}" alt="{{$action->title}}">
                             <span class="nk-post-categories">
                                 <span class="bg-main-1">{{$action->category}}</span>
                             </span>
                         </a>
                     </div>
                     <div class="col-lg-9 col-md-7">
                         <h2 class="nk-post-title h4"><a href="blog-article.html">{{$action->title}}</a></h2>
                         <div class="nk-post-date mt-10 mb-10">
                             <i class="fas fa-calendar"></i>&emsp;{{date('d-m-Y', strtotime($action->created_at))}}
                         </div>
                         <div class="nk-post-text">
                             <p>{{$action->content}}</p>
                         </div>
                     </div>
                 </div>
             </div>
             @endforeach
             <!-- END: Action Tab -->
             <div class="nk-gap"></div>
         </div>
         <div role="tabpanel" class="tab-pane fade" id="tabs-1-2">
             <div class="nk-gap"></div>
             <!-- START: MMO Tab -->
             @foreach($bannerMmo as $mmo)
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <a href="blog-article.html" class="nk-post-img">
                     <img src="{{ asset('public/assets/images/'.$mmo->image_banner) }}" alt="{{$mmo->title}}">

                     <span class="nk-post-categories">
                         <span class="bg-main-4">{{$action->category}}</span>
                     </span>
                 </a>
                 <div class="nk-gap-1"></div>
                 <h2 class="nk-post-title h4"><a href="blog-article.html">{{$mmo->title}}</a></h2>
                 <div class="nk-post-date mt-10 mb-10">
                     <i class="fas fa-calendar"></i>&emsp;{{date('d-m-Y', strtotime($mmo->created_at))}}
                 </div>
                 <div class="nk-post-text">
                     <p> {{$mmo->content}}</p>
                 </div>
             </div>
             @endforeach
             @foreach($categoryMmo as $mo)
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <div class="row vertical-gap">
                     <div class="col-lg-3 col-md-5">
                         <a href="blog-article.html" class="nk-post-img">
                             <img src="{{ asset('public/assets/images/'.$mo->image) }}" alt="{{$mo->title}}">
                             <span class="nk-post-categories">
                                 <span class="bg-main-4">{{$mo->category}}</span>
                             </span>
                         </a>
                     </div>
                     <div class="col-lg-9 col-md-7">
                         <h2 class="nk-post-title h4"><a href="blog-article.html">{{$mo->title}}</a></h2>
                         <div class="nk-post-date mt-10 mb-10">
                             <div class="nk-post-date mt-10 mb-10">
                                 <i class="fas fa-calendar"></i>&emsp;{{date('d-m-Y', strtotime($mo->created_at))}}
                             </div>
                         </div>
                         <div class="nk-post-text">
                             <p>{{$mo->content}}</p>
                         </div>
                     </div>
                 </div>
             </div>
             @endforeach
             <!-- END: MMO Tab -->
             <div class="nk-gap"></div>
         </div>
         <div role="tabpanel" class="tab-pane fade" id="tabs-1-3">
             <div class="nk-gap"></div>
             <!-- START: Strategy Tab -->
             @foreach($Strategy as $strategy)
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <a href="blog-article.html" class="nk-post-img">
                     <img src="{{ asset('public/assets/images/'.$strategy->image_banner) }}" alt="{{$strategy->title}}">

                     <span class="nk-post-categories">
                         <span class="bg-main-3">{{$strategy->category}}</span>
                     </span>

                 </a>
                 <div class="nk-gap-1"></div>
                 <h2 class="nk-post-title h4"><a href="blog-article.html">{{$strategy->title}}</a></h2>
                 <div class="nk-post-date mt-10 mb-10">
                     <i class="fas fa-calendar"></i>&emsp;{{date('d-m-Y', strtotime($strategy->created_at))}}
                 </div>
                 <div class="nk-post-text">
                     <p>{{$strategy->content}}</p>
                 </div>
             </div>
             @endforeach
             @foreach($bannerStrategy as $strategy)
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <div class="row vertical-gap">
                     <div class="col-lg-3 col-md-5">
                         <a href="blog-article.html" class="nk-post-img">
                             <img src="{{ asset('public/assets/images/'.$strategy->image) }}" alt="{{$strategy->title}}">
                             <span class="nk-post-categories">
                                 <span class="bg-main-3">{{$strategy->category}}</span>
                             </span>
                         </a>
                     </div>
                     <div class="col-lg-9 col-md-7">
                         <h2 class="nk-post-title h4"><a href="blog-article.html">{{$strategy->title}}</a></h2>
                         <div class="nk-post-date mt-10 mb-10">
                             <i class="fas fa-calendar"></i>&emsp;{{date('d-m-Y', strtotime($strategy->created_at))}}
                         </div>
                         <div class="nk-post-text">
                             {{$strategy->content}}
                         </div>
                     </div>
                 </div>
             </div>
             @endforeach
             <!-- END: Strategy Tab -->
             <div class="nk-gap"></div>
         </div>
         <div role="tabpanel" class="tab-pane fade" id="tabs-1-4">
             <div class="nk-gap"></div>
             <!-- START: Adventure Tab -->
             @foreach($bannerAdventure as $adventure)
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <a href="blog-article.html" class="nk-post-img">
                     <img src="{{ asset('public/assets/images/'.$adventure->image_banner) }}" alt="{{$adventure->title}}">
                     <span class="nk-post-categories">
                         <span class="bg-main-2">{{$adventure->category}}</span>
                     </span>
                 </a>
                 <div class="nk-gap-1"></div>
                 <h2 class="nk-post-title h4"><a href="blog-article.html"> {{$adventure->title}}</a></h2>
                 <div class="nk-post-date mt-10 mb-10">
                     <i class="fas fa-calendar"></i>&emsp;{{date('d-m-Y', strtotime($strategy->created_at))}}
                 </div>
                 <div class="nk-post-text">
                     <div class="nk-post-text">
                         {{$adventure->content}}
                     </div>
                 </div>
             </div>
             @endforeach
             @foreach($Adventure as $adventure)
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <div class="row vertical-gap">
                     <div class="col-lg-3 col-md-5">
                         <a href="blog-article.html" class="nk-post-img">
                             <img src="{{ asset('public/assets/images/'.$adventure->image) }}" alt="{{$adventure->title}}">
                             <span class="nk-post-categories">
                                 <span class="bg-main-2">{{$adventure->category}}</span>
                             </span>
                         </a>
                     </div>
                     <div class="col-lg-9 col-md-7">
                         <h2 class="nk-post-title h4"><a href="blog-article.html">{{$adventure->title}}</a></h2>
                         <div class="nk-post-date mt-10 mb-10">
                             <i class="fas fa-calendar"></i>&emsp;{{date('d-m-Y', strtotime($adventure->created_at))}}
                         </div>
                         <div class="nk-post-text">
                             {{$adventure->content}}
                         </div>
                     </div>
                 </div>
             </div>
             @endforeach
             <!-- END: Adventure Tab -->
             <div class="nk-gap"></div>
         </div>
         <div role="tabpanel" class="tab-pane fade" id="tabs-1-5">
             <div class="nk-gap"></div>
             <!-- START: Racing Tab -->
             @foreach($bannerRacing as $racing)
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <a href="blog-article.html" class="nk-post-img">
                     <img src="{{ asset('public/assets/images/'.$racing->image_banner) }}" alt="{{$racing->title}}">
                     <span class="nk-post-categories">
                         <span class="bg-main-5">{{$racing->category}}</span>
                     </span>
                 </a>
                 <div class="nk-gap-1"></div>
                 <h2 class="nk-post-title h4"><a href="blog-article.html"> {{$racing->title}}</a></h2>
                 <div class="nk-post-date mt-10 mb-10">
                     <i class="fas fa-calendar"></i>&emsp;{{date('d-m-Y', strtotime($racing->created_at))}}
                 </div>
                 <div class="nk-post-text">
                     <div class="nk-post-text">
                         {{$racing->content}}
                     </div>
                 </div>
             </div>
             @endforeach
             @foreach($Racing as $racing)
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <div class="row vertical-gap">
                     <div class="col-lg-3 col-md-5">
                         <a href="blog-article.html" class="nk-post-img">
                             <img src="{{ asset('public/assets/images/'.$racing->image) }}" alt="{{$racing->title}}">
                             <span class="nk-post-categories">
                                 <span class="bg-main-2">{{$racing->category}}</span>
                             </span>
                         </a>
                     </div>
                     <div class="col-lg-9 col-md-7">
                         <h2 class="nk-post-title h4"><a href="blog-article.html">{{$racing->title}}</a></h2>
                         <div class="nk-post-date mt-10 mb-10">
                             <i class="fas fa-calendar"></i>&emsp;{{date('d-m-Y', strtotime($racing->created_at))}}
                         </div>
                         <div class="nk-post-text">
                             {{$racing->content}}
                         </div>
                     </div>
                 </div>
             </div>
             @endforeach
             <!-- END: Racing Tab -->
             <div class="nk-gap"></div>
         </div>
         <div role="tabpanel" class="tab-pane fade" id="tabs-1-6">
             <div class="nk-gap"></div>
             <!-- START: Indie Tab -->
             @foreach($bannerIndie as $indie)
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <a href="blog-article.html" class="nk-post-img">
                     <img src="{{ asset('public/assets/images/'.$indie->image_banner) }}" alt="{{$indie->title}}">
                     <span class="nk-post-categories">
                         <span class="bg-main-2">{{$indie->category}}</span>
                     </span>
                 </a>
                 <div class="nk-gap-1"></div>
                 <h2 class="nk-post-title h4"><a href="blog-article.html"> {{$indie->title}}</a></h2>
                 <div class="nk-post-date mt-10 mb-10">
                     <i class="fas fa-calendar"></i>&emsp;{{date('d-m-Y', strtotime($indie->created_at))}}
                 </div>
                 <div class="nk-post-text">
                     <div class="nk-post-text">
                         {{$indie->content}}
                     </div>
                 </div>
             </div>
             @endforeach
             @foreach($Indie as $indie)
             <div class="nk-blog-post nk-blog-post-border-bottom">
                 <div class="row vertical-gap">
                     <div class="col-lg-3 col-md-5">
                         <a href="blog-article.html" class="nk-post-img">
                             <img src="{{ asset('public/assets/images/'.$indie->image) }}" alt="{{$indie->title}}">
                             <span class="nk-post-categories">
                                 <span class="bg-main-2">{{$indie->category}}</span>
                             </span>
                         </a>
                     </div>
                     <div class="col-lg-9 col-md-7">
                         <h2 class="nk-post-title h4"><a href="blog-article.html">{{$indie->title}}</a></h2>
                         <div class="nk-post-date mt-10 mb-10">
                             <i class="fas fa-calendar"></i>&emsp;{{date('d-m-Y', strtotime($indie->created_at))}}
                         </div>
                         <div class="nk-post-text">
                             {{$indie->content}}
                         </div>
                     </div>
                 </div>
             </div>
             @endforeach
             <!-- END: Indie Tab -->
             <div class="nk-gap"></div>
         </div>
     </div>
 </div>
 <!-- END: Tabbed News -->