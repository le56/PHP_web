<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;
use App\Models\comment;
use App\Models\Store_gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    // get
    // show store page
    public function index(){
        $allProduct = products::all();
        return view('pages.Store.Store',['ListImageXS'=>$allProduct,"galleries"=>Store_gallery::all(),'products'=>products::all()]);
    }
<<<<<<< HEAD
    
=======
    // get 
    // show product details page
>>>>>>> f488223616082867e281c811faae7399575214b3
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
      // queries filter
      $queries = [];
      $product = new products;
      // filter by category
      if($request->has('category')) {
          $product = $product->where("category",$request->category);
          $queries["category"] = $request->category;
      }
      // filter by price greater than and litter than
      if($request->has('pgt') && $request->has('plt')) {
          $product = $product->where("price",">=",$request->pgt)->where("price","<=",$request->plt);
          $queries["pgt"] = $request->pgt;
          $queries["plt"] = $request->plt;
      }
      // filter by seach
      if($request->has('search')) {
          $product = $product->where("title","like","%". $request->search ."%");
          $queries["search"] = $request->search;
      }
      // filter by sort
      if($request->has('sort')) {
          $product = $product->orderBy('price', $request->sort);
          $queries["sort"] = $request->sort;
      }

<<<<<<< HEAD
      $product = $product->paginate(6)->appends($queries);
=======
      // apply pagination
      $product = $product->paginate(3)->appends($queries);
>>>>>>> f488223616082867e281c811faae7399575214b3

      return view('pages.Store.Catalog',["products" => $product,"categories" => category::all()]);

    }
   // show checkout page
    public function checkout(){
        $carts = Cart::where("email",Auth::user()->email)->get();
        $totalPrice =  Cart::where("email",Auth::user()->email)->sum("totalPrice");
        return view('pages.Store.Checkout',["carts"=>$carts,"totalPrice"=>$totalPrice]);
    }
}
