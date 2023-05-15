<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    @include('layouts.navigation')
        <div class="min-h-screen flex flex-row bg-gray-100 dark:bg-gray-900">
           

           <div class="flex flex-row justify-center py-10 w-64  text-white  bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 min-h-screen">
           
           <div class="flex flex-col gap-3 text-lg min-h-full m-5 rounded-sm ">
            <a href="" class="hover:bg-white p-1 hover:text-gray-800 border-b-2">Dashboard</a>
            <a href="{{route('admin.product.index')}}" class="hover:bg-white p-1 hover:text-gray-800 border-b-2">Products</a>
            <a href="{{route('admin.category.index')}}" class="hover:bg-white p-1 hover:text-gray-800 border-b-2">Category</a>
            <a href="" class="hover:bg-white p-1 hover:text-gray-800 border-b-2">Dashboard</a>
            <a href="" class="hover:bg-white p-1 hover:text-gray-800 border-b-2">Dashboard</a>
           
           </div>

           </div>
           <!-- COntents -->
           <div class="p-6 text-white text-md">
            @yield('content')
           </div>
          

          
           

           
        </div>

        
    </body>
</html>
