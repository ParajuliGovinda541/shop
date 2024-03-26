@include('user.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    @include('links.links')


    <title>
        @yield('title')
    </title>

</head>

<body>
    @include('user.navbar')



    <!-- resources/views/recommendations.blade.php -->

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-semibold mb-4">Recommended Products</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($products as $product)
                <div class="border p-4">
                    <a href="{{ route('user.viewproduct', $product->id) }}">
                    <img class="w-full h-56 object-cover" src="{{ asset('images/product/' . $product->image_url) }}"
                    alt="Product Image">
                    </a>
                    <h2 class="text-lg font-semibold">{{ $product->product_name }}</h2>
                </div>
            @endforeach
        </div>
    </div>
@endsection



    @include('user.recommendation')

    {{-- @include('user.slider') --}}

    @include('user.showcategory')




    


    {{-- @include('user.product') --}}



    {{-- @include('user.body') --}}

    <div>
        @yield('content')
    </div>

    @include('user.contact')

    @include('user.footer')

</body>

</html>
