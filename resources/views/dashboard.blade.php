@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-4xl text-blue-700">Dashboard</h2>

    <hr class="h-1 mb-4 bg-blue-200">

    <div class="flex mt-4  gap-20">
        <div class="px-4 py-8 rounded-lg bg-blue-600 text-white flex-justify-between">
            <p class="font-bold text-lg">Total Products</p>
            <a class=" px-4 py-2 mx-2 rounded-lg hover:shadow-amber-300"href="{{ route('admin.product.index') }}"></a>
            <h1>{{ $products }}</h1>

        </div>

        <div class="px-4 py-8 rounded-lg bg-blue-600 text-white flex-justify-between">
            <h1></h1>
            <p class="font-bold text-lg">Total Orders</p>
            <a class=" px-4 py-2 mx-2 rounded-lg hover:shadow-amber-300"href="{{ route('admin.order.index') }}"></a>
            <h1>{{$order}}</h1>  
        </div>


        <div class="px-4 py-8 rounded-lg bg-blue-600 text-white flex-justify-between">
            <p class="font-bold text-lg">Total Categories</p>
            <a class=" px-4 py-2 mx-2 rounded-lg hover:shadow-amber-300"href="{{ route('admin.category.index') }}"></a>
            <h3>{{ $categories }}</h3>

        </div>

        <div class="px-4 py-8 rounded-lg bg-blue-600 text-white flex-justify-between">
            <p class="font-bold text-lg">Total Feedback</p>
            <a class=" px-4 py-2 mx-2 rounded-lg hover:shadow-amber-300"href="{{ route('contact.index') }}"></a>
            <h3>{{ $contacts }}</h3>

        </div>

        <div class="px-4 py-8 rounded-lg bg-blue-600 text-white flex-justify-between">
            <p class="font-bold text-lg">Total Users</p>
            <a class=" px-4 py-2 mx-2 rounded-lg hover:shadow-amber-300"href="{{ route('user.index') }}"></a>
            <h3>{{$users}}</h3>

        </div>
    </div>
@endsection
