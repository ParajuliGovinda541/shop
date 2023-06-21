<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\wishlist;

use Carbon\Carbon;


    
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;


use Illuminate\Http\Request;

class FrontuserController extends Controller
{


    public function include()
    {
        if(!auth()->user())
        {
            return 0;
        }
        else
        {
            return Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }
    }



    public function index()
    {
        $itemsincart = $this->include();
        $products= Product::paginate(8);
        $categories=Category::all();

        return view('user.index',compact('products','categories','itemsincart'));
    }

    public function about()
    {
       

        return view('user.about');
    }
    public function viewproduct(Product $product)

    {
        $itemsincart = $this->include();


        return view('user.viewproduct',compact('product','itemsincart',));
    }


    public function home()
    {
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
        $itemsincart = $this->include();

        $products= Product::paginate(5);

        return view('user.product',compact('products','itemsincart'));

    }

// route for viewing category

public function viewcategory($id)

{
    $category = Category::find($id);
    $products = Product::where('categories_id',$id)->paginate(2);
    $categories = Category::all();
    $itemsincart = $this->include();
    return view('user.viewcategory',compact('products','categories','itemsincart','category'));

    // return response($product);

    // return view('user.viewcategory',compact('categories','itemsincart','products')); 
}

public function destroy($id)
{
    $cart = Cart::find($id);
    $cart->delete();
    return redirect(route('user.mycart'))->with('success','cart deleted sucessfully!');
}

public function orderedproduct(Request $request)
{
    //  dd($request->all());
    $data 
    = $request->validate([ 
        'street'=>'required',
        'city'=>'required',
        'country'=>'required',
        'zipcode'=>'required|numeric',
        'phone'=>'required|numeric',
        'person_name'=>'required',
        'payement_method'=>'required',
    ]);

    $currentDate = Carbon::now()->toDateString();
    $data['status'] = 'Pending';
    $data['date'] = $currentDate;
    $carts=Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->get();
$totalprice=0;

    foreach($carts as $cart)
    {
        $total=$cart->product->price * $cart->qty;
        $totalprice += $total;

    }
    $data['amount'] = $totalprice;
    $ids=$carts->pluck('id')->toArray();

$data['cart_id']= implode(',',$ids);
    $data['user_id'] = auth()->user()->id;
    //    dd($data);

   
    Order::create($data);
    Cart::whereIn('id',$ids)->update(['is_ordered'=>true]);

    return redirect(route('user.orderedproduct'))->with('success','item orderd sucessfully!');
}

public function ordertable()
{
    $itemsincart = $this->include();
    $orders = Order::where('user_id', auth()->user()->id)->get();
    $products= Product::all();
    foreach($orders as $order)
    {
        $cartids = explode(',',$order->cart_id);
        $carts = [];
        foreach($cartids as $cartid)
        {
            $cart = cart::find($cartid);
            array_push($carts,$cart);
        }
        $order->carts = $carts;
    }
    // dd($carts);
    return view('user.orderedproduct',compact('itemsincart','orders','products'));

}

public function profileedit( Request $id)
{

    $user= User::find($id);
    return view('user.profileedit',compact('user'));

}

public function checkout()
{
    $itemsincart= $this->include();
    $carts=Cart::where('user_id', auth()->user()->id)->where('is_ordered',false)->get();

   return view('user.checkout',compact('itemsincart','carts'));

}   

}

