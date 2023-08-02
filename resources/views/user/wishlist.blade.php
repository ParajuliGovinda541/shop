@extends('links.links')
@section('title', 'Emporium')
@include('user.navbar')

<div class="container mx-auto py-8">
    <h1 class="text-center text-4xl font-bold mb-4">Wishlist Products</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        {{-- Cards start here --}}
        @foreach ($wishlistproducts as $wishlistproduct)
        @php
            $product=$wishlistproduct->product;
        @endphp
            <div class="mt-5 relative max-w-md rounded-lg overflow-hidden shadow-lg">
                <img class="w-full h-56 object-cover" src="{{ asset('images/product/' . $product->image_url) }}" alt="Product Image">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $product->product_name }}</div>
                    <p class="text-gray-700 text-base">Price: Rs {{ $product->price }}</p>
                    <div class="flex justify-center mt-4">
                        <a href="{{ route('user.viewproduct', $product->id) }}" class="btn-blue mr-2">Product Details</a>
                        <a href="{{ route('user.viewproduct', $product->id) }}" class="btn-green">Buy Now</a>
                    </div>
                </div>
                <div class="absolute top-0 right-0 p-2 hidden">
                    <a href="{{ route('user.wishlist.destroy', $wishlistproduct->id) }}" class="btn-red">
                        <i class="fas fa-times"></i> <!-- Font Awesome delete icon -->
                    </a>
                </div>
            </div>
        @endforeach
        {{-- cards end here --}}
    </div>
</div>

<style>
    /* ... existing styles ... */

    /* Show the delete button only while hovering */
    .max-w-md:hover .absolute {
        display: block;
    }
</style>





<style>

    .btn-blue { background-color: #1E40AF; }
    .btn-green { background-color: #22C55E; }
    .btn-red { background-color: #F87171; }
    .btn-blue, .btn-green, .btn-red {
        display: inline-block;
        color: white;
        font-weight: bold;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        text-decoration: none;
        margin-right: 0.5rem;
    }
    .btn-blue:hover, .btn-green:hover, .btn-red:hover { filter: brightness(90%); }

    

</style>
