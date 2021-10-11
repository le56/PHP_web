<?php

namespace App\Http\Controllers;

use App\Models\Home_slider;
use App\Models\Screenshots;
use App\Models\Store_gallery;
use Illuminate\Http\Request;

class screenAndSliderController extends Controller
{
    // home screen
    public function showListScreenHome() {
        return view('Admin.screen.screenShotManage',["screens" => Screenshots::all()]);
    }
    // show update screen
    public function showUpdateScreen($id) {   
        return view('Admin.screen.updateScreen',["item" => Screenshots::find($id)]);
    }
    // put
    // update screen
    public function updateScreen(Request $request) {
        $screen = Screenshots::find($request->idScreen);
        $screen->title = $request->input('title');
        $screen->content = $request->input('content');
        $screen->save();
        return redirect('/admin/screen');    
    }
    // home slider 
    public function showListHomeSlider() {
        return view('Admin.slider.homeSliderManage',["sliders" => Home_slider::all()]);
    }
    // show update home slider 
    public function showUpdateHomeSlider($id) {
          return view('Admin.slider.UpdateHomeSider',["item" => Home_slider::find($id)]);
    }
    // update home slider
    public function updateHomeSlider(Request $request) {
        $slider = Home_slider::find($request->idSlider);
        $slider->title = $request->input('title');
        $slider->content = $request->input('content');
        $slider->save();
        return redirect('/admin/home-slider');    
    }
     // store gallery
     public function showListStoreGallery() {
        return view('Admin.storeGallery.storeGallery',["galleries" => Store_gallery::all()]);
    }
    // update store gallery
    public function updateStoreGallery(Request $request) {
        $gallery = Store_gallery::find($request->id);
        $gallery->title = $request->input('title');
        $gallery->save();
        return $gallery->title;
    }
}
