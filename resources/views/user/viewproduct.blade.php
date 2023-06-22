@include('layouts.message')
@include('user.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


    <title>
        @yield('title')
    </title>

</head>

<body>
    @include('user.navbar')

    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" mt-5 ml-10 mb-20 max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{ asset('images/product/' . $product->image_url) }}" alt="Product Image">
            <div class="px-5 py-3">
                <div class="font-bold text-xl mb-2">{{ $product->product_name }}</div>
                <p class="text-gray-700 text-base">{{ $product->description }}</p>
                <p class="text-gray-700 text-base">Price: Rs {{ $product->price }}</p>

            </div>
            <div class="px-6 py-4">
                <input type="hidden" name="product_id" value="{{ $product->id }}" readonly>
                <input type="number" value="1" min="1" max="{{ $product->quantity }}" name="qty"
                    value="qty">
                <input type="hidden" class="" name="product_name" value="{{ $product->product_name }}">

                <input type="hidden" name="image_url" value="{{ $product->image_url }}">

                <input type="submit" value="Add to cart"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">

            </div>
        </div>

    </form>


    <div>
        <h1 class="text-center text-4xl">Featured Products</h1>
    </div>
    <br>
    <div class="grid grid-cols-4">
    
        {{-- Cards start here --}}
        @foreach ($relatedproducts as $relatedproduct)
            <div class="mt-5 ml-10 max-w-sm rounded overflow-hidden shadow-lg static">
                <div class="option">
                    <a href="{{ route('user.viewproduct', $relatedproduct->id) }}" class="option 1">Product Details</a>
                    <a href="#" class="option 2">Buy Now</a>
                </div>
                <img class="w-full" src="{{ asset('images/product/' . $relatedproduct->image_url) }}" alt="Product Image">
                <div class="px-5 py-3">
                    <div class="font-bold text-xl mb-2">{{ $relatedproduct->product_name }}</div>
                    <p class="text-gray-700 text-base">Price: Rs {{ $relatedproduct->price }}</p>
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



     <br>




        @include('user.footer')

</body>

</html>
