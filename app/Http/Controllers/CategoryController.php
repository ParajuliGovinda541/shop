<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        // dd($categories);

        return view('admin.category.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // dd($request->name); it prints the  single data

        $data = $request->validate([
            'categories_name'=>'required'
        ]);

       // dd($data); // printing the data 
        

        Category::create($data);
        return redirect(route('admin.category.index'))->with('success','Category created sucessfully!');


    }


    public function edit($id)
    {
        $category= Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $data= $request->validate([
            'categories_name'=>'required'
        

        ]);

        $category= Category::find($id);
        $category->update($data);
        return redirect(route('admin.category.index'))->with('success','Category updated sucessfully!');

    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect(route('admin.category.index'))->with('success','Category deleted sucessfully!');

    }
}