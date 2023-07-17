@extends('links.links')
@section('title', 'Emporium')
@include('user.navbar')
@include('layouts.message')
<br>

<div>
    <h1 class="text-center text-4xl">Search Results</h1>
</div>
<br>
<div class="grid grid-cols-4">
    {{-- Cards start here --}}
    @forelse ($searchproducts as $product)
    <form action="{{route('wishlist.store',$product->id)}}" method="POST">

        <div class="mt-5 ml-10 max-w-sm rounded overflow-hidden shadow-lg static">
            <div class="relative">
                <img class="w-full h-50 object-cover" src="{{ asset('images/product/' . $product->image_url) }}" alt="Product Image">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center text-white bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity">
                    <div class="px-5 py-3">
                        <div class="font-bold text-xl mb-2">{{ $product->product_name }}</div>
                        <p class="text-red-700 font-semibold">Price: Rs {{ $product->price }}</p>
                    </div>  
                    <div class="px-6 py-4">
                        <!-- Product details content -->
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-75">
                    <a href="{{ route('user.viewproduct', $product->id) }}" class="block text-center text-white font-semibold hover:text-red-500">Product Details</a>
                </div>
                <div class="absolute top-0 right-0 m-2">
                    @csrf
                    <button  type="submit" class="wish-button bg-transparent text-gray-600 hover:text-red-500">
                        {{-- <input type="hidden" name="product_id" value="{{$product->id}}"> --}}
                        <i class="far fa-heart"></i> 
                    </button>
                </form>

                </div>
            </div>
        </div>
        @empty
        <div class="flex flex-col items-center justify-center h-64">
            <div class="flex flex-col items-center justify-center h-64">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-400 mb-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a8 8 0 100 16A8 8 0 0010 2zm1 10h3l-4 5v-3H6v-4h4V7l4 5z" clip-rule="evenodd" />
                </svg>
                <h1 class="text-3xl text-gray-700 font-semibold text-center">No results found.</h1>
                <p class="text-gray-500 text-center mb-4">Please try searching with a different keyword.</p>
                <a href="{{ route('user.product') }}" class="text-blue-600 underline hover:text-blue-800">Browse our products</a>
            </div>
            
        
        @endforelse

</div>
<div class="flex items-center justify-between p-4">

    {{-- <div class="mx-24 my-10 ">
        {{ $products->links() }}
    </div> --}}

</div>

