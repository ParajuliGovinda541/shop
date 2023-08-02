<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;

use App\Models\Category;
use App\Models\Product;
use App\Models\wishlist;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth ;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function wishcount()
     {
         if (!auth()->user()) {
             return 0;
         } else {
             return wishlist::where('user_id', auth()->user()->id)->count();
         }
     }
    public function index()
    {
        if(!auth()->user())
        {
            $itemsincart = 0;
        }
        else
        {
            $itemsincart = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }

        $categories = Category::all();
       $products=Product::all();
       $wishcounts=$this->wishcount();



        $carts = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->get();

        return view('user.viewcart',compact('carts','categories','products','wishcounts'));
        return view('viewcart',compact('carts','categories','itemsincart','wishcounts'));

    }
 
    
    public function mycart()
    {
        if(!auth()->user())
        {
            $itemsincart = 0;
        }
        else
        {
            $itemsincart = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }
      

        $carts = Cart::where('user_id', auth()->user()->id)->where('is_ordered',false)->get();
        $categories = Category::all();
        
        $wishcounts=$this->wishcount();
    
        return view('user.mycart', compact('carts', 'categories','itemsincart','wishcounts'));
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
        
        


        $product=Product::find($request->product_id);

        $productQty=$product->quantity;

        // dd($productQty);

        $data = $request->validate([ 

            'qty' => 'required|numeric|max:'.$productQty,
            'image_url' => 'required',

            'product_id' => 'required',
            'product_name' => 'required',



        ]);
        // dd($data);
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
        $check = Cart::where('product_id',$data['product_id'])->where('user_id',$data['user_id'])->where('is_ordered',false)->count();
        if($check > 0)
        {
            return back()->with('success','Item already in Cart');
        }
// dd($check);
        Cart::create($data);
        $product->quantity=$product->quantity-$request->qty;


        $product->save();





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
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
     
    }
}
