<?php

namespace App\Http\common;

use App\Models\Cart;
use App\Models\products;

class common
{
    //queries fillter product
    public static function filterProduct($request,$limit) {
        // queries filter
      $queries = [];
      $product = new products();
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
          $column = $request->sort;
          $key = array_keys($column)[0];
          $value = $column[$key];
          $product = $product->orderBy($key, $value);
          $queries["sort[".$key."]"] = $value;
      }

      // apply pagination
      $product = $product->paginate($limit)->appends($queries);
      return $product;
    }

    // get cart anh total price 
    public static function getCartAndTotalPrice($email) {
        $carts = Cart::where("email",$email)->get();
        $totalPrice =  Cart::where("email",$email)->sum("totalPrice");
        return array("carts" => $carts,"totalPrice" => $totalPrice);
    }

 }
