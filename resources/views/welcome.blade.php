<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>GoodGames | Community and Store HTML Game Template</title>

    <meta name="description" content="GoodGames - Bootstrap template for communities and games store">
    <meta name="keywords" content="game, gaming, template, HTML template, responsive, Bootstrap, premium">
    <meta name="author" content="_nK">

    <link rel="icon" type="image/png" href="{{URL::asset('public/assets/images/favicon.png')}}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('public/assets/vendor/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="{{URL::asset('public/assets/vendor/fontawesome-free/js/v4-shims.js')}}"></script>

    <!-- IonIcons -->
    <link rel="stylesheet" href="{{URL::asset('public/assets/vendor/ionicons/css/ionicons.min.css')}}">

    <!-- Flickity -->
    <link rel="stylesheet" href="{{URL::asset('public/assets/vendor/flickity/dist/flickity.min.css')}}">

    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/vendor/photoswipe/dist/photoswipe.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/vendor/photoswipe/dist/default-skin/default-skin.css')}}">

    <!-- Seiyria Bootstrap Slider -->
    <link rel="stylesheet" href="{{URL::asset('public/assets/vendor/bootstrap-slider/dist/css/bootstrap-slider.min.css')}}">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/assets/vendor/summernote/dist/summernote-bs4.css')}}">

    <!-- GoodGames -->
    <link rel="stylesheet" href="{{URL::asset('public/assets/css/goodgames.css')}}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{URL::asset('public/assets/css/custom.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- END: Styles -->
    <!-- jQuery -->
    <script src="{{URL::asset('public/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <style>
        #header-user-option {
            position: relative;
            cursor: pointer;
        }
        #header-user-option:hover .nk-cart-dropdown {
            visibility: visible;
            opacity: 1;
        }
        #header-user-option img{
            width:30px;
            height:30px;
            border-radius: 50%;
            object-fit: cover;
        }
        #header-user-option .nk-cart-dropdown {
            position:absolute;
            top: 105%;
            right:0;
            padding :1rem;
            width: fit-content;
        }
        #header-user-option .nk-cart-dropdown a {
            display: block;
        }
    </style>
   
</head>


<!--
    Additional Classes:
        .nk-page-boxed
-->

<body>





    <!--
    Additional Classes:
        .nk-header-opaque
