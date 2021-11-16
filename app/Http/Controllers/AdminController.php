<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\products;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

session_start();
class AdminController extends Controller
{
    public function index()
    {
        $admin_name = Session::get('admin_name');
        if($admin_name)
        return redirect("/dashboard");
        return view('admin_login');
    }
    public function show_dashboard()
    {
       $admin_name = Session::get('admin_name');
       if($admin_name){   
           $products = products::all();
        //    $revenue =  0;
        //    foreach($products as $product) {
        //     $rev = ((int)$product->selled * (float)$product->price) - ((int)$product->selled * (float)$product->priceImport);
        //     $revenue += $rev;
        //    }
           return view('Admin.dashboard',["totalUser"=>User::count(),"totalOrder"=> Order::count(),"totalProductRemain"=>products::count(),"revenue"=>Order::sum("totalPrice")]);
       }
       return view('admin_login');
    }
    public function dashboard(Request $request)
    {
           $admin_email = $request->admin_email;
           $admin_pass = md5($request->admin_password);
           $result = DB::table('admin')->where('admin_email', $admin_email)->where('admin_password', $admin_pass)->first();
           if (isset($result)) {
               Session::put('admin_name', $result->admin_name);
               Session::put('admin_id', $result->admin_id);
               return Redirect::to('/dashboard');
           } else {
               Session::put('messages', 'Wrong user name or password !');
               return Redirect::to('/admin');
           }
    }
    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }
}
