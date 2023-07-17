@extends('links.links')
@section('title', 'Emporium')
@include('user.navbar')
<br>

<div>
    <h1 class="text-center text-4xl">Wishlist Products</h1>
</div>
<br>
<div class="grid grid-cols-4">

    {{-- Cards start here --}}
    @foreach ($products as $product  )
        <div class="mt-5 ml-10 max-w-sm rounded overflow-hidden shadow-lg static">
            <div class="option">
                <a href="{{ route('user.viewproduct', $product->id) }}" class="option 1">Product Details</a>
                <a href="#" class="option 2">Buy Now</a>
           
    
              
            </div>
            <img class="w-full" src="{{ asset('images/product/' . $product->image_url) }}" alt="Product Image">
            <div class="px-5 py-3">
                <div class="font-bold text-xl mb-2">{{ $product->product_name }}</div>
                <p class="text-gray-700 text-base">Price: Rs {{ $product->price }}</p>
            </div>  
            <div class="px-6 py-4">
                <!-- Product details content -->
            </div>
        </div>
        
        {{-- cards end here --}}
    @endforeach

</div>
<div class=" flex items-center justify-between p-4">


    {{-- <div class="text-end py-5">
  <button class="rounded-full">
    <a href="{{ route('user.product') }}" class="option 1">View  Products</a>
    </button>
</div> --}}

</div>












{{-- @endsection --}}
