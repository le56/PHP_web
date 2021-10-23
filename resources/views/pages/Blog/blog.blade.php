@extends('welcome')
@section('detailBlog')
<style>
    .nk-post-img img,
    .image img {
        border-radius: 10px;
        width : 100%;
    }
  
        .nk-blockquote p span{
            font-style: initial!important;
            font-family: "Open Sans", sans-serif !important;
        }

</style>
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">
        
        
        <li><a href="index.html">Home</a></li>
        
        
        <li><span class="fa fa-angle-right"></span></li>
        
        <li><a href="#">Blog</a></li>
        
        
        <li><span class="fa fa-angle-right"></span></li>
        
        <li><span>{{$blog->title}}</span></li>
        
    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->

        

        
<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">
            <!-- START: Post -->
            <div class="nk-blog-post nk-blog-post-single">
                <!-- START: Post Text -->
                <div class="nk-post-text mt-0">
                    <div class="nk-post-img">
                        <img src="{{asset('public/images')}}/{{$blog->image}}" alt="{{$blog->image}}">
                    </div>
                    <div class="nk-gap-1"></div>
                    <h1 class="nk-post-title h4">{{$blog->title}}</h1>
                    <div class="nk-post-by">
                        <img src="<?php
                        if($blog->admin===1) {
                            echo $blog->Admin->admin_avatar;
                        }
                        else echo $blog->user->avatar;
                        ?>" 
                        alt="Witch Murder" class="rounded-circle" width="30"> by <a href="#"><?php echo$blog->admin===1? $blog->Admin->admin_name:$blog->user->name ?></a> {{$blog->created_at}}

                        <div class="nk-post-categories">
                            
                            <span class="bg-main-1">{{$blog->getCate->nameCategory}}</span>
                            
                            <!-- <span class="bg-main-2">Adventure</span> -->
                            
                        </div>
                        
                    </div>
                    <div class="nk-gap"></div>
                    <p>{{$blog->shortContent}}</p>

<div class="nk-gap"></div>
<blockquote class="nk-blockquote">
    <div class="nk-blockquote-icon"><span>"</span></div>
    {!! $blog->content !!}
</blockquote>

<div class="nk-gap"></div>

<div>

