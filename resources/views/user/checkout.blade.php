<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    


@include('layouts.message')

<h1 class="text-center font-bold text-3xl">Billing Details</h1>

<form action="">
@csrf
<input type="text" name="person_name" value="{{auth()->user()->name}}">
<input type="text" name="shipping_address" value="{{auth()->user()->address}}">
<input type="text" name="phone" value="{{auth()->user()->phone}}">

<select name="payement_method" id="">
    <option value="COD">Cash On Delivery</option>

</select>

<input type="submit" value="Place Order">




</form>


</body>
</html>