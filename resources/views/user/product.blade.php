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
    <form action="{{route('wishlist.store',$product->id)}}" method="POST">

        <div class="mt-5 ml-10 max-w-sm rounded overflow-hidden shadow-lg static">
            <div class="relative">
                <img class="w-full h-50 object-cover" src="{{ asset('images/product/' . $product->image_url) }}" alt="Product Image">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center text-white bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity">
                    <div class="px-5 py-3">
                        <div class="font-bold text-xl mb-2">{{ $product->product_name }}</div>
                        <p class="text-gray-700 text-base">Price: Rs {{ $product->price }}</p>
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
    @endforeach

</div>
<div class="flex items-center justify-between p-4">

    <div class="mx-24 my-10 ">
        {{ $products->links() }}
    </div>

</div>

