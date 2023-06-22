<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;



use Illuminate\Http\Request;

class OrderController extends Controller
{
 public function index()
 {
    $orders= Order::all();
    return view('admin.order.index',compact('orders'));
 }

 public function details($orderid)
 {
   $order= order::find($orderid);
   $carts= Cart::whereIn('id',explode(',',$order->cart_id))->get();
   return view('admin.order.details',compact('carts'));
 }
 public function status($id,$status)
 {
   $order= Order::find($id);
   $order->status=$status;
   $order->save();
   return redirect(route('admin.order.index'))->with('sucess','Status Change to'.$status);
 }
}
