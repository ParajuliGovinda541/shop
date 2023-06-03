
<div>
    <h1 class="text-center text-4xl">Featured Categories</h1>
</div>
<br>
    <div class="grid grid-cols-5">
    @foreach ($categories as $category)
    <div class="flex flex-wrap justify-center ">
        <a href="#" class="max-w-sm rounded overflow-hidden shadow-lg m-4 static">
            <img class="w-full" src="{{ asset('images/category/'. $category->image_url) }}" alt="Category 1">
            <div class="absolute bottom-0 left-0 w-full bg-gray-900 bg-opacity-50 text-white text-center p-2 opacity-0 transition-opacity duration-300 hover:opacity-200">
                <span class="font-bold text-lg">category 2</span> 
                
            </div>
        </a>

    <p>hwlo</p>


        <!-- Add more category cards here as needed -->
    </div>  
    @endforeach
    </div>

