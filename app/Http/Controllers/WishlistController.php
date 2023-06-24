<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\wishlist;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{


    public function wishcount()
    {
        if (!auth()->user()) {
            return 0;
        } else {
            return wishlist::where('user_id', auth()->user()->id)->count();
        }
    }

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
       $wishcounts=$this->wishcount();
        // dd($wishcounts);
        $itemsincart = $this->include();
        $categories = Category::all();
        $products = Product::all();
        return view('user.wishlist',compact('itemsincart', 'categories','wishcounts'));
    }

    public function store($product_id)
    {
     
        $wish = wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first();
        if (isset($wish)) {
            return back()->with('success', 'Product already in in Wishlist');
        } else {
            wishlist::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product_id
            ]);
        }
        // dd($product_id)

        return redirect('/')    ->with('success', 'Product added  in Wishlist');
    }


    public function show()
    {
        $wishlistproducts= Wishlist::where('user_id',auth()->user()->id)->pluck('product_id');
         $products = Product::whereIn('id',$wishlistproducts->toArray())->get();

        // dd($products);
        return view('user.wishlist', compact('products'))    ;
    }

    public function wishlistcount($id)
    {
        $itemsincart = $this->include();
        $categories = Category::all();
        $products = Product::all();
        $wishcounts = Wishlist::where('user_id', auth()->user()->id)->count();
        // dd($wishcount);

        return redirect(route('user.index', compact('itemsincart', 'categories', 'wishcounts')));
    }
}
