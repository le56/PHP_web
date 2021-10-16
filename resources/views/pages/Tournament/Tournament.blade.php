@extends('welcome')
@section('tournament')
<!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">
        <li><a href="index.html">Home</a></li>
        <li><span class="fa fa-angle-right"></span></li>
        <li><span>Tournaments</span></li>
    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->
<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">
            <!-- START: Now Playing -->
            <div class="nk-match">
                <div class="nk-match-team-left">
                    <a href="#">
                        <span class="nk-match-team-logo">
                            <img src="{{ asset('public/assets/images/'.$livestream->logoTeam1) }}">
                        </span>
                        <span class="nk-match-team-name">
                            {{$livestream->team1}}
                        </span>
                    </a>
                </div>
                <div class="nk-match-status">
                    <a href="#">
                        <span class="nk-match-status-vs">VS</span>
                        <span class="nk-match-score bg-dark-1">Now Playing</span>
                    </a>
                </div>
                <div class="nk-match-team-right">
                    <a href="#">
                        <span class="nk-match-team-name">
                        {{$livestream->team2}}
                        </span>
                        <span class="nk-match-team-logo">
                            <img src="{{ asset('public/assets/images/team-1.jpg') }}" alt="">
                        </span>
                    </a>
                </div>
            </div>

            <div class="responsive-embed responsive-embed-16x9">
                <iframe src="{{$livestream->link}}" frameborder="0" allowfullscreen="true" scrolling="no" height="378" width="620"></iframe>
            </div>
            <!-- END: Now Playing -->

            <!-- START: Match Description -->
            <div class="nk-gap-2"></div>
            <!--  <h3 class="h4">Something wrong?</h3>
            <p>He made his passenger captain of one, with four of the men; and himself, his mate, and five more, went in the other; and they contrived their business very well, for they came up to the ship about midnight. I cannot express what a satisfaction it was to me to come into my old hutch</p> -->
            <!-- END: Match Description -->

            <!-- START: Share -->
            <div class="nk-gap"></div>
            <div class="nk-post-share">
                <span class="h5">Share Tournament:</span>

                <ul class="nk-social-links-2">
                    <li><span class="nk-social-facebook" title="Share page on Facebook" data-share="facebook"><span class="fab fa-facebook"></span></span></li>
                    <li><span class="nk-social-google-plus" title="Share page on Google+" data-share="google-plus"><span class="fab fa-google-plus"></span></span></li>
                    <li><span class="nk-social-twitter" title="Share page on Twitter" data-share="twitter"><span class="fab fa-twitter"></span></span></li>
                    <li><span class="nk-social-pinterest" title="Share page on Pinterest" data-share="pinterest"><span class="fab fa-pinterest-p"></span></span></li>
                </ul>
            </div>
            <!-- END: Share -->

            <!-- START: Latest Matches -->
            <div class="nk-gap-2"></div>
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> Matches</span></h3>
            <div class="nk-gap"></div>
            <x-last-Match></x-last-Match>
            <!-- END: Latest Matches -->

        </div>
        <x-side-bar></x-side-bar>
    </div>
</div>

<div class="nk-gap-2"></div>
@endsection