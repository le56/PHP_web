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
}
