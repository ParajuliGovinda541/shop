<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;


use Illuminate\Http\Request;

class FrontuserController extends Controller
{


    // public function showcategory()
    // {
    //     $categories=Category::all();
    //     // dd($categories);

    //     return view('user.showcategory',compact('categories'));
    // }



    public function index()
    {
        $products= Product::paginate(8);
        $categories=Category::all();

        return view('user.index',compact('products','categories'));
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


    public function home()
    {
        // $products = Product::paginate(2);
        // $categories = Category::orderBy('priority')->get();
        return view('user.index');
    }

    public function userlogin()
    {
        return view('user.userlogin');
    }


    public function userregister()
    {
        return view('user.userregister');
    }

    public function userstore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user';

        User::create($data);
        return redirect(route('user.index'));
    }

    public function product()
    {
        $products= Product::paginate(100 );

        return view('user.product',compact('products'));

    }

}   

