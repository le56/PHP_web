<?php

namespace App\Http\Controllers;

use App\Models\Home_slider;
use App\Models\products;
use App\Models\Screenshots;
use App\Models\Store_gallery;
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
    //  upload image not response 
    public static function upload_not_response($image) {
      $imagename = time()."".$image->getClientOriginalName();
      $image->move(public_path("images"),$imagename);
      return $imagename;
  }
    // update image upload product
    public function updateImageUpload(Request $request) { 
      if(isset($request->filenamedel)) {
        $path = public_path()."\images\\".$request->filenamedel;
        if(file_exists($path)) unlink($path);
      }

        $columnImage = $request->imagestt;
        $image = $request->file("file");
        $imagename = $request->getOriginalName;
        $image->move(public_path("images"),$imagename);
        // handle update  screen
        if($request->type === "screen") {
          $screen = Screenshots::find($request->idScreen);
          $screen->$columnImage = $imagename;
          $screen->save();
          return $imagename;
        }
        // handle update slider home
        if($request->type === "slider_home") {
          $screen = Home_slider::find($request->idSlider);
          $screen->$columnImage = $imagename;
          $screen->save();
          return $imagename;
         }
         // handle update store gallery
        if($request->type === "storeGallery") {
          $screen = Store_gallery::find($request->idStoreGallery);
          $screen->$columnImage = $imagename;
          $screen->save();
          return $imagename;
        }
        // handle update image product
        $updateProduct = products::find($request->_id_product);
        $updateProduct->$columnImage = $imagename;
        $updateProduct->save();
        return $imagename;
    }

    // upload image checkEditor 
    public function uploadImageCheckEditor(Request $request) {
      $request->validate([
       'upload' => 'image',
       ]);
    if ($request->hasFile('upload')) {
          $image = $request->file("upload");
          $imagename = time()."".$image->getClientOriginalName();
          $image->move(public_path("CKeditor/checkEditorUpload"),$imagename);
          return response()->json(["url" => asset('/public/CKeditor/checkEditorUpload/'.$imagename)]);
      }
    } 
  
    // destroy image
    public function destroy(Request $request) {
      $filename = $request->get("filename");
      if(isset($request->folder) && $request->folder === "ckEditor") 
      $path = public_path()."\CKeditor\checkEditorUpload\\".$filename; 
      else 
      $path = public_path()."\images\\".$filename;
      if(file_exists($path)) unlink($path);
      return $path;
    }
}
