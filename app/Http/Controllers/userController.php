<?php

namespace App\Http\Controllers;

use App\Http\common\common;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function showUser(Request $request) {
        // return common::filterUser($request,20);
        return view('Admin.user.listUser',["users"=>common::filterUser($request,20)]);
    }
   /******* ADMIN CAN USER */
    public function deleteUser($id) {
     $user = User::find($id);
     $user->delete();
     return $id;
    }

    public function toggleActive($id) {
    $user = User::find($id);
    $user->active = !$user->active;
    $user->save();
    return $user;
    }

    public function searchUser(Request $request) {
        return common::filterUser($request,20);
    }
   /********* USER CAN USE */
    public function updateProfile(Request $request) {
        $user = User::find(auth()->user()->id);
        $user->name =  $request->name;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        if($request->file("avatar")) {
            $filename = $request->avatar;
            $path = public_path()."\images\\".$filename;
            if(file_exists($path)) unlink($path);
            $image = uploadImageController::upload_not_response($request->file("avatar"));
            $user->avatar =  $image;
        }
        $user->save();
        return redirect()->back();
    }

    public function showUserProfile() {
        return view("pages.User.userProfile");
    }


}