-->
    <header class="nk-header nk-header-opaque">



        <!-- START: Top Contacts -->
        <div class="nk-contacts-top">
            <div class="container">
                <div class="nk-contacts-left">
                    <ul class="nk-social-links">
                        <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>
                        <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a></li>
                        <li><a class="nk-social-steam" href="#"><span class="fab fa-steam"></span></a></li>
                        <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                        <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                        <li><a class="nk-social-twitter" href="#" target="_blank"><span class="fab fa-twitter"></span></a></li>
                        <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a></li>
                    </ul>
                </div>
                <div class="nk-contacts-right">
                    <ul class="nk-contacts-icons">

                        <li>
                            <a href="#" data-toggle="modal" data-target="#modalSearch">
                                <span class="fa fa-search"></span>
                            </a>
                        </li>


                        <li>
                            @if (Auth::check())
                            <a href="{{  asset ('/user-logout')}}"><img src="{{Auth::user()->avatar}}" style="width:30px;height:30px;border-radius: 50%;object-fit: cover;" alt=""></a>
                            @else
                            <a href="#" id="btn-login" data-toggle="modal" data-target="#modalLogin">
                                <span class="fa fa-user"></span>
                            </a>
                            @endif
                        @if (Auth::check())
                            <div  id="header-user-option"><img src="{{Auth::user()->avatar}}"  >
                                <div class="nk-cart-dropdown" >
                                        <a href="{{  asset ('/user-logout')}}" class="
                                                nk-btn
                                                nk-btn-rounded
                                                nk-btn-color-main-1
                                                nk-btn-hover-color-white
                                            ">Log out</a>
                                </div>
                        </div>
                        @else 
                        <a href="#" id="btn-login" data-toggle="modal" data-target="#modalLogin">
                            <span class="fa fa-user"></span>
                        </a>
                        @endif
                        </li>


                        <x-cart-header />
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Top Contacts -->



        <!--
        START: Navbar

        Additional Classes:
            .nk-navbar-sticky
            .nk-navbar-transparent
            .nk-navbar-autohide
            Hello
    -->
        <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
            <div class="container">
                <div class="nk-nav-table">

                    <a href="{{URL::to('/')}}" class="nk-nav-logo">
                        <img src="{{asset('public/assets/images/logo.png')}}" alt="GoodGames" width="199">
                    </a>

                    <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">
                        <li class=" nk-drop-item">
                            <a href="#">
                                Blog

                            </a>
                            <ul class="dropdown">

                                <li>
                                    <a href="news.html">
                                        News
                                    </a>
                                </li>
                                
                                        <li>
                                            <a href="{{URL::to('/blog/grid')}}">
                                                Blog Grid

                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{URL::to('/blog')}}">
                                                Blog List

                                            </a>
                                        </li>
                                  
                                
                            
                            </ul>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog-fullwidth.html">
                                        Blog Fullwidth

                                    </a>
                                </li>
                                <li>
                                    <a href="blog-article.html">
                                        Blog Article

                                    </a>
                                </li>
                            </ul> 
                        </li>
                        <li>
                            <a href="{{URL::to('/gallery')}}">
                                Gallery
                            </a>
                        </li>
                        <li class=" nk-drop-item">
                            <a href="{{URL::to('/tournament')}}">
                                Tournaments

                            </a>
                            <ul class="dropdown">

                                <li>
                                    <a href="{{URL::to('/tournament')}}">
                                        Tournament

                                    </a>
                                </li>
                                <li>
                                    <a href="{{URL::to('/teams')}}">
                                        Teams

                                    </a>
                                </li>
                                <li>
                                    <a href="{{URL::to('/teammate')}}">
                                        Teammate

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class=" nk-drop-item">
                            <a href="{{URL::to('/store')}}">
                                Store
                            </a>
                            <ul class="dropdown">

                                <li>
                                    <a href="{{URL::to('/store')}}">
                                        Store
                                    </a>
                                </li>

                                <li>
                                    <a href="{{URL::to('/catalog')}}">
                                        Catalog

                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="{{URL::to('/catalogAlt')}}">
                                        Catalog Alt

                                    </a>
                                </li> -->
                                <li>
                                    <a href="{{URL::to('/checkout')}}">
                                        Checkout

                                    </a>
                                </li>
                                <li>
                                    <a href="{{URL::to('/cart')}}">
                                        Cart

                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nk-nav nk-nav-right nk-nav-icons">

                        <li class="single-icon d-lg-none">
                            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <!-- END: Navbar -->

    </header>
    <div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
        <div class="nano">
            <div class="nano-content">
                <a href="index.html" class="nk-nav-logo">
                    <img src="{{asset('public/assets/images/logo.png')}}" alt="" width="120">
                </a>
                <div class="nk-navbar-mobile-content">
                    <ul class="nk-nav">
                        <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Navbar Mobile -->
    <div class="nk-main">
        <!-- Store -->
        @yield('store')
        @yield('content')
        @yield('product')
        @yield('catalog')
        @yield('catalogAlt')
        @yield('checkout')
        @yield('cart')
        <!--Gallery-->
        @yield('gallery')

        <!--Tournament-->

        @yield('tournament')
        @yield('teams')
        @yield('teammate')

        <!-- blog -->
        @yield('detailBlog')
        @yield('blog')
        <!-- end blog  -->

        <!-- START: Footer -->
        <footer class="nk-footer">

            <div class="container">
                <div class="nk-gap-3"></div>
                <div class="row vertical-gap">
                    <div class="col-md-6">
                        <div class="nk-widget">
                            <h4 class="nk-widget-title"><span class="text-main-1">Contact</span> With Us</h4>
                            <div class="nk-widget-content">
                                <form action="php/ajax-contact-form.php" class="nk-form nk-form-ajax">
                                    <div class="row vertical-gap sm-gap">
                                        <div class="col-md-6">
                                            <input type="email" class="form-control required" name="email" placeholder="Email *">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control required" name="name" placeholder="Name *">
                                        </div>
                                    </div>
                                    <div class="nk-gap"></div>
                                    <textarea class="form-control required" name="message" rows="5" placeholder="Message *"></textarea>
                                    <div class="nk-gap-1"></div>
                                    <button class="nk-btn nk-btn-rounded nk-btn-color-white">
                                        <span>Send</span>
                                        <span class="icon"><i class="ion-paper-airplane"></i></span>
                                    </button>
                                    <div class="nk-form-response-success"></div>
                                    <div class="nk-form-response-error"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <x-post-component></x-post-component>
                </div>
                <div class="nk-gap-3"></div>
            </div>

            <div class="nk-copyright">
                <div class="container">
                    <div class="nk-copyright-right">
                        <ul class="nk-social-links-2">
                            <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>
                            <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a></li>
                            <li><a class="nk-social-steam" href="#"><span class="fab fa-steam"></span></a></li>
                            <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                            <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                            <li><a class="nk-social-twitter" href="#" target="_blank"><span class="fab fa-twitter"></span></a></li>
                            <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END: Footer -->
    </div>
    <!-- START: Page Background -->

    <img class="nk-page-background-top" src="assets/images/bg-top.png" alt="">
    <img class="nk-page-background-bottom" src="assets/images/bg-bottom.png" alt="">

    <!-- END: Page Background -->

    <!-- START: Search Modal -->
    <div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="ion-android-close"></span>
                    </button>

                    <h4 class="mb-0">Search</h4>

                    <div class="nk-gap-1"></div>
                    <form action="#" class="nk-form nk-form-style-1">
                        <input type="text" value="" name="search" class="form-control" placeholder="Type something and press Enter" autofocus>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Search Modal -->
    @unless (Auth::check())

    <!-- START: Login Modal -->
    <div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="ion-android-close"></span>
                    </button>

                    <h4 class="mb-0"><span class="text-main-1">Sign</span> In</h4>

                    <div class="nk-gap-1"></div>
                    <form action="#" class="nk-form text-white">
                        <div class="row vertical-gap">
                            <div class="col-md-6">
                                Use email and password:

                                <div class="nk-gap"></div>
                                <input type="email" value="" name="email" class=" form-control" placeholder="Email">

                                <div class="nk-gap"></div>
                                <input type="password" value="" name="password" class="required form-control" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                Or social account:

                                <div class="nk-gap"></div>

                                <ul class="nk-social-links-2">
                                    <li><a class="nk-social-facebook" href="{{ url('auth/facebook') }}"><span class="fab fa-facebook"></span></a></li>
                                    <li><a class="nk-social-google-plus" href="{{ url('auth/google') }}"><span class="fab fa-google-plus"></span></a></li>
                                    <li><a class="nk-social-github" href="{{ url('auth/github') }}"><i class="fab fa-github"></i></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="nk-gap-1"></div>
                        <div class="row vertical-gap">
                            <div class="col-md-6">
                                <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Sign In</a>
                            </div>
                            <div class="col-md-6">
                                <div class="mnt-5">
                                    <small><a href="#">Forgot your password?</a></small>
                                </div>
                                <div class="mnt-5">
                                    <small><a href="#">Not a member? Sign up</a></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Login Modal -->
    @endunless




    <!-- START: Scripts -->

    <script src="{{asset('public/assets/vendor/object-fit-images/dist/ofi.min.js')}}"></script>

    <!-- GSAP -->
    <script src="{{asset('public/assets/vendor/gsap/src/minified/TweenMax.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js')}}"></script>

    <!-- Popper -->
    <script src="{{asset('public/assets/vendor/popper.js/dist/umd/popper.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('public/assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Sticky Kit -->
    <script src="{{asset('public/assets/vendor/sticky-kit/dist/sticky-kit.min.js')}}"></script>

    <!-- Jarallax -->
    <script src="{{asset('public/assets/vendor/jarallax/dist/jarallax.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/jarallax/dist/jarallax-video.min.js')}}"></script>

    <!-- imagesLoaded -->
    <script src="{{asset('public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>

    <!-- Flickity -->
    <script src="{{asset('public/assets/vendor/flickity/dist/flickity.pkgd.min.js')}}"></script>

    <!-- Photoswipe -->
    <script src="{{asset('public/assets/vendor/photoswipe/dist/photoswipe.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js')}}"></script>

    <!-- Jquery Validation -->
    <script src="{{asset('public/assets/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>

    <!-- Jquery Countdown + Moment -->
    <script src="{{asset('public/assets/vendor/jquery-countdown/dist/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/moment-timezone/builds/moment-timezone-with-data.min.js')}}"></script>

    <!-- Hammer.js -->
    <script src="{{asset('public/assets/vendor/hammerjs/hammer.min.js')}}"></script>

    <!-- NanoSroller -->
    <script src="{{asset('public/assets/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js')}}"></script>

    <!-- SoundManager2 -->
    <script src="{{asset('public/assets/vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js')}}"></script>

    <!-- Seiyria Bootstrap Slider -->
    <script src="{{asset('public/assets/vendor/bootstrap-slider/dist/bootstrap-slider.min.js')}}"></script>

    <!-- Summernote -->
    <script src="{{asset('public/assets/vendor/summernote/dist/summernote-bs4.min.js')}}"></script>

    <!-- nK Share -->
    <script src="{{asset('public/assets/plugins/nk-share/nk-share.js')}}"></script>

    <!-- GoodGames -->
    <script src="{{asset('public/assets/js/goodgames.min.js')}}"></script>
    <script src="{{asset('public/assets/js/goodgames-init.js')}}"></script>
    <script src="{{asset('public/assets/js/main.js')}}"></script>
    <!-- Script handle cart -->
    <x-handlecart />

    <!-- END: Scripts -->
</body>

</html>