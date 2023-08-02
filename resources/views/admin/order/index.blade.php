@extends('layouts.app')

@section('content')

@include('layouts.message')
<h2 class="font-bold text-4xl text-blue-700">Order</h2>
<hr class="h-1 bg-blue-200">

<br>
<div class="px-2 ml-96">
  <div class="flex mb-4">
    <button id="reloadButton" class="bg-blue-600 px-4 py-2 mr-2 rounded text-white hover:bg-blue-700">View All</button>
    <button id="pendingButton" class="bg-green-600 px-2 py-1 mr-2 rounded text-white hover:shadow-blue-400">Pending</button>
    <button id="processingButton" class="bg-yellow-600 px-2 py-1 mr-2 rounded text-white hover:shadow-blue-400">Processing</button>
    <button id="verifiedButton" class="bg-red-600 px-2 py-1 mr-2 rounded text-white hover:shadow-blue-400">Verified</button>
  </div>
</div>
<table id="mytable">
  <thead>
    <th>S.N</th>
    <th>Order Date</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Amount</th>
    <th>Payment Mode</th>
    <th>Status</th>
    <th>Action</th>
  </thead>
  <tbody>
    @php
    $sn=1
    @endphp
    @foreach($orders as $order)
    <tr class="order-row" data-status="{{$order->status}}">
      <td>{{$sn++}}</td>
      <td>{{$order->date}}</td>
      <td>{{$order->person_name}}</td>
      <td>{{$order->phone}}</td>
      <td>{{$order->street}}</td>
      <td>{{$order->amount}}</td>
      <td>{{$order->payement_method}}</td>
      <td>{{$order->status}}</td>
      <td>
        <a href="{{route('admin.order.details',$order->id)}}" class="bg-blue-600 px-2 py-1 rounded text-white hover:shadow-blue-600">View Details</a>
        <a onclick="return confirm('Are you sure want to change status?')" href="{{route('admin.order.status',[$order->id,'Processing'])}}" class="bg-green-600 px-2 py-1 rounded text-white hover:shadow-blue-400">Processing</a>
        <a onclick="return confirm('Confirm Order?')" href="{{route('admin.order.status',[$order->id,'Verified'])}}" class="bg-red-600 px-2 py-1 rounded text-white hover:shadow-blue-400">Ordered</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<script>
  let table = new DataTable('#mytable');


  const reloadButton = document.getElementById("reloadButton");
  reloadButton.addEventListener("click", function() {
    location.reload();
  });

  // Get the button elements
  const pendingButton = document.getElementById("pendingButton");
  const processingButton = document.getElementById("processingButton");
  const verifiedButton = document.getElementById("verifiedButton");

  // Function to handle button clicks
  function handleClick(event) {
    const buttonId = event.target.id;

    // Remove active class from all buttons
    pendingButton.classList.remove("active");
    processingButton.classList.remove("active");
    verifiedButton.classList.remove("active");

    // Add active class to the clicked button
    event.target.classList.add("active");

    // Show/hide rows based on the button clicked
    const rows = document.getElementsByClassName("order-row");
    for (let i = 0; i < rows.length; i++) {
      const row = rows[i];
      const status = row.getAttribute("data-status");

      if (buttonId === "pendingButton" && status === "Pending") {
        row.style.display = "table-row";
      } else if (buttonId === "processingButton" && status === "Processing") {
        row.style.display = "table-row";
      } else if (buttonId === "verifiedButton" && status === "Verified") {
        row.style.display = "table-row";
      } else {
        row.style.display = "none";
      }
    }
  }

  // Add click event listeners to the buttons
  pendingButton.addEventListener("click", handleClick);
  processingButton.addEventListener("click", handleClick);
  verifiedButton.addEventListener("click", handleClick);
</script>

@endsection
