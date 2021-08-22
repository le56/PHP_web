<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        return view('pages.Store.Store');
    }
    public function product(){
        return view('pages.Store.Product');
    }
    public function catalogAlt(){
        return view('pages.Store.CatalogAlt');
    }
    public function catalog(){
        return view('pages.Store.Catalog');
    }
    public function cart(){
        return view('pages.Store.Cart');
    }
    public function checkout(){
        return view('pages.Store.Checkout');
    }
}
