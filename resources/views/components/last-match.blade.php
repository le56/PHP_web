@foreach($nextMatch as $match)
<div class="nk-match">
    <div class="nk-match-team-left">
        <a href="#">
            <span class="nk-match-team-logo">
                <img src="{{ asset('public/assets/images/'.$match->logoTeam1) }}" alt="">
            </span>
            <span class="nk-match-team-name">
                {{$match->team1}}
            </span>
        </a>
    </div>
    <div class="nk-match-status">
        <a href="#">
            <span class="nk-match-status-vs">VS</span>
            <span class="nk-match-status-date">{{$match->created_at}}</span>
        </a>
    </div>
    <div class="nk-match-team-right">
        <a href="#">
            <span class="nk-match-team-name">
                {{$match->team1}}
            </span>
            <span class="nk-match-team-logo">
                <img src="{{ asset('public/assets/images/'.$match->logoTeam2) }}" alt="">
            </span>
        </a>
    </div>
</div>
@endforeach