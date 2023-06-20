<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="mycss/style.css">
    @livewireStyles()
</head>

<body>
    <nav class="navbar sticky top-0">
        <div class="flex px-24 justify-between bg-gray-300 p-2 text-lg">
            <span>Ph: 9865255027</span>
            <span><i class="fa fa-envelope" aria-hidden="true"></i> Mail Us
                <a href=""></a></span>
            @if (auth()->user())
                <div>
                    <a href="{{route('user.profileedit')}}">{{ auth()->user()->name }} /</a>
                    <form class="inline" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                    </form>
                    <a href="{{ route('user.mycart') }}">
                        <i class="fas fa-shopping-cart"></i> [ {{ $itemsincart }} ]</a>
                        <a href="">
                            <i class="fa fa-heart" aria-hidden="true"></i> [12]</a>
                </div>
            @else
                <span><a href="{{ route('userlogin') }}">Login/Register</a></span>
            @endif
        </div>

    </nav>



</body>
@livewireScripts()

</html>
