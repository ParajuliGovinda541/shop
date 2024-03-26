<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;





class DashboardController extends Controller
{

    public function index()
    {
    $products=Product::count();
    $categories= Category::count();
    $contacts= Contact::count();
    $order= Order::count();
    $users= User::count();
    $totalNewOrders = Order::where('status', 'pending')->count(); // Assuming 'status' is used to track order status
    

    $orderdates = Order::orderBy('date','desc')->limit(40)->distinct()->pluck('date')->toArray();
    $orderdates = array_reverse($orderdates);
    $ordercounts = [];
    foreach($orderdates as $ordr)
    {
        $count = Order::where('date',$ordr)->count();
        array_push($ordercounts,$count);
    }

    $datesOnly = array_values($orderdates);
    foreach ($datesOnly as $date) {
        $date = str_replace('"', '', $date);
    }
    
    $orderdates = $datesOnly;

    // dd($categories);
    // return view('admin.dashboard', compact());

    return view('dashboard',compact('products','categories','contacts','order','users','ordercounts','orderdates','totalNewOrders'));
    }

}