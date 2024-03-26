<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\wishlist;
use Illuminate\Contracts\Session\Session;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;

class FrontuserController extends Controller
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
            return Cart::where('user_id', auth()->user()->id)->where('is_ordered', false)->count();
        }
    }


    public function khalti()
    {
        return view('user.khalti')
    ;}

    public function index()
    {
        $wishcounts=$this->wishcount();
        $itemsincart = $this->include();
        $products = Product::paginate(8);
        
        $categories = Category::all();

        return view('user.index', compact('products', 'categories', 'itemsincart','wishcounts'));


    }

    public function recommendation()
    {
        return view('user.recommendation');
    }
    public function recentlyAdded()
    {
        $latestProduct = Product::latest()->first()->paginate(4);
    
        return view('user.recommendation', ['latestProduct' => $latestProduct]);
    }
    
    public function about()
    {
        return view('user.about');
    }
    public function viewproduct(Product $product)

    {
        $itemsincart = $this->include();
        $wishcounts=$this->wishcount();

        $relatedproducts = Product::where('categories_id', $product->categories_id)->whereNot('id', $product->id)->get();
        return view('user.viewproduct', compact('product', 'itemsincart', 'relatedproducts','wishcounts'));
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

    public function product(Request $request)
{
    $itemsincart = $this->include();
    $wishcounts = $this->wishcount();

    $sortOptions = $request->input('sort', []);

    $products = Product::query();

    if (in_array('price_high_to_low', $sortOptions)) {
        $products->orderBy('price', 'desc');
    }
    if (in_array('price_low_to_high', $sortOptions)) {
        $products->orderBy('price', 'asc');
    }
    if (in_array('name_a_to_z', $sortOptions)) {
        $products->orderBy('product_name', 'asc');
    }
    if (in_array('name_z_to_a', $sortOptions)) {
        $products->orderBy('product_name', 'desc');
    }

    $products = $products->paginate(8);

    return view('user.product', compact('products', 'itemsincart', 'wishcounts'));
}

    

    // route for viewing category

    public function viewcategory($id)

    {
        $category = Category::find($id);
        $products = Product::where('categories_id', $id)->paginate(2);
        $categories = Category::all();
        $itemsincart = $this->include();
        $wishcounts=$this->wishcount();

        return view('user.viewcategory', compact('products', 'categories', 'itemsincart', 'category','wishcounts'));

        // return response($product);

        // return view('user.viewcategory',compact('categories','itemsincart','products')); 
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect(route('user.mycart'))->with('success', 'Cart deleted sucessfully!');
    }

  

    public function orderedproduct(Request $request)
    {
        //  dd($request->all());
        $data=$request->toArray();
            // = $request->validate([
            //     'street' => 'required',
            //     'city' => 'required',
            //     'country' => 'required',
            //     'zipcode' => 'required|numeric',
            //     'phone' => 'required|numeric',
            //     'person_name' => 'required',
            //     'payement_method' => 'required',
            // ]);

        $currentDate = Carbon::now()->toDateString();
        $data['status'] = 'Pending';
        $data['date'] = $currentDate;
        $carts = Cart::where('user_id', auth()->user()->id)->where('is_ordered', false)->get();
        $totalprice = 0;

        foreach ($carts as $cart) {
            $total = $cart->product->price * $cart->qty;
            $totalprice += $total;
        }
        $data['amount'] = $totalprice;
        $ids = $carts->pluck('id')->toArray();

        $data['cart_id'] = implode(',', $ids);
        $data['user_id'] = auth()->user()->id;
        //    dd($data);

        // print_r($data);  
        $order=$data['data'];
        $order['amount']=$totalprice;
        $order['status']='Pending';
        $order['cart_id']=implode(',', $ids);
        $order['user_id'] = auth()->user()->id;
        $currentDate = Carbon::now()->toDateString();
        $order['date'] = $currentDate;



        
        Order::create($order);
        Cart::whereIn('id', $ids)->update(['is_ordered' => true]);

        $msg=[
            'mailmessage'=> 'Your Order has Been Submitted'
        ];
        Mail::send('email.email',$msg, function($message){
            $message->to(auth()->user()->email)
            ->subject(' Order Requested');
        });


        // return redirect(route('user.orderedproduct'))->with('success', 'item orderd sucessfully!');


        
        session()->flash('success','Product Order SucessFully');

        return response()->json($data);


    }

    public function ordertable()
    {
        $wishcounts=$this->wishcount();
        $itemsincart = $this->include();
        $orders = Order::where('user_id', auth()->user()->id)->get();
        $products = Product::all();
        foreach ($orders as $order) {
            $cartids = explode(',', $order->cart_id);
            $carts = [];
            foreach ($cartids as $cartid) {
                $cart = cart::find($cartid);
                array_push($carts, $cart);
            }
            $order->carts = $carts;
        }
        
        return view('user.orderedproduct', compact('itemsincart', 'orders', 'products','wishcounts'));
    }

    public function profileedit(Request $id)
    {

        $user = User::find($id);
        return view('user.profileedit', compact('user'));
    }

    public function checkout()
    {
        $wishcounts=$this->wishcount();
        $itemsincart = $this->include();
        $carts = Cart::where('user_id', auth()->user()->id)->where('is_ordered', false)->get();
        return view('user.checkout', compact('itemsincart', 'carts','wishcounts'));
    }

    public function search(Request $request)
    {
        if ($request->search) {
            $searchTerm = $request->search;
            
            $searchproducts = Product::where(function ($query) use ($searchTerm) {
                $query->where('product_name', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('price', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhereHas('categories', function ($query) use ($searchTerm) {
                          $query->where('categories_name', 'LIKE', '%' . $searchTerm . '%');
                      });
            })
            ->latest()
            ->paginate(5);
    
            return view('user.search', compact('searchproducts'));
        } else {
            return redirect()->back()->with('message', 'Empty Search');
        }
    }
    
}
