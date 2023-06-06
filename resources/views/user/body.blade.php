{{-- @extends('user.index') --}}

@section('title', 'Emporium')
<br>

<div>
    <h1 class="text-center text-4xl">Our Products</h1>
</div>
<br>
<div class="grid grid-cols-4">
    {{-- Cards start here --}}
    @foreach ($products as $product)
        <div class=" mt-5 ml-10 max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{ asset('images/product/' . $product->image_url) }}" alt="Product Image">
            <div class="px-5 py-3">
                <div class="font-bold text-xl mb-2">{{ $product->product_name }}</div>
                <p class="text-gray-700 text-base">{{ $product->description }}</p>
                <p class="text-gray-700 text-base">Price: Rs {{ $product->price }}</p>
            </div>
            <div class="px-6 py-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add to Cart
                </button>


            </div>
        </div>
        {{-- cards end here --}}
    @endforeach

</div>




{{-- @endsection --}}
