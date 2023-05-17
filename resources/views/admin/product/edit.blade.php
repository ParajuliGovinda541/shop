@extends('layouts.app')
@section('content')

<h2 class="font-bold text-4xl text-blue-700" >Edit Products</h2>
<hr class="h-2 mb-4 bg-blue-200">


    <form action="{{ route('admin.product.update',$product->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
@csrf

       
   
<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
        Product Name
      </label>      
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" name="product_name" value="{{$product->product_name}}"placeholder="Clothes">
      @error('product_name')
      <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
  @enderror
    </div>

    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Description
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="description" value="{{$product->description}}"id="grid-last-name" type="text" placeholder="Clothing (also known as clothes, garments, dress, apparel, or attire) is any item worn on the body. Typically, clothing is made of fabrics or textiles, but over time it has included garments made from animal skin and other thin sheets of materials and natural products found in the environment">
      @error('description')
      <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
  @enderror
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
         Price
        </label>
        <input name="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="price" value="{{$product->price}}" placeholder="1000">
        @error('price')
        <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror  
    </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
          Image
        </label>
        <img  class= "w-20" src="{{asset('images/product/'.$product->image_url)}}" alt ="">
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="image_url" value="{{$product->image_url}}" id="grid-last-name" type="file" placeholder="">
        @error('image_url')
        <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror  
    </div>
    </div><div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
          Quantity
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="quantity" value="{{$product->quantity}}" placeholder="10">
        @error('quantity')
        <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror
    </div>
     {{-- <div>
      <select name="categories_name" id="">
        <option value="">Select Category</option>
        @foreach ($allcategory as $cat)
        <option value="{{$cat->categories_name}}">{{$cat->categories_name}}</option>
        @endforeach
      </select>
     </div> --}}
    </div>
    <div class="flex">
      <input class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300" type="submit" value="Add Product">
      <a class="bg-red-600 text-black px-4 py-2 mx-2 rounded-lg shadow-md hover:shadow-amber-300"href="{{route('admin.product.index')}}">Cancel</a>
      
      
      
      </div>
 
  
</form>   

        
    </form>


@endsection
