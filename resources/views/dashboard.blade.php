@extends('layouts.app')
@section('content')

<h2 class="font-bold text-4xl text-blue-700">Dashboard</h2>

<hr class="h-1 mb-4 bg-blue-200">

    <div class="mt-4 grid grid-cols-3 gap-20">
        <div class="px-4 py-8 rounded-lg bg-blue-600 text-white flex-justify-between">   
            <p class="font-bold text-lg">Total News</p>
            <p class="font-bold text-5xl">400</p>

        </div>

        <div class="px-4 py-8 rounded-lg bg-green-600 text-white flex-justify-between">   

            <p class="font-bold text-lg">Total News</p>
            <p class="font-bold text-5xl">400</p>
    </div>

    <div class="px-4 py-8 rounded-lg bg-red-600 text-white flex-justify-between">   
        <p class="font-bold text-lg">Total News</p>
        <p class="font-bold text-5xl">400</p>

</div>
    </div>
@endsection



