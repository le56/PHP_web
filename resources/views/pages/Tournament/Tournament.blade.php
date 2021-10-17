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
<div id="twitch-embed"></div>
<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-12">
            <!-- START: Now Playing -->
            <div class="nk-match" style="max-width: 1110px;">
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
                            <img src="{{ asset('public/assets/images/'.$livestream->logoTeam2) }}">
                        </span>
                    </a>
                </div>
            </div>
            <!-- Load the Twitch embed JavaScript file -->
            <script src="https://embed.twitch.tv/embed/v1.js"></script>
            <script type="text/javascript">
                new Twitch.Embed("twitch-embed", {
                    width: "100%",
                    height: 480,
                    channel: "{{$livestream->link}}",
                    theme: "dark",
                    muted: true,
                    // Only needed if this page is going to be embedded on other websites
                    parent: ["embed.example.com", "othersite.example.com"]
                });
            </script>
            <!-- END: Now Playing -->
            <style>
                #twitch-embed {
                    max-width: 1110px;
                    margin: 0 auto;
                }
            </style>
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
    </div>
</div>
<div class="container">
    <ul class="nk-breadcrumbs">

    </ul>
</div>
<div class="nk-gap-2"></div>
@endsection