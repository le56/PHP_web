<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    // get
    // show cart method
    public function cart(){
        $carts = Cart::where("email",Auth::user()->email)->get();
        $totalPrice =  Cart::where("email",Auth::user()->email)->sum("totalPrice");
        return view('pages.Store.Cart',["carts"=>$carts,"totalPrice"=>$totalPrice]);
    }
    // post
    // add cart
    public function createOrUpdate(Request $request){
        $email = Auth::user()->email;
        $idPoduct = $request->idProduct;
        $product = products::find($request->idProduct);
        // check exists product
        if(!isset($product)) return response()->json([
            "error" => "Product not found"
        ]);
        $quantity = (int)$request->quantity > 0 ? $request->quantity : 1;
        // check exist product in cart 
        $cart = Cart::where("email",$email)->where("idProduct",$idPoduct)->first();
        // handle if cart exists
        if(isset($cart)) {
            $newQuantity = $request->isReplace ?  $quantity : $cart->quantity + $quantity ; 
            $cart->quantity = $newQuantity;
            $cart->totalPrice = $newQuantity * $product->price;
            $cart -> save();
            $cart->product = $cart->product;
            return response()->json(['cart'=>$cart,'message'=>"updated","totalPrice"=>Cart::where("email",Auth::user()->email)->sum("totalPrice")]);
        }
        // handle if cart not exists
        $cart = Cart::create([
          "idProduct" => $request->idProduct,
          "email" => $email,
          "quantity" => $quantity,
          "totalPrice" => $quantity * $product->price
        ]);
        $cart->product = $cart->product;
        return response()
        ->json(['cart'=>$cart,'message'=>"created"]);
    } 
    // delete
    // delete cart
    public function delete($id) {
        $email = Auth::user()->email;
        $cart = Cart::where('id', $id)->where('email',$email);
        if(!isset($cart)) return response()->json(["error"=> "Invalid cart item !"]);
        $cart->delete();
        return response()
        ->json(['cart'=>$cart,'message'=>"deleted","totalPrice"=>Cart::where("email",Auth::user()->email)->sum("totalPrice")]);
    }
 }
