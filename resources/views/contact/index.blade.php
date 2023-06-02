@extends('layouts.app')

@section('content')


@include('layouts.message')
    <h2 class="font-bold text-4xl text-blue-700" >Contacts</h2>
    <hr class="h-1 bg-blue-200">

{{-- <div class="my-4 text-right px-10">
    <a class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300"href="{{route('admin.category.create')}}">Add Category</a>
</div> --}}

    <table id="mytable">
        <thead>
            <th>S.N</th>
            <th>Name</th>
            <th>Message</th>
            <th>Action</th>


        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{$contact->id}}</td>

                <td>{{$contact->name}}</td>
                <td>{{$contact->message}}</td>

                <td>
                    <a href=""class="bg-blue-600 px-2 py-1 rounded text-white hover:shadow-blue-600">Response</a>
                    <a onclick="return confirm('Are you sure want to delete ?')" href=""class="bg-red-600 px-2 py-1 rounded text-white hover:shadow-blue-400">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        let table = new DataTable('#mytable');
    </script>

@endsection