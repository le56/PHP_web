@extends('welcome')
@section('product')
<style>
  #tab-description .display-desc img {
      width: 100%;
  }
  .nk-popup-gallery {
    height: 100%;
    flex-direction: column;
    display: flex;
  }
  .nk-popup-gallery .vertical-gap {
    flex-shrink: 0;
    margin-top: 0px;
  }
  .nk-popup-gallery .nk-gallery-item-box {
      flex : 1
  }
  .nk-popup-gallery .nk-gallery-item-box a {
    height: 100%;
    display: block;
  }
  .nk-popup-gallery .nk-gallery-item-box img {
    height: 100%;
    object-fit: cover;
    border-radius: 4px;
  }
  
   .nk-product-image img {
        height: 100% !important;
        object-fit: cover;
        border-radius:5px
    }
  

</style>
    <!-- START: Breadcrumbs -->
    <div class="nk-gap-1"></div>
    <div class="container">
        <ul class="nk-breadcrumbs">


            <li><a href="index.html">Home</a></li>


            <li><span class="fa fa-angle-right"></span></li>

            <li><a href="store.html">Store</a></li>


            <li><span class="fa fa-angle-right"></span></li>

            <li><a href="store-catalog.html">Action Games</a></li>


            <li><span class="fa fa-angle-right"></span></li>

            <li><span>Just then her head </span></li>

        </ul>
    </div>
    <div class="nk-gap-1"></div>
    <!-- END: Breadcrumbs -->




    <div class="container">
        <div class="row vertical-gap">
            <div class="col-lg-8">
                <div class="nk-store-product">
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            <!-- START: Product Photos -->
                            <div class="nk-popup-gallery">
                                <div class="nk-gallery-item-box">
                                    <a href="{{ asset('public/images/'.$product->image0) }}" class="nk-gallery-item" data-size="1200x554">
                                        <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                        <img src="{{ asset('public/images/'.$product->image0) }}" alt="">
                                    </a>
                                </div>

                                <div class="nk-gap-1"></div>
                                <div class="row vertical-gap sm-gap">
                                    <div class="col-6 col-md-4">
                                        <div class="nk-gallery-item-box">
                                            <a href="{{ asset('public/images/'.$product->image1) }}" class="nk-gallery-item" data-size="622x942">
                                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                                <img src="{{ asset('public/images/'.$product->image1) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="nk-gallery-item-box">
                                            <a href="{{ asset('public/images/'.$product->image2) }}" class="nk-gallery-item" data-size="1920x907">
                                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                                <img src="{{ asset('public/images/'.$product->image2) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="nk-gallery-item-box">
                                            <a href="{{ asset('public/images/'.$product->image3) }}" class="nk-gallery-item" data-size="1500x750">
                                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                                <img src="{{ asset('public/images/'.$product->image3) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Product Photos -->
                        </div>
                        <div class="col-md-6">

                            <h2 class="nk-product-title h3">Just then her head </h2>

                            <select class="form-control">
                                <option value="" disabled selected>Select Platform</option>
                                <option value="ps4">PS4</option>
                                <option value="xbox">Xbox 1</option>
                                <option value="pc">PC</option>
                            </select>

                            <div class="nk-product-description">
                                <p>{{$product->content}}</p>
                            </div>

                            <!-- START: Add to Cart -->
                            <div class="nk-gap-2"></div>
                            <form action="#" class="nk-product-addtocart">
                                <div class="nk-product-price">€ {{$product->price}}</div>
                                <div class="nk-gap-1"></div>
                                <div class="input-group">
                                    <input type="number" id="input-addToCart-detailsPage" class="form-control" value="1" min="1" max="21">
                                    <button id="btn-addToCart-detailsPage" data-add-product-cart-details="{{$product->id}}" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Add to Cart</button>
                                </div>
                            </form>
                            <div class="nk-gap-3"></div>
                            <!-- END: Add to Cart -->

                            <!-- START: Meta -->
                            <div class="nk-product-meta">
                                <div><strong>SKU</strong>: 300-200-503</div>
                                <div><strong>Categories</strong>: 
                                @foreach($categories as $category)
                                  <a href="#">{{$category->nameCategory}}</a>, 
                                @endforeach
                            </div>
                                <div><strong>Tags</strong>: <a href="#">blizzard</a>, <a href="#">action</a>, <a href="#">MMO</a></div>
                            </div>
                            <!-- END: Meta -->
                        </div>
                    </div>

                    <!-- START: Share -->
                    <div class="nk-gap-2"></div>
                    <div class="nk-post-share">
                        <span class="h5">Share Product:</span>
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
                    <!-- END: Share -->

                    <div class="nk-gap-2"></div>
                    <!-- START: Tabs -->
                    <div class="nk-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab-description" role="tab" data-toggle="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#tab-reviews" role="tab" data-toggle="tab">Reviews (<span id="total_rewiew">{{$totalComment}}</span>)</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <!-- START: Tab Description -->
                            <div role="tabpanel" class="tab-pane fade show active" id="tab-description">
                                <div class="nk-gap"></div>
                                <strong class="text-white">Release Date: 24/05/2018</strong>
                                <div class="nk-gap"></div>
                               <div class="display-desc">
                               {!! $product->description !!}
                               </div>

                                <div class="nk-product-info-row row vertical-gap">
                                    <div class="col-md-5">
                                        <div class="nk-product-pegi">
                                            <div class="nk-gap"></div>
                                            <img src="{{asset('public/assets/images/pegi-icon.jpg')}}" alt="">
                                            <div class="nk-product-pegi-cont">
                                                <strong class="text-white">Pegi Rating:</strong>
                                                <div class="nk-gap"></div>
                                                Suitable for people aged 12 and over.
                                            </div>
                                            <div class="nk-gap"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="nk-gap"></div>
                                        <strong class="text-white">Genre:</strong>
                                        <div class="nk-gap"></div>
                                        TBD
                                        <div class="nk-gap"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="nk-gap"></div>
                                        <strong class="text-white">Customer Rating:</strong>
                                        <div class="nk-gap"></div>
                                        <div class="nk-product-rating" data-rating="4.5">  @for ($i = 1; $i <=5; $i++)
                                                @if ($i < $product->rate)
                                                    <i class="fa fa-star"></i>
                                                @elseif($i === $product->rate) <i class="fas fa-star-half-alt"></i>
                                                @else  <i class="far fa-star"></i>
                                                @endif
                                            @endfor</div>
                                        <div class="nk-gap"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Tab Description -->

                            <!-- START: Tab Reviews -->
                            <div role="tabpanel" class="tab-pane fade" id="tab-reviews">
                                <div class="nk-gap-2"></div>
                                <!-- START: Reply -->
                                <h3 class="h4">Add a Review</h3>
                                <div class="nk-reply">
                                    <form id="comment_form" action="{{URL::to('/product/comment')}}" method="get" class="nk-form">
                                        <input type="hidden" name="idProduct" value="{{$product->id}}">
                                        <div class="row vertical-gap sm-gap">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control required" name="name" placeholder="Name *">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control required" name="title" placeholder="Title *">
                                            </div>
                                        </div>
                                        <div class="nk-gap-1"></div>
                                        <textarea class="form-control required" name="rewiew" rows="5" placeholder="Your Review *" aria-required="true"></textarea>
                                        <div class="nk-gap-1"></div>
                                        <div class="nk-rating">
                                            <input type="radio" id="review-rate-5" name="rate" value="5">
                                            <label for="review-rate-5">
                                                <span><i class="far fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </label>

                                            <input type="radio" id="review-rate-4" name="rate" value="4">
                                            <label for="review-rate-4">
                                                <span><i class="far fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </label>

                                            <input type="radio" id="review-rate-3" name="rate" value="3">
                                            <label for="review-rate-3">
                                                <span><i class="far fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </label>

                                            <input type="radio" id="review-rate-2" name="rate" value="2">
                                            <label for="review-rate-2">
                                                <span><i class="far fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </label>

                                            <input type="radio" id="review-rate-1" name="rate" value="1">
                                            <label for="review-rate-1">
                                                <span><i class="far fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </label>
                                        </div>
                                        <button class="nk-btn nk-btn-rounded nk-btn-color-dark-3 float-right">Submit</button>
                                    </form>
                                </div>
                                <!-- END: Reply -->

                                <div class="clearfix"></div>
                                <div class="nk-gap-2"></div>
                                <div class="nk-comments">
                                    @foreach($comments as $comment)
                                        <div class="nk-comment">
                                            <div class="nk-comment-meta">
                                                <img src="{{$comment->avatar}}" alt="Witch Murder" class="rounded-circle" width="35"> by <a href="#">{{$comment->user_name}}</a> {{$comment->created_at}}
                                                <div class="nk-review-rating" data-rating="4.5">@for ($i = 1; $i <=5; $i++)
                                                        @if ($i < $comment->rate)
                                                            <i class="fa fa-star"></i>
                                                        @elseif($i === $comment->rate) <i class="fas fa-star-half-alt"></i>
                                                        @else  <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor</div>
                                            </div>
                                            <div class="nk-comment-text">
                                                <p>{{$comment->rewiew}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                              
                                    <!-- END: Review -->
                                </div>
                            </div>
                            <!-- END: Tab Reviews -->

                        </div>
                    </div>
                    <!-- END: Tabs -->
                </div>

                <!-- START: Related Products -->
                <div class="nk-gap-3"></div>
                <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Related</span> Products</span></h3>
                <div class="nk-gap"></div>
                <div class="row vertical-gap">

                  @foreach ($relativeProducts as $item)
                  <div class="col-md-6">
                      <div class="nk-product-cat">
                          <a class="nk-product-image" href="{{URL::to('/product/'.$item->id)}}">
                              <img src="{{asset('public/images/')}}/{{$item->image0}}" alt="She gave my mother">
                          </a>
                          <div class="nk-product-cont">
                              <h3 class="nk-product-title h5"><a  href="{{URL::to('/product/'.$item->id)}}">{{$item->title}}</a></h3>
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
                              <div class="nk-product-price">$ {{$item->price}}</div>
                          </div>
                      </div>
                  </div>
                  @endforeach


                   
                

                </div>
                <!-- END: Related Products -->
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
                    <div class="nk-widget">
                        <div class="nk-widget-content">
                            <form action="#" class="nk-form nk-form-style-1" novalidate="novalidate">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type something...">
                                    <button class="nk-btn nk-btn-color-main-1"><span class="ion-search"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="nk-widget nk-widget-highlighted">
                        <h4 class="nk-widget-title"><span><span class="text-main-1">Category</span> Menu</span></h4>
                        <div class="nk-widget-content">
                            <ul class="nk-widget-categories">
                                @foreach($categories as $category)
                                <li><a href="#">{{$category->nameCategory}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="nk-widget nk-widget-highlighted">
                        <h4 class="nk-widget-title"><span><span class="text-main-1">Price</span> Filter</span></h4>
                        <div class="nk-widget-content">
                            <div class="nk-input-slider">
                                <input type="text" name="price-filter" data-slider-min="0" data-slider-max="1800" data-slider-step="1" data-slider-value="[200, 1200]" data-slider-tooltip="hide">
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
                            <!--
            Social Links 3

            Additional Classes:
                .nk-social-links-cols-5
                .nk-social-links-cols-4
                .nk-social-links-cols-3
                .nk-social-links-cols-2
        -->
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
                                    <img src="{{asset('public/assets/images/product-1-xs')}}.jpg" alt="So saying he unbuckled">
                                </a>
                                <h3 class="nk-post-title"><a href="store-product.html">So saying he unbuckled</a></h3>
                                <div class="nk-product-rating" data-rating="4"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i></div>
                                <div class="nk-product-price">€ 23.00</div>
                            </div>

                            <div class="nk-widget-post">
                                <a href="store-product.html" class="nk-post-image">
                                    <img src="{{asset('public/assets/images/product-2-xs')}}.jpg" alt="However, I have reason">
                                </a>
                                <h3 class="nk-post-title"><a href="store-product.html">However, I have reason</a></h3>
                                <div class="nk-product-rating" data-rating="2.5"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fas fa-star-half"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></div>
                                <div class="nk-product-price">€ 32.00</div>
                            </div>

                            <div class="nk-widget-post">
                                <a href="store-product.html" class="nk-post-image">
                                    <img src="{{asset('public/assets/images/product-3-xs')}}.jpg" alt="It was some time before">
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#comment_form").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);


            $.ajax({
                type: "post",
                url: "{{ route('product.comment') }}",
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    if(!data.created_at) return
                    $('#total_rewiew').text(data.totalComment)
                    let star = []
                    for(let i=1;i<=5;i++) {
                        if(i<parseInt(data.rate)) {
                            star.push(`<i class="fa fa-star"></i> `)
                        }
                        else if(i===parseInt(data.rate)) star.push(`<i style="margin-right: 3px"  class="fas fa-star-half-alt"></i>`)
                        else star.push(`<i style="margin-right: 3px" class="far fa-star"></i>`)
                    }
                    $('.nk-comments').prepend(`
                          <div class="nk-comment">
                                        <div class="nk-comment-meta">
                                            <img src="${data.avatar}" alt="Witch Murder" class="rounded-circle" width="35"> by <a href="#">${data.user_name}</a> ${formatDate(data.created_at)}
                                            <div class="nk-review-rating" data-rating="4.5">${star.join('')}</div>
                                        </div>
                                        <div class="nk-comment-text">
                                          <p>${data.rewiew}</p>
                                        </div>
                                    </div>
                    `)
                }
                });


            });
        function formatDate(date) {
            var currentdate = new Date(date);
            var datetime =currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/"
                + currentdate.getFullYear() + " "
                + currentdate.getHours() + ":"
                + currentdate.getMinutes() + ":"
                + currentdate.getSeconds();
            return datetime;
        }
    </script>
@endsection
