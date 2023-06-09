@include('user.master')
@section('content')
    @include('layouts.message')
    @include('links.links')
    @include('user.navbar')




    <div class="h-screen bg-gray-300">
        <div class="py-12">


            <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg  md:max-w-5xl">
                <div class="md:flex ">
                    <div class="w-full p-4 px-5 py-5">

                        <div class="md:grid md:grid-cols-3 gap-2 ">
                            <livewire:user.cart.cart-show />

                            <div>
                                @if ($carts->isEmpty())

                                <div class="bg-red-500 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                    <p class="font-bold text-white">Informational message</p>
                                    <p class="text-xl font-mono">Please Add Item For Further Features.</p>
                                  </div>
                                @else
                                <a href="{{route('user.checkout')}}"  class="h-12 w-full bg-blue-500 rounded focus:outline-none text-white hover:bg-blue-600">Check
                                    Out</a>
                                @endif
                              
                            </div>
                          
                          
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- 
<script>
    const plus = document.querySelector('#plus');
    const minus = document.querySelector('#minus');
    const num = document.querySelector('#num');

    let a = 1;

    plus.addEventListener('click', () => {
        a++;
        a = (a < 10) ? '0' + a : a;
        num.value = a;
        console.log(a);
    });

    minus.addEventListener('click', () => {
        if (a > 1) {
            a--;
            a = (a < 10) ? '0' + a : a;
            num.value = a;
        }
    });
</script> --}}
