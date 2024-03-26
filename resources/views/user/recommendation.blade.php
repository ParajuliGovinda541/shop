<section class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-semibold mb-16 text-center">Recently Added Products</h2>

    @if ($products->isEmpty())
        <p class="text-gray-500">No recently added products.</p>
    @else
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <li class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 hover:bg-gray-100">
                    <a href="{{ route('user.viewproduct', $product->id) }}">
                        <img src="{{ asset('images/product/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-36 sm:h-80 md:h-96 object-cover rounded-t-lg">
                    </a>
                    <div class="p-4">
                        <h3 class="text-xl text-center font-semibold mb-2 hover:text-white transition-colors duration-300 shadow-md">{{ $product->product_name }}</h3>
                        {{-- <p class="text-gray-600">{{ $product->created_at->format('Y-m-d H:i:s') }}</p> --}}
                    </div>
                </li>
            @endforeach

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </ul>
    @endif
</section>
