<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            {{ config('app.name', 'Emporium') }}
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 @include('links.links')


 <style>
    /* Dashboard Styling */
    .dashboard {
    background: linear-gradient(135deg, #2980b9, #6ab0de); /* Gradient colors: Blue to Light Blue */
    color: #fff; /* Text color on the gradient background */
    padding: 20px; /* Adjust padding as needed */
}

    /* Add any additional custom styles for the dashboard here */
</style>


    </head>
    <body class="font-sans antialiased">
    @include('layouts.navigation')
        <div class="min-h-screen  flex flex-row bg-gray-100 dark:bg-gray-900">
           

           <div class="flex flex-row justify-center py-10 w-64  text-white  bg-gray-900 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 min-h-screen">
           
           <div class="flex flex-col gap-3 text-lg min-h-full m-5 rounded-sm ">
            <a href="{{route('dashboard')}}" class="hover:bg-white p-1 hover:text-gray-800 border-b-2">Dashboard</a>
            <a href="{{route('admin.product.index')}}" class="hover:bg-white p-1 hover:text-gray-800 border-b-2">Products</a>
            <a href="{{route('admin.category.index')}}" class="hover:bg-white p-1 hover:text-gray-800 border-b-2">Category</a>
            <a href="{{route('admin.order.index')}}" class="hover:bg-white p-1 hover:text-gray-800 border-b-2">Order</a>
            <a href="{{route('contact.index')}}" class="hover:bg-white p-1 hover:text-gray-800 border-b-2">Feedback</a>
            <a href="" class="hover:bg-white p-1 hover:text-gray-800 border-b-2">Settings</a>

           
           </div>

           </div>
           <!-- COntents -->
           <div class="flex-1 dashboard"> <!-- Apply the 'dashboard' class here -->
            @yield('content')
        </div> 

           <div>
            
           </div>
          

          
           

           
        </div>

        
    </body>
</html>
