@extends('layouts.app')

@section('content')


@include('layouts.message')
    <h2 class="font-bold text-4xl text-blue-700" >Products</h2>
    <hr class="h-1 bg-blue-200">

<div class="my-4 text-right px-10">
    <a class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300"href="{{route('admin.product.create')}}">Add Product</a>
</div>

    <table id="mytable">
        <thead>
            <th>S.N</th>
            <th>Product</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Category Id</th>
            <th>Action</th>

        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->image_url}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category_id}}</td>


                <td>
                    <a href="{{route('admin.category.edit',$product->id)}}"class="bg-blue-600 px-2 py-1 rounded text-white hover:shadow-blue-600">Edit</a>
                    <a onclick="return confirm('Are you sure want to delete ?')" href="{{route('admin.product.destroy',$product->id)}}"class="bg-red-600 px-2 py-1 rounded text-white hover:shadow-blue-400">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        let table = new DataTable('#mytable');
    </script>

@endsection