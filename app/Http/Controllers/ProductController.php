<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        // dd($categories);

        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcategory = Category::all();
        return view('admin.product.create',compact('allcategory'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'product_name'=>'required',

            'description'=>'required',
            'price'=>'required|numeric',

            'image_url'=>'required|image|mimes:jpeg,png,jpg',
            'quantity'=>'required|numeric'

        ]);
        $data=[
            'product_name'=>$request['product_name'],
            'description'=>$request['description'],
            'price'=>$request['price'],
            'image_url'=>$request['image_url'],
            'quantity'=>$request['quantity'],



        ];


        if($request->hasFile('image_url'))
        {
            $image=$request->file('image_url');
            $name= time().'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images/product');
            $image ->move($destinationPath,$name);
            $data['image_url']=$name;    
            
        }

        

        Product::create($data);

        return redirect(route('admin.product.index'))->with('success','Product created sucessfully!');
        



        // dd($request->all());
                // dd($request->name); it prints the  single data

           
        
               // dd($data); // printing the data 
                
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $data= $request->validate([
            'product_name'=>'required',

            'description'=>'required',
            'price'=>'required|numeric',

            'image_url'=>'required|image|mimes:jpeg,png,jpg',
            'quantity'=>'required|numeric'



        ]);
        $oldgallery=Product::find($id);
       
        if($request->hasFile('image_url')){
            $image=$request->file('image_url');
            $name= uniqid().'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images/product');
            $image ->move($destinationPath,$name);
            
            File::delete(public_path('images/product/'.$oldgallery->image_url));

         
            $data['image_url']=$name;            
        }

        $product= Product::find($id);
        $product->update($data);
        return redirect(route('admin.product.index'))->with('success','Product updated sucessfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
