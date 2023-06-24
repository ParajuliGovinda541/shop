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

    // dd($categories);

    return view('dashboard',compact('products','categories','contacts','order','users'));
    }

}