@extends('layouts.app')

@section('content')


<h2 class="">Add Category</h2>
<hr class="h-1 mb-4 bg-blue-200">



<form action="{{ route('admin.category.store')}}" method="POST" class="mt-5">
@csrf
<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
      Category Name
      </label>      
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" name="categories_name" value="{{old('categories_name')}}"placeholder="Clothes">
      @error('categories_name')
      <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
  @enderror
    </div>


{{-- <input type="text" placeholder="Category Name" name="categories_name" class="w-full rounded-lg border-gray-300 my-2" value="{{old('categories_name')}}">
 --}}

<div class="flex">
<input class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300" type="submit" value="Add Category">
<a class="bg-red-600 text-black px-4 py-2 mx-2 rounded-lg shadow-md hover:shadow-amber-300"href="{{route('admin.category.index')}}">Cancel</a>



</div>

</form>


@endsection
