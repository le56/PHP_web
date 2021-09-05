<?php

namespace App\Http\Controllers;

use App\Models\Home_slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allSlider = Home_slider::all();
        foreach ($allSlider as $slider) {
            $str = str_replace('-md.','-square.',$slider->image);
            $slider->image = $str;
        }
        return view('pages.Home',['ListImageXS'=>$allSlider,'sliders'=>Home_slider::all()]);
    }
};
