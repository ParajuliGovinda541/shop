@extends('layouts.app')
@section('content')

<h2 class="font-bold text-4xl text-blue-700" >Edit Categories</h2>
<hr class="h-2 mb-4 bg-blue-200">


    <form action="{{ route('admin.category.update',$category->id)}}" enctype="multipart/form-data" method="POST" class="mt-5">
@csrf
        
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
            Category Name
            </label>      
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" name="categories_name" value="{{$category->categories_name}}"placeholder="Clothes">
            @error('categories_name')
            <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
        @enderror
          </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
              Image
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="image_url" value="{{$category->image_url}}" id="grid-last-name" type="file" placeholder="">
            @error('image_url')
            <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
        @enderror
          </div>
   
        <div class="flex">
    <input class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300" type="submit" value="Update">
    <a class="bg-red-600 text-black px-4 py-2 mx-2 rounded-lg shadow-md hover:shadow-amber-300"href="{{route('admin.category.index')}}">Cancel</a>



        </div>
        
    </form>


@endsection
