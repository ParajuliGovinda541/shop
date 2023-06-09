@include('layouts.message')

<div class="col-span-2 p-5">


    <h1 class="text-xl font-medium ">Shopping Cart</h1>
    <form action="" method="POST">
        @csrf

        @forelse($carts as $cart)
            <div class="flex justify-between items-center mt-2 pt-6">

                <div class="flex  items-center">



                    <img src="{{ asset('images/product/' . $cart->image_url) }}"
                        alt="{{ asset('images/cart/' . $cart->image_url) }}" width="60" class="rounded-full ">


                    <div class="flex flex-col ml-3">


                        <span value="user_id" class="md:text-md font-medium">{{ $cart->user_id }} </span>




                        <input type="hidden" name="user_id" value="{{ $cart->user_id }}">

                        <input type="hidden" name="cart_id" value="{{ $cart->id }}">


                    </div>

                    <div class="flex flex-col ml-3">

                        <span class="md:text-md font-medium">{{ $cart->product_name }}</span>
                    </div>

                </div>
                <div class="pr-4">

                    <span class="text-sm px-2">{{ $cart->product->price }}</span>


                </div>
                <div class="flex justify-center items-center">

                    <div class="pr-4 flex cursor-pointer">
                        <button type="button" wire:click="decrementQuantity({{ $cart->id }})"
                            class="fa fa-minus"id="minus"></button>

                        <input type="text"
                            class="focus:outline-none bg-gray-100 border h-6 w-8 rounded text-sm px-2 mx-2"
                            value="{{ $cart->qty }}" id="num">
                        <button type="button" wire:click="incrementQuantity({{ $cart->id }})"
                            class="fa fa-plus"id="plus"></button>

                    </div>


                    <div class="pr-4">

                        <span class="text-xs font-medium">{{ $cart->product->price * $cart->qty }}</span>
                        <input type="hidden" name="amount" value=" {{ $cart->product->price * $cart->qty }} ">

                        @php
                            $totalprice += $cart->product->price * $cart->qty;
                        @endphp
                    </div>
                    {{-- <div class="pr-2">
                    <a class="bg-yellow-500 hover:bg-red-700 text-white  py-0 px-1 border border-blue-700 rounded">
                        Update
                      </a>
                    
                </div> --}}
                    <div class="pr-2">
                        <a onclick="return confirm('Are you sure want to delete ?')"
                            href="{{ route('user.mycart.destroy', $cart->id) }}"
                            class="bg-red-500 hover:bg-blue-700 text-white font-bold py-0 px-1 border border-blue-700 rounded">
                            Delete
                        </a>

                    </div>
                    {{-- <div class="pr-2">
                            <button type="submit"
                                class="bg-green-500 hover:bg-blue-700 text-white font-bold py-0 px-1 border border-blue-700 rounded">
                                Order
                            </button>

    </div> --}}
    </form>

    <div>
        <i class="fa fa-close text-xs font-medium"></i>
    </div>

</div>

</div>
@empty
<div>
    Please Add Item to View Here
</div>
@endforelse



<div class="flex justify-between items-center mt-6 pt-6 border-t">
    <div class="flex items-center">
        <i class="fa fa-arrow-left text-sm pr-2"></i>

        <a href="{{ route('user.product') }}" class="text-md  font-medium text-blue-500">Continue Shopping</a>
    </div>

    <div class="flex justify-center items-end">
        <span class="text-sm font-medium text-gray-400 mr-1">Totalprice:</span>
        <span class="text-lg font-bold text-gray-800 "> Rs {{ $totalprice }}</span>

    </div>

</div>
</div>
