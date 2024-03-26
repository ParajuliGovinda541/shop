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





    <div>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- component -->
        <div class="grid grid-cols-2 gap-4">            
            <div class="bg-grey-lighter min-h-screen flex flex-col">
                <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                    <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <h1 class="mb-8 text-3xl text-center">Edit Profile</h1>

                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Image
                                </label>
                                <img class="w-20" src="{{ asset('images/user/' . auth()->user()->image_url) }}" alt="">
                                
                                
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    name="image_url" value="{{ auth()->user()->image_url }}" id="grid-last-name"
                                     placeholder="No Image Selected">
                                @error('image_url')
                                    <p class="text-red-600 text-xs -mt-2">{{ $message }}</p>
                                @enderror
                            </div>


                            <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4"
                                name="name" placeholder="Full Name" value="{{ auth()->user()->name }}" />

                            <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4"
                                name="phone" placeholder="Phone" value="{{ auth()->user()->phone }}" />

                            <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4"
                                name="address" placeholder="Address" value="{{ auth()->user()->address }}" />
                            <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4"
                                name="email" placeholder="Email" value="{{ auth()->user()->email }}" />
                            <a href="{{ route('user.profileedit', auth()->user()->id) }}" type="submit"
                                class="text-center ml-24 px-2 py-3 bg-red-500 rounded bg-green text-black hover:bg-green-dark focus:outline-none my-1">Edit
                                Account</a>

                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    {{-- @include('user.body') --}}

    <div>
        @yield('content')
    </div>

    @include('user.footer')

</body>

</html>
