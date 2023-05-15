@extends('layouts.app')
@section('content')

<h2 class="font-bold text-4xl text-blue-700" >Edit Categories</h2>
<hr class="h-2 mb-4 bg-blue-200">


    <form action="{{ route('admin.category.update',$category->id)}}" method="POST" class="mt-5">
@csrf
        <input type="text" placeholder="Category Name" name="categories_name" class="w-full rounded-lg border-gray-300 my-2" value="{{$category->categories_name}}">
        @error('categories_name')
            <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
        @enderror
   
        <div class="flex">
    <input class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300" type="submit" value="Update">
    <a class="bg-red-600 text-black px-4 py-2 mx-2 rounded-lg shadow-md hover:shadow-amber-300"href="{{route('admin.category.index')}}">Cancel</a>



        </div>
        
    </form>


@endsection
