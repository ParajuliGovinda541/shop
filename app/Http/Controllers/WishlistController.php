<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function store(Request $request,$id)

{
    return $id;
      wishlist::create([
        'user_id'=> auth()->user()->id,
        'product_id'=>$id
        ]);
    
    return view('user.wishlist');

}
}
