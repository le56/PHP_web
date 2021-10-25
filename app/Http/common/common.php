<?php

namespace App\Http\common;

use App\Models\Blog;
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

    // filter blog func

    public static function filterBlog($req,$number) {
        $blog = new Blog();
        $queries = [];
        // filter by category
      if($req->has('category')) {
        $blog = $blog->where("category",$req->category);
        $queries["category"] = $req->category;
    }
    // filter by search
        if($req->has('search')) {
            $blog = $blog->where('title','like','%'.$req->search.'%');
            $queries['search'] = $req->search;
        }
         // filter by sort
      if($req->has('sort')) {
        $column = $req->sort;
        $key = array_keys($column)[0];
        $value = $column[$key];
        $blog = $blog->orderBy($key, $value);
        $queries["sort[".$key."]"] = $value;
    }

        $blog = $blog->paginate($number)->appends($queries);
        return $blog;
    }

    // get cart anh total price 
    public static function getCartAndTotalPrice($email) {
        $carts = Cart::where("email",$email)->get();
        $totalPrice =  Cart::where("email",$email)->sum("totalPrice");
        return array("carts" => $carts,"totalPrice" => $totalPrice);
    }

    // function get image 
    public static function getImage($products) {
        foreach ($products as $product) {
            $string = str_replace('["','',$product->images);
            $string1 = str_replace('"]','',$string);
            $product->image0 = explode(",",$string1)[0];
            $product->images = explode(",",$string1);
        }
        return $products;
    }
    // 
    public static function getImageOneProduct($product) {
        $string = str_replace('["','',$product->images);
        $string1 = str_replace('"]','',$string);
        $product->image0 = explode(",",$string1)[0];
        $product->images = explode(",",$string1);
        return $product;
    }

 }
