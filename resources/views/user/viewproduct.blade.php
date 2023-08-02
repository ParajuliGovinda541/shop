@include('user.master')
@include('layouts.message')
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body class="bg-gray-100">

    <header>
        @include('user.navbar')
    </header>

    <main class="container mx-auto px-4 py-8">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full h-56 object-cover" src="{{ asset('images/product/' . $product->image_url) }}"
                alt="Product Image">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $product->product_name }}</div>
                <p class="text-gray-700 text-base">{{ $product->description }}</p>
                <p class="text-gray-700 text-base">Price: Rs {{ $product->price }}</p>
            </div>
            {{-- <div class="px-6 py-4">
                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center">
                        <input type="number" value="1" min="1" name="qty"
                            class="w-20 py-2 px-3 border border-gray-300 rounded mr-4">
                        <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                        <input type="hidden" name="image_url" value="{{ $product->image_url }}">
                        @if ($product->quantity > 0)
                        <span class="bg-green-500 text-white px-2 py-1 rounded">In Stock</span>
                    @else
                        <span class="bg-red-500 text-white px-2 py-1 rounded">Out of Stock</span>
                    @endif
                    
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add to
                            Cart</button>
                    </div>
                    @error('qty')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </form>
            </div> --}}
            <div class="px-6 py-4">
                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center">
                        <label for="qty" class="mr-4">Quantity:</label>
                        <input type="number" id="qty" name="qty" value="1" min="1"
                            class="w-20 py-2 px-3 border border-gray-300 rounded @error('qty') border-red-500 @enderror">
                        <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                        <input type="hidden" name="image_url" value="{{ $product->image_url }}">
                        @if ($product->quantity > 0)
                            <span class="ml-4 px-2 py-1 text-green-800 bg-green-200 rounded">In Stock ({{ $product->quantity }} available)</span>
                        @else
                            <span class="ml-4 px-2 py-1 text-red-800 bg-red-200 rounded">Out of Stock</span>
                        @endif
                        <button type="submit"
                            class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded @if ($product->quantity <= 0) cursor-not-allowed opacity-50 @endif"
                            @if ($product->quantity <= 0) disabled @endif>
                            Add to Cart
                        </button>
                    </div>
                    @error('qty')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </form>
            </div>
            
        </div>

        <div class="my-8">
            <h1 class="text-center text-4xl font-bold">Related Products</h1>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($relatedproducts as $relatedproduct)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <div class="option flex justify-center space-x-4 py-2">
                    <a href="{{ route('user.viewproduct', $relatedproduct->id) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Product Details</a>
                    {{-- <a href="" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Buy
                        Now</a> --}}
                </div>
                <img class="w-full h-56 object-cover" src="{{ asset('images/product/' . $relatedproduct->image_url) }}"
                    alt="Product Image">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $relatedproduct->product_name }}</div>
                    <p class="text-gray-700 text-base">Price: Rs {{ $relatedproduct->price }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <footer>
        @include('user.footer')
    </footer>

</body>

</html>
