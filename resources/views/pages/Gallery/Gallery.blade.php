@extends('welcome')
@section('gallery')

<!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">
        <li><a href="index.html">Home</a></li>
        <li><span class="fa fa-angle-right"></span></li>
        <li><span>Gallery</span></li>
    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->
<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">
            <!-- START: Latest Pictures -->
            <x-last-picture></x-last-picture>
            <!-- END: Latest Pictures -->
            <!-- START: Recent Galleries-->
            <div class="nk-gap-2"></div>
            <h2 class="nk-decorated-h-2 h3"><span><span class="text-main-1">Recent</span> Galleries</span></h2>
            <div class="nk-gap"></div>
            <div class="row vertical-gap">
                @foreach($listGalery as $galleri)
                <div class="col-md-6">
                    <div class="nk-gallery-item-group">
                        <a href="#" class="nk-gallery-item">
                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                            <img src="{{ asset('public/assets/images/'.$galleri->image) }}" alt="">
                        </a>
                        <div class="nk-gallery-item-description">
                            <h4 class="nk-gallery-item-description-title h5">{{$galleri->title}}</h4>
                            <div class="nk-gallery-item-description-info">
                                <span class="far fa-image"></span>
                              <!--   <span>58</span> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- END: Recent Galleries -->
        </div>
        <x-side-bar></x-side-bar>
    </div>
</div>

<div class="nk-gap-2"></div>

@endsection