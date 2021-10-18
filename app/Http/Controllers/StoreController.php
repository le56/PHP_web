<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;
use App\Models\comment;
use App\Models\Store_gallery;
use Illuminate\Support\Facades\Auth;
use App\Http\common\common;

class StoreController extends Controller
{
    // get
    // show store page
    public function index(){
        $allProduct = products::all();
        return view('pages.Store.Store',['ListImageXS'=>$allProduct,"galleries"=>Store_gallery::all(),'products'=>products::all()]);
    }
   
    // get 
    // show product details page
    public function product($id) {
        $product = products::where('id' , $id) ->first();
        $comments = comment::where("idProduct",$id)->orderByDesc('created_at')->get();
        $categories = category::all();
        $totalComment = count($comments);
        $relativeProducts = products::where("category",$product->category)->get();
        return view('pages.Store.Product',['product' => $product,"categories"=>$categories,"relativeProducts"=>$relativeProducts,"comments" => $comments,"totalComment"=>$totalComment]);
    }
    // handle add comment in product details page
    public function addComment(Request $request) {
        $rate = empty($request->rate) ?  1 : $request->rate;
        if(empty($request->title) || empty($request->name) || empty($request->rewiew)) return "Please enter all field";
        if(empty($request->idProduct)) return "Server error";
        $comment = comment::create([
           "title" => $request->title,
            "idProduct" => $request->idProduct,
            "rewiew" => $request->rewiew,
            "user_name" => $request->input('name'),
            "rate" =>  $rate,
            "avatar" => "https://toppng.com/uploads/preview/user-account-management-logo-user-icon-11562867145a56rus2zwu.png"
        ]);
        $totalComment = comment::where('idProduct',$request->idProduct)->count();
        $comment->totalComment  = $totalComment;
        return $comment;
    }
    // show catalog ALT
    public function catalogAlt(){
        $allProduct = products::all();
        return view('pages.Store.CatalogAlt',['products'=>$allProduct]);
    }
    // show catalog page and filter
    public function catalog(Request $request){
      $product = common::filterProduct($request,6);
      return view('pages.Store.Catalog',["products" => $product,"categories" => category::all()]);
    }
   // show checkout page
    public function checkout(){
        $data = common::getCartAndTotalPrice(Auth::user()->email);
        return view('pages.Store.Checkout',["carts"=>$data['carts'],"totalPrice"=>$data['totalPrice']]);
    }
}
