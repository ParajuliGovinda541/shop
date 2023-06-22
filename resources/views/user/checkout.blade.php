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
    @include('links.links')

    <!-- component -->
    <div class="grid grid-cols-2 gap-4">
        <div class="leading-loose j">
            <form  action="{{route('order.orderedproduct')}}" method="POST" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                @csrf
                <p class="text-gray-800 font-medium">Customer information</p>
                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Name</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" name="person_name" type="text" required="" placeholder="Your Name" aria-label="Name" value="{{auth()->user()->name}}">
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="cus_email" name="email" type="text" required="" placeholder="Your Email" aria-label="Email" value="{{auth()->user()->email}}">
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="phone">Phone</label>
                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="phone" name="phone" type="text" required="" placeholder="Phone Number " aria-label="phone" value="{{auth()->user()->phone}}">
                </div>
                <div class="mt-2">
                    <label class=" block text-sm text-gray-600" for="cus_email">Shipping Address</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="street" type="text" required="" placeholder="Street" aria-label="Email" value="{{auth()->user()->street}}">
                </div>
                <div class="mt-2">
                    <label class="hidden text-sm block text-gray-600" for="cus_email">City</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="city" type="text" required="" placeholder="City" aria-label="Email"value="{{auth()->user()->city}}">
                </div>
                <div class="inline-block mt-2 w-1/2 pr-1">
                    <label class="hidden block text-sm text-gray-600" for="cus_email">Country</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="country" type="text" required="" placeholder="Country" aria-label="Email"value="{{auth()->user()->country}}">
                </div>
                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                    <label class="hidden block text-sm text-gray-600" for="cus_email">Zip</label>
                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"  name="zipcode" type="text" required="" placeholder="Zip" aria-label="Email"value="{{auth()->user()->zip}}">
                </div>
                <p class="mt-4 text-gray-800 font-medium">Payment information</p>
                <div class="">
                    <label class="block text-sm text-gray-600" for="cus_name">Card</label>
                    <select class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_name" name="payement_method" required="" aria-label="Name">
                        <option value="" disabled selected>Select Payment Method</option>
                        <option value="COD">Cash On Delivery</option>
                        <option value="ESEWA">Esewa</option>
                        <option value="KHALTI">Khalti</option>
                        <option value="IME  ">IME Pay</option>
                    </select>
                </div>
                <div class="mt-4">
                    <input type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" value="Confirm">
                    <a  href="{{route('user.mycart')}}" class="px-4 ml-72 py-1 text-white font-light tracking-wider bg-red-500 rounded" type="submit">Cancel</a>
                </div>
        </div>
        <div class="leading-loose j">
            <div  class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                       
                        <th scope="col" class="px-2 py-3">
                            S.N
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Product Image
                         </th>
                        <th scope="col" class="px-2 py-3">
                             Name
                        </th>
                        <th scope="col" class="px-2 py-3">
                          Quantity
                      </th>
                      <th scope="col" class="px-2 py-3">
                        Amount
                    </th>
                    </tr>
                </thead>
              
              <tbody>
                @php
                $sn=1
            @endphp
@foreach ($carts as $cart)
    
    <input type="hidden" name="cart_id" value="{{$cart->id}} " id=""> 
    <input type="hidden" name="user_id" value="{{$cart->user_id}} " id="">
    <input type="hidden" name="amount" value="{{$cart->amount}} " id="">
    <input type="hidden" name="status" value="{{$cart->status}} " id="">
    <input type="hidden" name="date" value="{{$cart->date}} " id="">
<tr >
            

  <td class="px-6 py-4" >
    {{$sn++}}
  </td>
  <td class="px-6 py-4">
    <img src="{{ asset('images/product/' . $cart->image_url) }}"
    alt="{{ asset('images/cart/' . $cart->image_url) }}" width="60" class="rounded-full ">
      {{-- {{$cart->product->image_url}} --}}
    </td>
    <td class="px-6 py-4" >
      {{$cart->product->product_name}}
  </td>
  <td class="px-6 py-4" >
    {{$cart->qty}}
</td>
<td class="px-6 py-4" >
    {{ $cart->product->price * $cart->qty }}
</td>
</tr>
@endforeach
 </tbody>
    </table>
            </div>
        </div>
    </div>
  </form>

</body>
</html>
