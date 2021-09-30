<?php

namespace App\View\Components;

use App\Models\news;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class tabbedNews extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabbed-news',[
            'actions' => DB::table('news')->where('category','Action')->where('banner','=',0)->get(),
            'bannerAction' => DB::table('news')->where('category','Action')->where('banner','=',1)->get(),
            'categoryMmo' => DB::table('news')->where('category','MMO')->where('banner','=',0)->get(),
            'bannerMmo' => DB::table('news')->where('category','MMO')->where('banner','=',1)->get(),
            'Strategy' => DB::table('news')->where('category','Strategy')->where('banner','=',1)->get(),
            'bannerStrategy' => DB::table('news')->where('category','Strategy')->where('banner','=',0)->get(),
            'Racing' => DB::table('news')->where('category','Racing')->where('banner','=',0)->get(),
            'bannerRacing' => DB::table('news')->where('category','Racing')->where('banner','=',1)->get(),
            'Adventure' => DB::table('news')->where('category','Adventure')->where('banner','=',0)->get(),
            'bannerAdventure' => DB::table('news')->where('category','Adventure')->where('banner','=',1)->get(),
            'Indie' => DB::table('news')->where('category','Indie')->where('banner','=',0)->get(),
            'bannerIndie' => DB::table('news')->where('category','Indie')->where('banner','=',1)->get(),
        ]);
    }
}
