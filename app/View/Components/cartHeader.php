<?php

namespace App\View\Components;

use App\Http\common\common;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class cartHeader extends Component
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
        if(Auth::check()) {
            $carts = Cart::where("email",Auth::user()->email)->get();
            foreach ($carts as $cart) {
                $cart->product = common::getImageOneProduct($cart->product);
            }
            return view('components.cart-header',["cartsHeader"=>$carts]);
        }
        return view('components.cart-header');
    }
}
