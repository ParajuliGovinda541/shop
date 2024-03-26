@include('links.links')
@extends('layouts.app')
@section('content')

<h2 class="font-bold text-4xl text-blue-700">Dashboard</h2>
<hr class="h-1 mb-4 bg-blue-200">

<div class="flex mt-4 space-x-8">
    <a href="{{ route('admin.product.index') }}" class="w-1/5 px-6 py-4 rounded-lg bg-blue-600 text-white">
        <p class="font-semibold text-lg">Total Products</p>
        <h1 class="text-2xl">{{ $products }}</h1>
    </a>

    <a href="{{ route('admin.order.index') }}" class="w-1/5 px-6 py-4 rounded-lg bg-blue-600 text-white">
        <p class="font-semibold text-lg">Total Orders</p>
        <h1 class="text-2xl">{{ $order}}</h1>
    </a>

    <a href="{{ route('admin.category.index') }}" class="w-1/5 px-6 py-4 rounded-lg bg-blue-600 text-white">
        <p class="font-semibold text-lg">Total Categories</p>
        <h1 class="text-2xl">{{ $categories }}</h1>
    </a>

    <a href="{{ route('contact.index') }}" class="w-1/5 px-6 py-4 rounded-lg bg-blue-600 text-white">
        <p class="font-semibold text-lg">Total Feedback</p>
        <h1 class="text-2xl">{{ $contacts }}</h1>
    </a>

    <a href="{{ route('registeruser.index') }}" class="w-1/5 px-6 py-4 rounded-lg bg-blue-600 text-white">
        <p class="font-semibold text-lg">Total Users</p>
        <h1 class="text-2xl">{{ $users }}</h1>
    </a>
</div>

<div class="mt-8">
    <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="openPopup()">
        Show New Orders
    </button>
    
    <!-- Include the pop-up form -->
    @include('new_order_popup')
</div>


<div class="container mx-auto px-4 py-8">
    <canvas id="myLineChart" class="max-w-screen-md h-64"></canvas>
  </div>

  <script>








    // Sample data for the line chart
    const labels = {!! json_encode($orderdates) !!};
const totalSalesData = {!! json_encode($ordercounts) !!}; // Replace with your total sales data for each day of the month

const title = 'Monthly Sales';

// Configuration options
const options = {
responsive: true,
maintainAspectRatio: false,
scales: {
x: {
beginAtZero: true
},
y: {
beginAtZero: true
}
}
};

// Get the canvas element and initialize the chart
const ctx = document.getElementById('myLineChart').getContext('2d');
const myLineChart = new Chart(ctx, {
type: 'line',
data: {
labels: labels,
datasets: [
{
label: title,
borderColor: 'rgba(255, 99, 132, 1)',
backgroundColor: 'rgba(255, 99, 132, 0.2)',
data: totalSalesData,
fill: true,
}
]
},
options: options
});





function openPopup() {
    var popup = document.getElementById('newOrderPopup');
    popup.classList.remove('hidden');
}

function closePopup() {
    var popup = document.getElementById('newOrderPopup');
    popup.classList.add('hidden');
}


  </script>


@endsection