</div>


                    <div class="nk-gap"></div>
                    <div class="nk-post-share">
                        <span class="h5">Share Article:</span>

                        <ul class="nk-social-links-2">
                            <li><span class="nk-social-facebook" title="Share page on Facebook" data-share="facebook"><span class="fab fa-facebook"></span></span></li>
                            <li><span class="nk-social-google-plus" title="Share page on Google+" data-share="google-plus"><span class="fab fa-google-plus"></span></span></li>
                            <li><span class="nk-social-twitter" title="Share page on Twitter" data-share="twitter"><span class="fab fa-twitter"></span></span></li>
                            <li><span class="nk-social-pinterest" title="Share page on Pinterest" data-share="pinterest"><span class="fab fa-pinterest-p"></span></span></li>

                            <!-- Additional Share Buttons
                                <li><span class="nk-social-linkedin" title="Share page on LinkedIn" data-share="linkedin"><span class="fab fa-linkedin"></span></span></li>
                                <li><span class="nk-social-vk" title="Share page on VK" data-share="vk"><span class="fab fa-vk"></span></span></li>
                            -->
                        </ul>
                    </div>
                </div>
                <!-- END: Post Text -->

                <!-- START: Similar Articles -->
                <div class="nk-gap-2"></div>
                <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Similar</span> Articles</span></h3>
                <div class="nk-gap"></div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <!-- START: Post -->
                        <div class="nk-blog-post">
                            <a href="blog-article.html" class="nk-post-img">
                                <img src="{{asset('public/assets/images/post-3-mid')}}.jpg" alt="We found a witch! May we burn her?">
                                <span class="nk-post-comments-count">7</span>
                                
                                <span class="nk-post-categories">
                                    <span class="bg-main-2">Adventure</span>
                                </span>
                                
                            </a>
                            <div class="nk-gap"></div>
                            <h2 class="nk-post-title h4"><a href="blog-article.html">We found a witch! May we burn her?</a></h2>
                        </div>
                        <!-- END: Post -->
                    </div>
                    
                    <div class="col-md-6">
                        <!-- START: Post -->
                        <div class="nk-blog-post">
                            <a href="blog-article.html" class="nk-post-img">
                                <img src="{{asset('public/assets/images/post-4-mid')}}.jpg" alt="For good, too though, in consequence">
                                <span class="nk-post-comments-count">23</span>
                                
                                <span class="nk-post-categories">
                                    <span class="bg-main-3">Strategy</span>
                                </span>
                                
                            </a>
                            <div class="nk-gap"></div>
                            <h2 class="nk-post-title h4"><a href="blog-article.html">For good, too though, in consequence</a></h2>
                        </div>
                        <!-- END: Post -->
                    </div>
                    
                </div>
                <!-- END: Similar Articles -->

                <!-- START: Comments -->
                <div id="comments"></div>
                <h3 class="nk-decorated-h-2"><span><span class="text-main-1">3</span> Comments</span></h3>
                <div class="nk-gap"></div>
                <div class="nk-comments">
                    <!-- START: Comment -->
                    <div class="nk-comment">
                        <div class="nk-comment-meta">
                            <img src="{{asset('public/assets/images/avatar-2.jpg')}}" alt="Witch Murder" class="rounded-circle" width="35"> by <a href="#">Witch Murder</a> in 20 September, 2018
                            <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 float-right">Reply</a>
                        </div>
                        <div class="nk-comment-text">
                            <p>This sounded nonsense to Alice, so she said nothing, but set off at once toward the Red Queen. To her surprise, she lost sight of her in a moment, and found herself walking in at the front-door again.</p>
                        </div>

                        <!-- START: Comment -->
                        <div class="nk-comment">
                            <div class="nk-comment-meta">
                                <img src="{{asset('public/assets/images/avatar-1.jpg')}}" alt="Hitman" class="rounded-circle" width="35"> by <a href="#">Hitman</a> in 20 September, 2018
                                <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 float-right">Reply</a>
                            </div>
                            <div class="nk-comment-text">
                                <p>To her surprise, she lost sight of her in a moment, and found herself walking in at the front-door again.</p>
                            </div>
                        </div>
                        <!-- END: Comment -->
                    </div>
                    <!-- END: Comment -->

                    <!-- START: Comment -->
                    <div class="nk-comment">
                        <div class="nk-comment-meta">
                            <img src="{{asset('public/assets/images/avatar-3.jpg')}}" alt="Wolfenstein" class="rounded-circle" width="35"> by <a href="#">Wolfenstein</a> in 21 September, 2018
                            <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 float-right">Reply</a>
                        </div>
                        <div class="nk-comment-text">
                            <p>The sight of the tumblers restored Bob Sawyer to a degree of equanimity which he had not possessed since his interview with his landlady. His face brightened up, and he began to feel quite convivial.</p>
                        </div>
                    </div>
                    <!-- END: Comment -->
                </div>
                <!-- END: Comments -->

                <!-- START: Reply -->
                <div class="nk-gap-2"></div>
                <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Leave</span> a Reply</span></h3>
                <div class="nk-gap"></div>
                <div class="nk-reply">
                    <form action="#" class="nk-form" novalidate="novalidate">
                        <div class="row sm-gap vertical-gap">
                            <div class="col-md-4">
                                <input type="email" class="form-control required" name="email" placeholder="Email *">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control required" name="name" placeholder="Name *">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" placeholder="Website">
                            </div>
                        </div>
                        <div class="nk-gap-1"></div>
                        <textarea class="form-control required" name="message" rows="5" placeholder="Message *" aria-required="true"></textarea>
                        <div class="nk-gap-1"></div>
                        <div class="nk-form-response-success"></div>
                        <div class="nk-form-response-error"></div>
                        <button class="nk-btn nk-btn-rounded nk-btn-color-main-1">Post Comment</button>
                    </form>
                </div>
                <!-- END: Reply -->
            </div>
            <!-- END: Post -->
        </div>
        
        <x-side-bar></x-side-bar>
            <!-- END: Sidebar -->
      
    </div>
</div>

<div class="nk-gap-2"></div>

@endsection