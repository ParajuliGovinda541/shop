<?php

namespace App\Http\Livewire\User\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $carts, $totalprice = 0;

    public function mount()
    {
        $this->carts = Cart::where('user_id', auth()->user()->id)->where('is_ordered', false)->get();
    }

    public function decrementQuantity(int $cardId)
    {
        $cartData = Cart::where('id', $cardId)->where('user_id', auth()->user()->id)->where('is_ordered', false)->first();

        if ($cartData && $cartData->qty > 1) {
            $cartData->decrement('qty');
        }
    }

    public function incrementQuantity(int $cardId)
    {
        $cartData = Cart::where('id', $cardId)->where('user_id', auth()->user()->id)->where('is_ordered', false)->first();

        if ($cartData) {
            $cartData->increment('qty');
        }
    }

    public function render()
    {
        return view('livewire.user.cart.cart-show');
    }
}
