@extends('layouts.app')

@section('content')


@include('layouts.message')
    <h2 class="font-bold text-4xl text-blue-700" >Order</h2>
    <hr class="h-1 bg-blue-200">

<br>

    <table id="mytable">
        <thead>
            <th>S.N</th>
            <th> Order Date</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Amount</th>
            <th>Payement Mode</th>
            <th>Status</th>
            <th>Action</th>

        </thead>
        <tbody>
            @php
            $sn=1
        @endphp
            @foreach($orders as $order)
            <tr>
                <td>{{$sn++}}</td>
                <td>{{$order->date}}</td>
                <td>{{$order->person_name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->street}}</td>
                <td>{{$order->amount}}</td>
                <td>{{$order->payement_method}}</td>
                <td>{{$order->status}}</td>




                <td>
                    <a href="{{route('admin.order.details',$order->id)}}"class="bg-blue-600 px-2 py-1 rounded text-white hover:shadow-blue-600">View Details</a>
                    <a onclick="return confirm('Are you sure want to change status?')" href="{{route('admin.order.status',[$order->id,'Processing'])}}"class="bg-red-600 px-2 py-1 rounded text-white hover:shadow-blue-400">Processing</a>
                    <a onclick="return confirm('Are you sure want to change status?')" href="{{route('admin.order.status',[$order->id,'Verified'])}}"class="bg-red-600 px-2 py-1 rounded text-white hover:shadow-blue-400">Ordered</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        let table = new DataTable('#mytable');
    </script>

@endsection