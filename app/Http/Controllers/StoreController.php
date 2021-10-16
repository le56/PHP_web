<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;
use App\Models\comment;
use App\Models\Store_gallery;

class StoreController extends Controller
{
    public function index(){
        $allProduct = products::all();
        foreach ($allProduct as $product) {
            $str = str_replace('-md.','-square.',$product->image);
            $product->image = $str;
        }
        return view('pages.Store.Store',['ListImageXS'=>$allProduct,"galleries"=>Store_gallery::all(),'products'=>products::all()]);
    }
    
    public function product($id) {
        $product = products::where('id' , $id) ->first();
        $comments = comment::where("idProduct",$id)->orderByDesc('created_at')->get();
        $categories = category::all();
        $totalComment = count($comments);
        $relativeProducts = products::where("category",$product->category)->get();
        return view('pages.Store.Product',['product' => $product,"categories"=>$categories,"relativeProducts"=>$relativeProducts,"comments" => $comments,"totalComment"=>$totalComment]);
    }
    // handle add comment
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

    public function catalogAlt(){
        $allProduct = products::all();
        return view('pages.Store.CatalogAlt',['products'=>$allProduct]);
    }
    public function catalog(Request $request){
      $queries = [];
      $product = new products;
      if($request->has('category')) {
          $product = $product->where("category",$request->category);
          $queries["category"] = $request->category;
      }
      if($request->has('pgt') && $request->has('plt')) {
          $product = $product->where("price",">=",$request->pgt)->where("price","<=",$request->plt);
          $queries["pgt"] = $request->pgt;
          $queries["plt"] = $request->plt;
      }
      if($request->has('search')) {
          $product = $product->where("title","like","%". $request->search ."%");
          $queries["search"] = $request->search;
      }
      if($request->has('sort')) {
          $product = $product->orderBy('price', $request->sort);
          $queries["sort"] = $request->sort;
      }

      $product = $product->paginate(6)->appends($queries);

      return view('pages.Store.Catalog',["products" => $product,"categories" => category::all()]);

    }
   
    public function checkout(){
        return view('pages.Store.Checkout');
    }
}
