<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class StoreController extends Controller
{
    public function index(){
        $allProduct = products::all();
        foreach ($allProduct as $product) {
            $str = str_replace('-md.','-square.',$product->image);
            $product->image = $str;
        }
        return view('pages.Store.Store',['ListImageXS'=>$allProduct,'products'=>products::all()]);
//        return view('pages.Store.Store');
    }
    public function product(){
        return view('pages.Store.Product');
    }
    public function catalogAlt(){
        $allProduct = products::all();
        return view('pages.Store.CatalogAlt',['products'=>$allProduct]);
    }
    public function catalog(){
        $allProduct = products::all();
        foreach ($allProduct as $product) {
            $str = str_replace('-md.','-square.',$product->image);
            $product->image = $str;
        }
        return view('pages.Store.Catalog',['products'=>$allProduct]);
    }
    public function cart(){
        return view('pages.Store.Cart');
    }
    public function checkout(){
        return view('pages.Store.Checkout');
    }
}
