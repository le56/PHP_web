<?php

namespace App\Http\Controllers;

use App\Models\Home_slider;
use App\Models\Latest_new;
use App\Models\Post;
use App\Models\products;
use App\Models\Screenshots;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allSlider = Home_slider::all();
        foreach ($allSlider as $slider) {
            $str = str_replace('-md.','-square.',$slider->image);
            $slider->image = $str;
        }
        $allNewLatest = Latest_new::all();
        foreach ($allNewLatest as $new) {
            $str = str_replace('-md.','-square.',$new->image);
            $new->image = $str;
        }
        return view('pages.Home',
        [
            'ListImageXS'=>$allSlider,'sliders'=>Home_slider::all(),
            'newLatest'=>Latest_new::all(),
            'recents'=>Latest_new::orderBy('created_at', 'asc')->limit(3)->get(),
            'postList'=>Post::orderBy('created_at', 'asc')->limit(4)->get(),
            'lastpost'=>Post::orderBy('created_at', 'desc')->limit(2)->get(),
            'topProduct'=>products::orderBy('created_at','asc')->limit(3)->get(),
            'listScreenshots'=>Screenshots::orderBy('image','asc')->limit(6)->get(),
    ],);
    }
};
