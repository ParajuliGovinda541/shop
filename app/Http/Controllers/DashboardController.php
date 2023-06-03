<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;

use Illuminate\Http\Request;
use App\Models\Product;




class DashboardController extends Controller
{

    public function index()
    {
    $products=Product::count();
    $categories= Category::count();
    $contacts= Contact::count();

    // dd($categories);

    return view('dashboard',compact('products','categories','contacts'));
    }

}