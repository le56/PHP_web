<?php

namespace App\View\Components;

use App\Models\MatchNow;
use Illuminate\View\Component;

class lastMatch extends Component
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
        return view('components.last-match',['nextMatch'=>MatchNow::orderBy('created_at','desc')->limit(3)->get(),]);
    }
}
