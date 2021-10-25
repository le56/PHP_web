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
        return view("Admin.product.list_all_product", ["products" => common::getImage(products::all()),"categories" => category::all()]);
    }

    //    post store product
    public function store(Request $request)
    {
         products::create([
            "title" => $request->input("title"),
            "images" => json_encode($request->images),
            "description" => $request->description,
            "content" => $request->input("content"),
            "rate" => $request->input("rate"),
            "price" => $request->input("price"),
            "priceImport" => $request->input("priceImport"),
            "quantityRemain" => $request->input("quantityRemain"),
            "category" => $request->input("category"),
            "selled" => 0
                ]);
        return redirect()->back();
    }

    // put update product
    public function update(Request $request)
    {
        $product = products::find($request->_id_product);
        $currImagesArr = common::getImageOneProduct(($product));
        $newArr = explode(",",$request->images[0]);
        foreach ($currImagesArr->images as $filename) {
            if(!in_array($filename,$newArr)) {
                $path = public_path()."\images\\".$filename;
                if(file_exists($path)) unlink($path);
            }
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->priceImport = $request->priceImport;
        $product->quantityRemain = $request->quantityRemain;
        $product->category = $request->category;
        $product->content = $request->input('content');
        $product->images = json_encode($request->images);
        unset($product["image0"]);
        $product->save();
        return common::getImageOneProduct($product);
    }

    // delete  product
    public function delete(Request $request)
    {
        $productDel = products::find($request->id);
        $string = str_replace('["','',$productDel->images);
        $string1 = str_replace('"]','',$string);
        $images = explode(",",$string1);
        for($i=0;$i<count($images);$i++) {
            $path = public_path()."\images\\".$images[$i];
           if(file_exists($path)) unlink($path);
        }
        $productDel->delete();
        return $request->id;
    }

    // get search products
    public function searchProduct(Request $request)
    {
        return common::getImage(common::filterProduct($request,20));
    }

    // add quantity remain product
    public function addQuantity(Request $request,$id) {
        $product = products::find($id);
        $product->quantityRemain = $product->quantityRemain + (int) $request->quantity;
        $product->save();
        return $product;
    }

    // get product by ID
    public function getByID(Request $request)
    {
        return common::getImageOneProduct(products::find($request->_id));
    }
}
