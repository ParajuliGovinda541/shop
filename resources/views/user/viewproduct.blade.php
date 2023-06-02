



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

    <div class=" mt-5 ml-10 mb-20 max-w-sm rounded overflow-hidden shadow-lg">
      <img class="w-full" src="{{asset('images/product/'.$product->image_url)}}" alt="Product Image">
      <div class="px-5 py-3">
        <div class="font-bold text-xl mb-2">{{$product->product_name}}</div>
        <p class="text-gray-700 text-base">{{$product->description}}</p>
        <p class="text-gray-700 text-base">Price: Rs {{$product->price}}</p>  
      </div>
      <div class="px-6 py-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Add to Cart
        </button>        
      </div>
    </div>
    @include('user.footer')
    
</body>
</html>









