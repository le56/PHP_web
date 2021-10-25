<?php

namespace App\View\Components;

use App\Http\common\common;
use App\Models\Latest_new;
use App\Models\MatchNow;
use App\Models\products;
use App\Models\Screenshots;
use Illuminate\View\Component;

use function Ramsey\Uuid\v1;

class SideBar extends Component
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

        return view('components.side-bar', [
            'recents' => Latest_new::orderBy('created_at', 'asc')->limit(3)->get(),
            'topProduct' => common::getImage(products::orderBy('created_at', 'asc')->limit(3)->get()),
            'listScreenshots' => Screenshots::orderBy('image', 'asc')->limit(6)->get(),
            'nextMatch'=>MatchNow::orderBy('created_at','desc')->limit(3)->get(),
        ]);
    }
}
