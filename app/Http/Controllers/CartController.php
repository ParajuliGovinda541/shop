<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth ;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->user())
        {
            $itemsincart = 0;
        }
        else
        {
            $itemsincart = Cart::where('user_id',auth()->user()->id)->count();
        }

        $categories = Category::all();
       $products=Product::all();


        $carts = Cart::where('user_id',auth()->user()->id)->get();

        return view('user.viewcart',compact('carts','categories','products'));
        return view('viewcart',compact('carts','categories','itemsincart'));

    }
 
    
    public function mycart()
    {
        if(!auth()->user())
        {
            $itemsincart = 0;
        }
        else
        {
            $itemsincart = Cart::where('user_id',auth()->user()->id)->count();
        }
      

        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $categories = Category::all();
    
        return view('user.mycart', compact('carts', 'categories','itemsincart'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);       
        $data = $request->validate([ 

            'qty' => 'required',
            'image_url' => 'required',

            'product_id' => 'required',
            'product_name' => 'required',



        ]);
        if($request->hasFile('image_url'))
        {
            $image=$request->file('image_url');
            $name= time().'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images/cart');
            $image ->move($destinationPath,$name);
            $data['image_url']=$name;    
            
        }

        $data['user_id'] = auth()->user()->id;

        //check if already exist
        $check = Cart::where('product_id',$data['product_id'])->where('user_id',$data['user_id'])->count();
        if($check > 0)
        {
            return back()->with('success','Item already in Cart');
        }
// dd($check);
        Cart::create($data);
        return back()->with('success','Item added to Cart');
    }






    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
