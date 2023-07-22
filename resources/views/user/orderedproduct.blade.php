@include('user.master')
@include('layouts.message')

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

<br>
<div>
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex items-center justify-between pb-4">
        <div>
      
            <!-- Dropdown menu -->
    
            {{-- ends here --}}
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <form action="{{ route('user.orderedproduct') }}"method="GET" role="search" >
            
            <input type="text" id="table-search" value="{{Request::get('search')}}" name="search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
        </div>
    </div>
    <div style="height: 455px; overflow: auto;">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs sticky top-0 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
               
                <th scope="col" class="px-6 py-3">
                    S.N
                </th>
                <th scope="col" class="px-6 py-3">
                    Product Image
                 </th>
                <th scope="col" class="px-6 py-3">
                    Product Name
                </th>
              
                <th scope="col" class="px-6 py-3">
                    Amount
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Ordered Date
                </th>
             
            </tr>
        </thead>
        <tbody>


            @php
                // dd($orders[0]->carts[0]->product);
            @endphp
@for($i = 0; $i < count($orders); $i++)
@php
    $order = $orders[$i];
    $cart = $order->carts[0] ?? null; // Use null if $order->carts is empty
@endphp
@if($cart)
    <tr>
        <td class="px-6 py-4">
            {{$order->id}}
        </td>
        <td>
            <img class="w-16" src="{{asset('images/product/'.$cart->product->image_url)}}" alt="">
        </td>
        <td class="px-6 py-4">
            {{$cart->product->product_name}}
        </td>
        <td class="px-6 py-4">
            {{$cart->product->price}}
        </td>
        <td class="px-6 py-4">
            {{$order->status}}
        </td>
        <td class="px-6 py-4">
            {{$order->date}}
        </td>
    </tr>
@endif
@endfor

  
                {{-- @forelse ($orders as $order)

                <tr >
                

                    <td class="px-6 py-4" >
                        {{$order->id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$order->user->name}}
                    
                    </td>
                    <td class="px-6 py-4">
                        {{$order->cart_id}}

                    </td>
                    <td class="px-6 py-4">
                        {{$order->amount}}

                    </td>
                    <td class="px-6 py-4">
                        {{$order->status}}

                    </td>
                    <td class="px-6 py-4">
                        {{$order->date}}

                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                    @empty
                        <div>
                            <h1 class="text-center">No Orders Available</h1>
                        </div>
                        
                
                </tr>
              
                @endforelse --}}
           
             
        </tbody>
    </table>
</div>

</div>


    {{-- @include('user.footer') --}}

    <!-- Add the JavaScript code here -->
  <script>
    // Get the dropdown element
    const dropdown = document.getElementById('dropdownRadio');

    // Add an event listener to show/hide the dropdown on click
    dropdown.addEventListener('click', () => {
      dropdown.classList.toggle('hidden');
    });

    // Get all radio input elements within the dropdown
    const radioInputs = dropdown.querySelectorAll('input[type="radio"]');

    // Add an event listener to each radio input
    radioInputs.forEach((input) => {
      input.addEventListener('change', () => {
        // Perform some action based on the selected radio input
        console.log(`Selected value: ${input.value}`);
      });
    });
  </script>
</body>


</html>