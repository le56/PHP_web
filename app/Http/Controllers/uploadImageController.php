<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class uploadImageController extends Controller
{
  // upload image
    public function store(Request $request) {
        $image = $request->file("file");
        $imagename = $image->getClientOriginalName();
        $image->move(public_path("images"),$imagename);
        return response()->json(["success" => $imagename]);
    }
    // update image upload 
    public function updateImageUpload(Request $request) { 
      if(isset($request->filenamedel)) {
        $path = public_path()."\images\\".$request->filenamedel;
        if(file_exists($path)) unlink($path);
      }
        $orderImage = $request->imagestt;
        $image = $request->file("file");
        $imagename = $request->getOriginalName;
        $image->move(public_path("images"),$imagename);
        $updateProduct = products::find($request->idProduct);
        $updateProduct->$orderImage = $imagename;
        $updateProduct->save();
        return $imagename;
    }
    // destroy image
    public function destroy(Request $request) {
      $filename = $request->get("filename");
      $path = public_path()."\images\\".$filename;
      if(file_exists($path)) unlink($path);
      return $filename;
    }
}
