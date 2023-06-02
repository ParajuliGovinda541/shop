<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontuserController extends Controller
{
    public function index()
    {
        $products= Product::paginate(4);

        return view('user.index',compact('products'));
    }

    public function about()
    {
       

        return view('user.about');
    }
    public function viewproduct(Product $product)

    {
        // $products= Product::all();
        // return response($product);

        return view('user.viewproduct',compact('product'));
    }

}   

