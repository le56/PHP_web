@extends('welcome')
@section('teams')
<!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">


        <li><a href="index.html">Home</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><a href="tournaments.html">Tournaments</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><span>Teams</span></li>

    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->
<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">

            <!-- START: Teams -->
            @foreach($teams as $team)
            <div class="nk-team">
                <div class="nk-team-logo" style="margin: auto 0;">
                    <img src="{{$team->logo}}" alt="">
                </div>
                <div class="nk-team-cont">
                    <h3 class="h5 mb-20"><span class="text-main-1">Team:</span>{{$team->teamName}}</h3>
                    <h4 class="h6 mb-5">Members:</h4>
                    <a href="tournaments-teammate.html">{{$team->phayerID1}}</a>, 
                    <a href="tournaments-teammate.html">{{$team->phayerID2}}</a>, 
                    <a href="tournaments-teammate.html">{{$team->phayerID3}}</a>, 
                    <a href="tournaments-teammate.html">{{$team->phayerID4}}</a>, 
                    <a href="tournaments-teammate.html">{{$team->phayerID5}}</a>
                    <div class="nk-team-photo"><img src="{{$team->banner}}" alt="" style="width: auto; height: 100%; position: absolute; right: 0;"></div>
                </div>
            </div>
            @endforeach
            <!-- END: Teams -->

        </div>
        <x-side-bar></x-side-bar>
    </div>
</div>

<div class="nk-gap-2"></div>
@endsection