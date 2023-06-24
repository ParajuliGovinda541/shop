<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{

  

  public $status ,$email;
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    public function details($orderid)
    {
        $order = Order::find($orderid);
        $carts = Cart::whereIn('id', explode(',', $order->cart_id))->get();
        return view('admin.order.details', compact('carts'));
    }

    public function status($id, $status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        $data = [

            'ordermessage' => 'Your Order Is being'. $status,
        ];
        $this->status=$status;
        $this->email=$order->user->email;
        
            Mail::send('email.emailorder', $data, function ($ordermessage) {
                $ordermessage->to($this->email)
                    ->subject("Order is:". $this->status);
            });
        
        return redirect(route('admin.order.index'))->with('success', 'Status changed to ' . $status);
    }
}
