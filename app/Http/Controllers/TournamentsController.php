<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TournamentsController extends Controller
{
    public function index(){
        return view('pages.Tournament.Tournament');
    }
    public function team(){
        return view('pages.Tournament.Teams');
    }
    public function teammate(){
        return view('pages.Tournament.teammate');
    }
}
