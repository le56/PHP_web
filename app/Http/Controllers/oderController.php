<?php

namespace App\Http\Controllers;

use App\Http\common\common;
use App\Models\Order;
use Illuminate\Http\Request;

class oderController extends Controller
{
    public function showOrder() {
        return view('Admin.order.listOrder',["orders"=>Order::all()]);
    }

    public function deleteOrder($id) {
        $order = Order::find($id);
        $order->delete();
        return $order->id;
    }

    public function searchOrder(Request $request) {
        return common::filterOrder($request,20);
    }
}
