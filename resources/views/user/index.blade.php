@include('user.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    @include('links.links')


    <title>
        @yield('title')
    </title>

</head>

<body>
    @include('user.navbar')


    @include('user.slider')

    @include('user.showcategory')


    @include('user.product')



    {{-- @include('user.body') --}}

    <div>
        @yield('content')
    </div>

    @include('user.contact')

    @include('user.footer')

</body>

</html>
