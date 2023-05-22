<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;




class DashboardController extends Controller
{

    public function index()
    {
    $products=Product::count();
    $categories= Category::count();
    // dd($categories);

    return view('dashboard',compact('products','categories'));
    }

}