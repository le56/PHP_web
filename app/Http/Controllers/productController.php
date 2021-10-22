<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;
use App\Http\common\common;

class productController extends Controller
{
    // get show create product
    public function showCreateProduct()
    {
        return view("Admin.product.create_product",["categories" => category::all()]);
    }

    // get  all list product, return wiew
    public function showAll()
    {
        return view("Admin.product.list_all_product", ["products" => products::all(),"categories" => category::all()]);
    }

    //    post store product
    public function store(Request $request)
    {
         products::create([
            "title" => $request->input("title"),
            "image0" => $request->input("image0"),
            "image1" => $request->input("image1"),
            "image2" => $request->input("image2"),
            "image3" => $request->input("image3"),
            "description" => $request->description,
            "content" => $request->input("content"),
            "rate" => $request->input("rate"),
            "price" => $request->input("price"),
            "category" => $request->input("category")
        ]);
        return redirect()->back();
    }

    // put update product
    public function update(Request $request)
    {
        $product = products::find($request->_id_product);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->content = $request->input('content');
        $product->save();
        return $product;
    }

    // delete  product
    public function delete(Request $request)
    {
        $productDel = products::find($request->id);
        for($i=0;$i<=3;$i++) {
            $d = "image".(string)$i;
            $path = public_path()."\images\\".$productDel->$d;
           if(file_exists($path)) unlink($path);
        }
        $productDel->delete();
        return $request->id;
    }

    // get search products
    public function searchProduct(Request $request)
    {
        $product = common::filterProduct($request,20);
        return $product;
    }

    // get product by ID
    public function getByID(Request $request)
    {
        return products::find($request->_id);
    }
}
