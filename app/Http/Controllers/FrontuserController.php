<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
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
            return Cart::where('user_id',auth()->user()->id)->count();
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

        return view('user.viewproduct',compact('product','itemsincart'));
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
    // dd($request->all());

    $data 
    = $request->validate([ 
        'amount' => 'required',
       
        
        'cart_id' => 'required',


    ]);
    $currentDate = Carbon::now()->toDateString();
    $data['status'] = 'pending';
    $data['date'] = $currentDate;

    
    $data['user_id'] = auth()->user()->id;

    Order::create($data);

    return redirect(route('user.mycart'))->with('success','item orderd sucessfully!');
}
}   

