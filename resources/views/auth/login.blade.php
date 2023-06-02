<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body   >  

    <div class="grid grid-cols-2">
        <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="h-screen">
        <div class="flex justify-center items-center">
            <div class="w-full text-center">
                <h2 class="font-bold text-4xl"> Login Here</h2>
                <img src="{{asset('images/logo.jpg')}}" class="mx-auto my-4 w-40">
                <form action="{{route('login')}}" method="POST">
                    @csrf

                    <input type="email" name="email" placeholder="Enter Email" class="p-4 rounded-lg w-8/12 my-4">
                    <input type="password" name="password" placeholder="Enter Password"class="p-4 rounded-lg w-8/12 my-4">

          <br>
                    <input class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300" type="submit" value="Login">
                    
<br>

<br>

                    <a href="{{route('register')}}" class="">Don't Have Account?
                        <br>
                        <span>Register Here</span></a>
                </form>

            </div>
    
        </div>


    </div>
    
</body>
</html>