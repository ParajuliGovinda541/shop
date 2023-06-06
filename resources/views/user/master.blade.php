<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="mycss/style.css">
</head>

<body>
    <nav class="navbar sticky top-0">
        <div class="flex px-24 justify-between bg-gray-300 p-2 text-lg">
            <span>Ph: 0564564656</span>
            @if (auth()->user())
                <div>
                    <a href="">{{ auth()->user()->name }} /</a>
                    <form class="inline" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"> Logout</button>
                    </form>
                    <a href="{{route('user.mycart')}}"> My Cart</a>
                </div>
            @else
                <span><a href="{{ route('userlogin') }}">Login/Register</a></span>
            @endif
        </div>

 </nav>



</body>

</html>
