@extends('links.links')
@section('title', 'Emporium')
<br>

<div>
    <h1 class="text-center text-4xl">Featured Products</h1>
</div>
<br>
<div class="grid grid-cols-4">

    {{-- Cards start here --}}
    @foreach ($products as $product)
        <div class="mt-5 ml-10 max-w-sm rounded overflow-hidden shadow-lg static">
            <div class="option">
                <a href="{{ route('user.viewproduct', $product->id) }}" class="option 1">Product Details</a>
                <a href="#" class="option 2">Buy Now</a>
                <form action="" method="POST">
                    <a href="{{route('user.wishlist.store',$product->id)}}" class="wishlist-btn absolute top-2 right-2 bg-gray-200 text-gray-600 hover:text-gray-800 hover:bg-gray-300 transition duration-300 ease-in-out px-3 py-1 rounded">
                        <i class="fas fa-heart"></i>
                    </a>
                </form>
              
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

    <div class="mx-24 my-10 ">
        {{ $products->links() }}
    </div>

    {{-- <div class="text-end py-5">
  <button class="rounded-full">
    <a href="{{ route('user.product') }}" class="option 1">View  Products</a>
    </button>
</div> --}}

</div>











{{-- @endsection --}}
