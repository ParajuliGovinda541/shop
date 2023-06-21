<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{


    public function include()
    {
        if (!auth()->user()) {
            return 0;
        } else {
            return cart::where('user_id', auth()->user()->id)->where('is_ordered', false)->count();
        }
    }


    public function index()

    {
        return view('user.wishlist');
    }

    public function store($product_id)

    {
        $itemsincart = $this->include();
        $categories = Category::all();
        $products = Product::all();



        $wish = wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first();
        if (isset($wish)) {
            return back()->with('success', 'Product already in in Wishlist');
        } else {
            wishlist::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product_id
            ]);
        }



        return redirect(route('user.index', compact('itemsincart', 'categories')))->with('success', 'Product added  in Wishlist');
    }

    public function wishlistcount($id)
    {
        $itemsincart = $this->include();
        $categories = Category::all();
        $products = Product::all();
        $wishcount = Wishlist::where('user_id', auth()->user()->id)->count();
        dd($wishcount);

        return redirect(route('user.index', compact('itemsincart', 'categories', 'wishcount')));
    }
}
