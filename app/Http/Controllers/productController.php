<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;

class productController extends Controller
{
    // get show create product
    public function showCreateProduct()
    {
        return view("Admin.create_product",["categories" => category::all()]);
    }

    // get  all list product, return wiew
    public function showAll()
    {
        return view("Admin.list_all_product", ["products" => products::all(),"categories" => category::all()]);
    }

    //    post store product
    public function store(Request $request)
    {
        $product = products::create([
            "title" => $request->input("title"),
            "image" => $request->input("image"),
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
        $product->image = $request->image;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->content = $request->input('content');
        $product->save();
        return $product;
    }

    // delete delete product
    public function delete(Request $request)
    {
        products::find($request->id)->delete();
        return $request->id;
    }

    // get search products
    public function searchProduct(Request $request)
    {
        $query = $request->search;
        $result = products::orderBy('created_at', 'desc')
            ->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('content', 'LIKE', '%' . $query . '%')->get();
        return $result;
    }

    // get product by ID
    public function getByID(Request $request)
    {
        return products::find($request->_id);
    }
}
