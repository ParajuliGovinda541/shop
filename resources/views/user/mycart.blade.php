<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Your Page Title</title>
</head>

<body class="bg-gray-300">

    <header>
        @include('user.navbar')
    </header>

    <main class="py-12">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg md:max-w-5xl">
            <div class="md:flex">
                <div class="w-full p-4 px-5 py-5">
                    <div class="md:grid md:grid-cols-3 gap-4">

                        {{-- Cart show component --}}
                        <livewire:user.cart.cart-show />

                        {{-- Cart items and checkout section --}}
                        <div class="col-span-2">
                            @if ($carts->isEmpty())
                            <div class="bg-red-500 border-t border-b border-blue-500 text-white px-4 py-3 rounded-t-md rounded-b-md"
                                role="alert">
                                <p class="font-bold">Informational message</p>
                                <p class="text-xl font-mono">Please Add Items For Further Features.</p>
                            </div>
                            @else
                            {{-- <div class="p-4">
                                <h2 class="text-xl font-bold mb-4">Your Cart Items</h2>
                                {{-- Display cart items here --}}
                            {{-- </div> --}} 
                            <div class="p-4 mt-4 border-t border-gray-300">
                                <a href="{{ route('user.checkout') }}"
                                    class="block w-full py-3 px-4 bg-blue-500 text-white font-bold rounded focus:outline-none hover:bg-blue-600">
                                    Check Out
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Your additional scripts here (if needed) --}}

    <footer>
        @include('user.footer')
    </footer>

</body>

</html>
