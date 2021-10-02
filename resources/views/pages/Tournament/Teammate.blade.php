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
        <x-side-bar></x-side-bar>
    </div>
</div>

<div class="nk-gap-2"></div>
@endsection