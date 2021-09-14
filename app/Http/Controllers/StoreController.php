<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;
use App\Models\comment;


class StoreController extends Controller
{
    public function index(){
        $allProduct = products::all();
        foreach ($allProduct as $product) {
            $str = str_replace('-md.','-square.',$product->image);
            $product->image = $str;
        }
        return view('pages.Store.Store',['ListImageXS'=>$allProduct,'products'=>products::all()]);
    }
    public function product($id) {
        $product = products::where('id' , $id) ->first();
        $str = str_replace('-md.','-square.',$product->image);
        $product->image = $str;
        $comments = comment::where("idProduct",$id)->orderByDesc('created_at')->get();
        $totalComment = count($comments);
        return view('pages.Store.Product',['product' => $product,"comments" => $comments,"totalComment"=>$totalComment]);
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

       $page = $request->page;
       if(empty($page) || $page <= 0) $page = 1;
       $start = ($page - 1)* 6;
       $countProduct = products::count();
       $countPage = ceil($countProduct / 6);
        $allProduct = products::skip($start)->take(6)->get();
        foreach ($allProduct as $product) {
            $str = str_replace('-md.','-square.',$product->image);
            $product->image = $str;
        }
        return view('pages.Store.Catalog',['products'=>$allProduct,'countPage'=>$countPage,'currentPage'=>$page,'categories'=>category::all()]);
    }
    public function cart(){
        return view('pages.Store.Cart');
    }
    public function checkout(){
        return view('pages.Store.Checkout');
    }
}
