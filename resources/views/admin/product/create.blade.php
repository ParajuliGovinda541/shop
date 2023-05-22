@extends('layouts.app')

@section('content')


<form  action="{{ route('product.store')}}"method="POST"class="w-full max-w-lg" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
          Product Name
        </label>      
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" name="product_name" value="{{old('product_name')}}"placeholder="Clothes">
        @error('product_name')
        <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror
      </div>

      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
          Description
        </label>
        
        <textarea class=" appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="description" value="{{old('description')}}"id="grid-last-name" type="text" placeholder="Clothing (also known as clothes, garments, dress, apparel, or attire) is any item worn on the body. Typically, clothing is made of fabrics or textiles, but over time it has included garments made from animal skin and other thin sheets of materials and natural products found in the environment"></textarea>
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
          <input name="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="price" value="{{old('price')}}" placeholder="1000">
          @error('price')
          <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
      @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Image
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="image_url" value="{{old('image_url')}}" id="grid-last-name" type="file" placeholder="">
          @error('image_url')
          <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
      @enderror
        </div>
      </div><div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Quantity
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="quantity" value="{{old('quantity')}}" placeholder="10">
          @error('quantity')
          <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
      @enderror
        </div>
       <div>
        <select class= "text-black"name="categories_id" id="">
          <option value="">Select Category</option>
          @foreach ($allcategory as $cat)
          <option value="{{$cat->id}}">{{$cat->categories_name}}</option>
          @endforeach
                @error('categories_name')
      <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
  @enderror
        </select>
       </div>
      </div>
      <div class="flex">
        <input class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300" type="submit" value="Add Product">
        <a class="bg-red-600 text-black px-4 py-2 mx-2 rounded-lg shadow-md hover:shadow-amber-300"href="{{route('admin.product.index')}}">Cancel</a>
        
        
        
        </div>
   
    
  </form>   

@endsection
