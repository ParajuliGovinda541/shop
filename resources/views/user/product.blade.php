<!DOCTYPE html>
<html>
<head>
    <!-- Your head content goes here -->
    <style>
        .sorting-dropdown {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
}

.sorting-dropdown select {
    width: 100%;
    border: none;
    border-radius: 0.25rem;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    color: #333;
    background-color: #fff;
}

.sorting-dropdown .dropdown-toggle::after {
    content: '';
    display: none;
}

.sorting-dropdown .dropdown-toggle:hover::after {
    display: block;
    width: 0;
    height: 0;
    border-top: 3px solid transparent;
    border-bottom: 3px solid transparent;
    border-left: 7px solid #000;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}
    </style>
</head>
<body>
    @extends('links.links')
    @include('user.master')
    @section('title', 'Emporium')
    <br>
    <div class="navbar fixed top-0 left-0 right-0 bg-white z-50">
        @include('user.navbar')
    </div>
    <div>
        <h1 class="text-center text-4xl">Featured Products</h1>
    </div>
   <!-- Add this code where you want the dropdown menu to appear -->
   <div class="sorting-dropdown">
    <form id="sort-form" action="{{ route('user.product') }}" method="GET">
        <label for="sort-dropdown">Sort by:</label>
        <select id="sort-dropdown" name="sort[]" multiple onchange="document.getElementById('sort-form').submit()">
            <option value="price_high_to_low" {{ in_array('price_high_to_low', request('sort', [])) ? 'selected' : '' }}>Price (High to Low)</option>
            <option value="price_low_to_high" {{ in_array('price_low_to_high', request('sort', [])) ? 'selected' : '' }}>Price (Low to High)</option>
            <option value="name_a_to_z" {{ in_array('name_a_to_z', request('sort', [])) ? 'selected' : '' }}>Name (A to Z)</option>
            <option value="name_z_to_a" {{ in_array('name_z_to_a', request('sort', [])) ? 'selected' : '' }}>Name (Z to A)</option>
        </select>

        
    </form>
</div>
    
    
    <div class="grid grid-cols-4 gap-4">
     
        
        {{-- Cards start here --}}
        @foreach ($products as $product)
        <form action="{{route('wishlist.store',$product->id)}}" method="POST">

            <a href="{{ route('user.viewproduct', $product->id) }}">
                <div class="mt-5 ml-10 max-w-sm rounded overflow-hidden shadow-lg relative">
                    <img class="w-full h-50 object-cover" src="{{ asset('images/product/' . $product->image_url) }}" alt="Product Image">
                    <div class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center text-white bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity">
                        <div class="px-5 py-3">
                            <div class="font-bold text-xl mb-2">{{ $product->product_name }}</div>
                            <p class="text-red-700 font-semibold">Price: Rs {{ $product->price }}</p>
                        </div>  
                        <div class="px-6 py-4">
                            <!-- Product details content -->
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-75">
                        <a href="{{ route('user.viewproduct', $product->id) }}" class="block text-center text-white font-semibold hover:text-red-500">Product Details</a>
                    </div>
                    <div class="absolute top-0 right-0 m-2">
                        @csrf
                        <button  type="submit" class="wish-button bg-transparent text-gray-600 hover:text-red-500">
                            {{-- <input type="hidden" name="product_id" value="{{$product->id}}"> --}}
                            <i class="far fa-heart"></i> 
                        </button>
                    </div>
                </div>
            </a>
        </form>
        @endforeach
    </div>
    <div class="flex items-center justify-between p-4">
        <div class="mx-24 my-10 ">
            {{-- {{ $products->links() }} --}}
            <!-- Display pagination links -->
{{ $products->appends(['sort' => request('sort')])->links() }}

        </div>
    </div>
    @include('user.footer')
</body>
<script>
    function handleSortChange(select) {
        var selectedValue = select.value;
        var url = "{{ route('user.product') }}" + "?sort=" + selectedValue;
        window.location.href = url;
    }

    
    document.getElementById('sort-dropdown').addEventListener('change', function () {
        document.getElementById('sort-form').submit();
    });


</script>

</html>
