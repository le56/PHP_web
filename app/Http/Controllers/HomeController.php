<?php

namespace App\Http\Controllers;

use App\Http\common\common;
use App\Models\Blog;
use App\Models\Home_slider;
use App\Models\Latest_new;
use App\Models\MatchNow;
use App\Models\Post;
use App\Models\products;
use App\Models\Screenshots;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allSlider = Home_slider::all();
        
        $allNewLatest = Latest_new::all();
        foreach ($allNewLatest as $new) {
            $str = str_replace('-md.','-square.',$new->image);
            $new->image = $str;
        }
       
        $topSell = common::getImage(products::orderBy('selled','desc')->limit(4)->get());
        return view('pages.Home',
        [
            'ListImageXS'=>$allSlider,'sliders'=>Home_slider::all(),
            'newLatest'=>Latest_new::all(),
            'recents'=>Blog::orderBy('created_at', 'asc')->limit(3)->get(),
            'postList'=>Blog::orderBy('created_at', 'desc')->limit(4)->get(),
            'lastpost'=>Blog::orderBy('created_at', 'asc')->limit(2)->get(),
            // 'topProduct'=>products::orderBy('created_at','asc')->limit(3)->get(),
            'topsell'=>$topSell,
            'nowMatch'=>MatchNow::orderBy('created_at','asc')->limit(1)->get(),
    ],);
    }
};
