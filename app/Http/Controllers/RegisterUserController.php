<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;

use Illuminate\Http\Request;


class RegisterUserController extends Controller
{
    //

    public function index()
    {
        $users=User::all();
        // dd($categories);

        return view('admin.registeruser.index',compact('users'));
    }
    public function details($userid)
    {
        $users = User::find($userid);
         $carts = Cart::whereIn('id', explode(',', $users->cart_id))->get();
        return view('admin.registeruser.details', compact('users','carts'));
    }
}
