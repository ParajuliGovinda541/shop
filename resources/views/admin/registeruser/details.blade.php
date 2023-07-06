@extends('layouts.app')

@section('content')


@include('layouts.message')
    <h2 class="font-bold text-4xl text-blue-700" >User Details</h2>
    <hr class="h-1 bg-blue-200">

<div class="my-4 text-right px-10">
    <a class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300"href="{{route('registeruser.index')}}">Back</a>
</div>
<h1>Nothing to show</h1>


    <table id="mytable">
        <thead>
            <th>S.N</th>
            <th>User Name</th>


        </thead>
        <tbody>
            @php
            $sn=1
        @endphp
            @foreach($carts as $cart)
            <tr>
                <td>{{$sn++}}</td>
            <td><img  class= "w-20" src="{{asset('images/product/'.$cart->image_url)}}" alt =""></td>

                <td>{{$cart->product->product_name}}</td>
                <td>{{$cart->product->price}}</td>
                <td>{{$cart->qty}}</td>
                <td>{{$cart->qty*$cart->product->price}}</td>

            
                <td>
          <button>hello
          </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        let table = new DataTable('#mytable');
    </script>

@endsection