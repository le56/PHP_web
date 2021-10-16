<?php

namespace App\Http\Controllers;

use App\Models\MatchNow;
use Goutte\Client;
use Illuminate\Http\Request;

class TournamentsController extends Controller
{
    public function index()
    {
        $liveStream = MatchNow::orderBy('created_at', 'asc')->first();
        return view('pages.Tournament.Tournament',['livestream'=>$liveStream]);
    }
    public function tournament($id)
    {
        $liveStream = MatchNow::where('id', $id)->first();  
        return view('pages.Tournament.Tournament', ['livestream'=>$liveStream]);
    }
    public function team()
    {
        return view('pages.Tournament.Teams');
    }
    public function teammate()
    {
        return view('pages.Tournament.teammate');
    }
}
