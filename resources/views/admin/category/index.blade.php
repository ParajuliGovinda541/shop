@extends('layouts.app')

@section('content')


@include('layouts.message')
    <h2 class="font-bold text-4xl text-blue-700" >Categories</h2>
    <hr class="h-1 bg-blue-200">

<div class="my-4 text-right px-10">
    <a class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300"href="{{route('admin.category.create')}}">Add Category</a>
</div>

    <table id="mytable">
        <thead>
            <th>S.N</th>
            <th>Category</th>
            <th>Image</th>


            <th>Action</th>

        </thead>
        <tbody>
            @php
            $sn=1
        @endphp
            @foreach($categories as $category)
            <tr>
                <td>{{$sn++}}</td>


                <td>{{$category->categories_name}}</td>
                <td><img  class= "w-20" src="{{asset('images/category/'.$category->image_url)}}" alt =""></td>


                <td>
                    <a href="{{route('admin.category.edit',$category->id)}}"class="bg-blue-600 px-2 py-1 rounded text-white hover:shadow-blue-600">Edit</a>
                    <a onclick="return confirm('Are you sure want to delete ?')" href="{{route('admin.category.destroy',$category->id)}}"class="bg-red-600 px-2 py-1 rounded text-white hover:shadow-blue-400">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        let table = new DataTable('#mytable');
    </script>

@endsection