@extends('layouts.app')

@section('content')


@include('layouts.message')
    <h2 class="font-bold text-4xl text-blue-700" >User Registered</h2>
    <hr class="h-1 bg-blue-200">

<div class="my-4 text-right px-10">
 
</div>

    <table id="mytable">
        <thead>
            <th>S.N</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Role</th>

            <th>Image</th>

            <th>View Details</th>

        </thead>
        <tbody>
            @php
                $sn=1
            @endphp
            @foreach($users as $user)
            <tr>
                <td>{{$sn++}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->role}}</td>

            <td><img  class= "w-20" src="{{asset('images/user/'.$user->image_url)}}" alt ="{{auth()->user()->name}}"></td>
                <td>
                    {{-- <a href="{{route('admin.product.edit',$user->id)}}"class="bg-blue-600 px-2 py-1 rounded text-white hover:shadow-blue-600">Edit</a> --}}
                    <a  href="{{route('admin.registeruser.details',$user->id)}}"class="bg-red-600 px-2 py-1 rounded text-white hover:shadow-blue-400">Details</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        let table = new DataTable('#mytable');
    </script>

@endsection