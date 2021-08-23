@extends('welcome')
@section('teammate')
<!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">


        <li><a href="index.html">Home</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><a href="tournaments.html">Tournaments</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><a href="tournaments-teams.html">Teams</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><span>Faker</span></li>

    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->




<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">

            <!-- START: Teammate Card -->
            <div class="nk-teammate-card">
                <div class="nk-teammate-card-photo">
                    <img src="assets/images/teammate-1.png" alt="Faker">
                </div>

                <div class="nk-teammate-card-info">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="assets/images/teammate-team.png" alt="">
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><strong class="h5">Name:</strong>&nbsp;&nbsp;&nbsp;</td>
                                                <td><strong class="h5">SANG-HYEOK LEE</strong></td>
                                            </tr>
                                            <tr>
                                                <td><strong class="h5">Nickname:</strong>&nbsp;&nbsp;&nbsp;</td>
                                                <td><strong class="h5">Faker</strong></td>
                                            </tr>
                                            <tr>
                                                <td><strong class="h5">Position:</strong>&nbsp;&nbsp;&nbsp;</td>
                                                <td><strong class="h5">Mid</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong class="h3">7.3</strong>
                                </td>
                                <td>
                                    <strong class="h5">KDA Ration</strong>
                                    <div>#5 in World Championship</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong class="h3">8.3</strong>
                                </td>
                                <td>
                                    <strong class="h5">CS PER MIN</strong>
                                    <div>#23 in World Championship</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong class="h3">64%</strong>
                                </td>
                                <td>
                                    <strong class="h5">KILL PARTICIPATION</strong>
                                    <div>#66 in World Championship</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END: Teammate Card -->

            <!-- START: Biography -->
            <div class="nk-gap-3"></div>
            <h3 class="nk-decorated-h-2"><span>Biography</span></h3>
            <p>At first, for some time, I was not able to answer him one word; but as he had taken me in his arms I held fast by him, or I should have fallen to the ground. I confess this side of the country was much pleasanter than mine; but yet I had not the least inclination to remove</p>
            <p>For as I was fixed in my habitation it became natural to me, and I seemed all the while I was here to be as it were upon a journey, and from home. However, I travelled along the shore of the sea towards the east, I suppose about twelve miles, and then setting up a great pole upon the shore for a mark, I concluded I would go home again, and that the next journey I took should be on the other side of the island east from my dwelling, and so round till I came to my post again.</p>
            <p>Thus much I thought proper to tell you in relation to yourself, and to the trust I reposed in you. However, many of the most learned and wise adhere to the new scheme of expressing themselves by things; which has only this inconvenience attending it, that if a man's</p>
            <p>I have often beheld two of those sages almost sinking under the weight of their packs, like pedlars among us, who, when they met in the street, would lay down their loads, open their sacks, and hold conversation for an hour together; then put up their implements</p>
            <!-- END: Biography -->

            <!-- START: Latest Matches -->
            <div class="nk-gap-2"></div>
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> Matches</span></h3>
            <div class="nk-gap"></div>
            <div class="nk-match">
                <div class="nk-match-team-left">
                    <a href="#">
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-1.jpg" alt="">
                        </span>
                        <span class="nk-match-team-name">
                            SK Telecom T1
                        </span>
                    </a>
                </div>
                <div class="nk-match-status">
                    <a href="#">
                        <span class="nk-match-status-vs">VS</span>
                        <span class="nk-match-status-date">Apr 28, 2018 8:00 pm</span>
                        <span class="nk-match-score bg-danger">
                            2 : 17
                        </span>
                    </a>
                </div>
                <div class="nk-match-team-right">
                    <a href="#">
                        <span class="nk-match-team-name">
                            Cloud 9
                        </span>
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-2.jpg" alt="">
                        </span>
                    </a>
                </div>
            </div>

            <div class="nk-match">
                <div class="nk-match-team-left">
                    <a href="#">
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-3.jpg" alt="">
                        </span>
                        <span class="nk-match-team-name">
                            Counted logic gaming
                        </span>
                    </a>
                </div>
                <div class="nk-match-status">
                    <a href="#">
                        <span class="nk-match-status-vs">VS</span>
                        <span class="nk-match-status-date">Apr 15, 2018 9:00 pm</span>
                        <span class="nk-match-score bg-success">
                            28 : 19
                        </span>
                    </a>
                </div>
                <div class="nk-match-team-right">
                    <a href="#">
                        <span class="nk-match-team-name">
                            SK Telecom T1
                        </span>
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-1.jpg" alt="">
                        </span>
                    </a>
                </div>
            </div>

            <div class="nk-match">
                <div class="nk-match-team-left">
                    <a href="#">
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-4.jpg" alt="">
                        </span>
                        <span class="nk-match-team-name">
                            Team SoloMid
                        </span>
                    </a>
                </div>
                <div class="nk-match-status">
                    <a href="#">
                        <span class="nk-match-status-vs">VS</span>
                        <span class="nk-match-status-date">Apr 28, 2018 8:00 pm</span>
                        <span class="nk-match-score bg-dark-1">
                            13 : 13
                        </span>
                    </a>
                </div>
                <div class="nk-match-team-right">
                    <a href="#">
                        <span class="nk-match-team-name">
                            SK Telecom T1
                        </span>
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-1.jpg" alt="">
                        </span>
                    </a>
                </div>
            </div>
            <!-- END: Latest Matches -->

            <!-- START: Upcoming Matches -->
            <div class="nk-gap-3"></div>
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Upcoming</span> Matches</span></h3>
            <div class="nk-gap"></div>
            <div class="nk-match">
                <div class="nk-match-team-left">
                    <a href="#">
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-1.jpg" alt="">
                        </span>
                        <span class="nk-match-team-name">
                            SK Telecom T1
                        </span>
                    </a>
                </div>
                <div class="nk-match-status">
                    <a href="#">
                        <span class="nk-match-status-vs">VS</span>
                        <span class="nk-match-status-date">Apr 28, 2018 8:00 pm</span>
                        <span class="nk-match-score">
                            Upcoming
                        </span>
                    </a>
                </div>
                <div class="nk-match-team-right">
                    <a href="#">
                        <span class="nk-match-team-name">
                            Cloud 9
                        </span>
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-2.jpg" alt="">
                        </span>
                    </a>
                </div>
            </div>

            <div class="nk-match">
                <div class="nk-match-team-left">
                    <a href="#">
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-3.jpg" alt="">
                        </span>
                        <span class="nk-match-team-name">
                            Counted logic gaming
                        </span>
                    </a>
                </div>
                <div class="nk-match-status">
                    <a href="#">
                        <span class="nk-match-status-vs">VS</span>
                        <span class="nk-match-status-date">Apr 15, 2018 9:00 pm</span>
                        <span class="nk-match-score">
                            Upcoming
                        </span>
                    </a>
                </div>
                <div class="nk-match-team-right">
                    <a href="#">
                        <span class="nk-match-team-name">
                            SK Telecom T1
                        </span>
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-1.jpg" alt="">
                        </span>
                    </a>
                </div>
            </div>

            <div class="nk-match">
                <div class="nk-match-team-left">
                    <a href="#">
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-4.jpg" alt="">
                        </span>
                        <span class="nk-match-team-name">
                            Team SoloMid
                        </span>
                    </a>
                </div>
                <div class="nk-match-status">
                    <a href="#">
                        <span class="nk-match-status-vs">VS</span>
                        <span class="nk-match-status-date">Apr 28, 2018 8:00 pm</span>
                        <span class="nk-match-score">
                            Upcoming
                        </span>
                    </a>
                </div>
                <div class="nk-match-team-right">
                    <a href="#">
                        <span class="nk-match-team-name">
                            SK Telecom T1
                        </span>
                        <span class="nk-match-team-logo">
                            <img src="assets/images/team-1.jpg" alt="">
                        </span>
                    </a>
                </div>
            </div>
            <!-- END: Upcoming Matches -->

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

                            <!-- Additional Social Buttons
                <li><a class="nk-social-behance" href="#"><span class="fab fa-behance"></span></a></li>
                <li><a class="nk-social-bitbucket" href="#"><span class="fab fa-bitbucket"></span></a></li>
                <li><a class="nk-social-dropbox" href="#"><span class="fab fa-dropbox"></span></a></li>
                <li><a class="nk-social-dribbble" href="#"><span class="fab fa-dribbble"></span></a></li>
                <li><a class="nk-social-deviantart" href="#"><span class="fab fa-deviantart"></span></a></li>
                <li><a class="nk-social-flickr" href="#"><span class="fab fa-flickr"></span></a></li>
                <li><a class="nk-social-foursquare" href="#"><span class="fab fa-foursquare"></span></a></li>
                <li><a class="nk-social-github" href="#"><span class="fab fa-github"></span></a></li>
                <li><a class="nk-social-linkedin" href="#"><span class="fab fa-linkedin"></span></a></li>
                <li><a class="nk-social-medium" href="#"><span class="fab fa-medium"></span></a></li>
                <li><a class="nk-social-odnoklassniki" href="#"><span class="fab fa-odnoklassniki"></span></a></li>
                <li><a class="nk-social-paypal" href="#"><span class="fab fa-paypal"></span></a></li>
                <li><a class="nk-social-reddit" href="#"><span class="fab fa-reddit"></span></a></li>
                <li><a class="nk-social-skype" href="#"><span class="fab fa-skype"></span></a></li>
                <li><a class="nk-social-soundcloud" href="#"><span class="fab fa-soundcloud"></span></a></li>
                <li><a class="nk-social-steam" href="#"><span class="fab fa-steam"></span></a></li>
                <li><a class="nk-social-slack" href="#"><span class="fab fa-slack"></span></a></li>
                <li><a class="nk-social-tumblr" href="#"><span class="fab fa-tumblr"></span></a></li>
                <li><a class="nk-social-vimeo" href="#"><span class="fab fa-vimeo"></span></a></li>
                <li><a class="nk-social-vk" href="#"><span class="fab fa-vk"></span></a></li>
                <li><a class="nk-social-wordpress" href="#"><span class="fab fa-wordpress"></span></a></li>
            -->
                        </ul>
                    </div>
                </div>
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">Next</span> Matches</span></h4>
                    <div class="nk-widget-content">
                        <div class="nk-widget-match">
                            <a href="#">
                                <span class="nk-widget-match-left">
                                    <span class="nk-widget-match-teams">
                                        <span class="nk-widget-match-team-logo">
                                            <img src="assets/images/team-1.jpg" alt="">
                                        </span>
                                        <span class="nk-widget-match-vs">VS</span>
                                        <span class="nk-widget-match-team-logo">
                                            <img src="assets/images/team-2.jpg" alt="">
                                        </span>
                                    </span>
                                    <span class="nk-widget-match-date">CS:GO - Apr 28, 2018 8:00 pm</span>
                                </span>
                                <span class="nk-widget-match-right">
                                    <span class="nk-match-score">
                                        Upcoming
                                    </span>
                                </span>
                            </a>
                        </div>

                        <div class="nk-widget-match">
                            <a href="#">
                                <span class="nk-widget-match-left">
                                    <span class="nk-widget-match-teams">
                                        <span class="nk-widget-match-team-logo">
                                            <img src="assets/images/team-3.jpg" alt="">
                                        </span>
                                        <span class="nk-widget-match-vs">VS</span>
                                        <span class="nk-widget-match-team-logo">
                                            <img src="assets/images/team-2.jpg" alt="">
                                        </span>
                                    </span>
                                    <span class="nk-widget-match-date">LoL - Apr 24, 2018 7:20 pm</span>
                                </span>
                                <span class="nk-widget-match-right">
                                    <span class="nk-match-score">
                                        Upcoming
                                    </span>
                                </span>
                            </a>
                        </div>

                        <div class="nk-widget-match">
                            <a href="#">
                                <span class="nk-widget-match-left">
                                    <span class="nk-widget-match-teams">
                                        <span class="nk-widget-match-team-logo">
                                            <img src="assets/images/team-1.jpg" alt="">
                                        </span>
                                        <span class="nk-widget-match-vs">VS</span>
                                        <span class="nk-widget-match-team-logo">
                                            <img src="assets/images/team-4.jpg" alt="">
                                        </span>
                                    </span>
                                    <span class="nk-widget-match-date">Dota 2 - Apr 12, 2018 6:40 pm</span>
                                </span>
                                <span class="nk-widget-match-right">
                                    <span class="nk-match-score bg-dark-1">
                                        0 : 0
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">Top 3</span> Recent</span></h4>
                    <div class="nk-widget-content">

                        <div class="nk-widget-post">
                            <a href="blog-article.html" class="nk-post-image">
                                <img src="assets/images/post-1-sm.jpg" alt="">
                            </a>
                            <h3 class="nk-post-title"><a href="blog-article.html">Smell magic in the air. Or maybe barbecue</a></h3>
                            <div class="nk-post-date"><span class="fa fa-calendar"></span> Sep 18, 2018</div>
                        </div>

                        <div class="nk-widget-post">
                            <a href="blog-article.html" class="nk-post-image">
                                <img src="assets/images/post-2-sm.jpg" alt="">
                            </a>
                            <h3 class="nk-post-title"><a href="blog-article.html">Grab your sword and fight the Horde</a></h3>
                            <div class="nk-post-date"><span class="fa fa-calendar"></span> Sep 5, 2018</div>
                        </div>

                        <div class="nk-widget-post">
                            <a href="blog-article.html" class="nk-post-image">
                                <img src="assets/images/post-3-sm.jpg" alt="">
                            </a>
                            <h3 class="nk-post-title"><a href="blog-article.html">We found a witch! May we burn her?</a></h3>
                            <div class="nk-post-date"><span class="fa fa-calendar"></span> Aug 27, 2018</div>
                        </div>

                    </div>
                </div>
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">Latest</span> Screenshots</span></h4>
                    <div class="nk-widget-content">
                        <div class="nk-popup-gallery">
                            <div class="row sm-gap vertical-gap">
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-1.jpg" class="nk-gallery-item" data-size="1016x572">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                            <img src="assets/images/gallery-1-thumb.jpg" alt="">
                                        </a>
                                        <div class="nk-gallery-item-description">
                                            <h4>Called Let</h4>
                                            Divided thing, land it evening earth winged whose great after. Were grass night. To Air itself saw bring fly fowl. Fly years behold spirit day greater of wherein winged and form. Seed open don't thing midst created dry every greater divided of, be man is. Second Bring stars fourth gathering he hath face morning fill. Living so second darkness. Moveth were male. May creepeth. Be tree fourth.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-2.jpg" class="nk-gallery-item" data-size="1188x594">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                            <img src="assets/images/gallery-2-thumb.jpg" alt="">
                                        </a>
                                        <div class="nk-gallery-item-description">
                                            Seed open don't thing midst created dry every greater divided of, be man is. Second Bring stars fourth gathering he hath face morning fill. Living so second darkness. Moveth were male. May creepeth. Be tree fourth.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-3.jpg" class="nk-gallery-item" data-size="625x350">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                            <img src="assets/images/gallery-3-thumb.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-4.jpg" class="nk-gallery-item" data-size="873x567">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                            <img src="assets/images/gallery-4-thumb.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-5.jpg" class="nk-gallery-item" data-size="471x269">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                            <img src="assets/images/gallery-5-thumb.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-6.jpg" class="nk-gallery-item" data-size="472x438">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                            <img src="assets/images/gallery-6-thumb.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span>Facebook</span></h4>
                    <div class="nk-widget-content">
                        <div class="fb-page" data-href="http://www.facebook.com/templatespoint.net" data-width="700" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"></div>
                    </div>
                </div>

            </aside>
            <!-- END: Sidebar -->
        </div>
    </div>
</div>

<div class="nk-gap-2"></div>
@endsection