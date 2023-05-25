{{-- @extends('user.index') --}}

@section('title','Emporium')
{{-- @section('content') --}}
{{-- <div class="max-w-sm rounded overflow-hidden shadow-lg">
    <img class="w-full" src="{{asset('images/user/slider/slider3.jpg')}}" alt="Sunset in the mountains">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
      <p class="text-gray-700 text-base">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
      </p>
    </div>
    <div class="px-6 pt-4 pb-2">
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
    </div>
  </div> --}}

<div>
    <h1 class="text-center text-4xl">Our Products</h1>
</div>
  <div class="grid grid-cols-3 ">
    {{-- Cards start here --}}
    <div class=" mt-5 ml-10 max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full" src="{{asset('images/user/slider/slider3.jpg')}}" alt="Product Image">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">Product Name</div>
          <p class="text-gray-700 text-base">Product description</p>
          <p class="text-gray-700 text-base">Price: $19.99</p>
        </div>
        <div class="     px-6 py-4">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add to Cart
          </button>
          <svg class="h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
          
        </div>
      </div>
      {{-- cards end here --}}

          {{-- Cards start here --}}
    <div class=" mt-5 ml-10 max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full" src="{{asset('images/user/slider/slider3.jpg')}}" alt="Product Image">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">Product Name</div>
          <p class="text-gray-700 text-base">Product description</p>
          <p class="text-gray-700 text-base">Price: $19.99</p>
        </div>
        <div class="     px-6 py-4">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add to Cart
          </button>
          <svg class="h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
          
        </div>
      </div>
      {{-- cards end here --}}

          {{-- Cards start here --}}
    <div class=" mt-5 ml-10 max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full" src="{{asset('images/user/slider/slider3.jpg')}}" alt="Product Image">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">Product Name</div>
          <p class="text-gray-700 text-base">Product description</p>
          <p class="text-gray-700 text-base">Price: $19.99</p>
        </div>
        <div class="     px-6 py-4">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add to Cart
          </button>
          <svg class="h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
          
        </div>
      </div>
      {{-- cards end here --}}
  </div>

  
  

{{-- @endsection --}}