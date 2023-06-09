<?php

namespace App\Http\Livewire\User\Cart;

use App\Models\cart;
use Livewire\Component;


class CartShow extends Component
{
    public  $carts,$totalprice=0;

    public function mount()
    {
        $this->carts=Cart::where('user_id', auth()->user()->id)->where('is_ordered',false)->get();
    }


    // public function order($cardId)
    // {
    // // dd($cardId);
    // $cart=Cart::find($cardId);
    // dd($cart);
    // }
    
    public function decrementQuantity(int $cardId)
   
        {
            $cardData= Cart::where('id',$cardId)->where('user_id',auth()->user()->id)->where('is_ordered',false)->first();
        
            
                
                $qty=['qty'=>$cardData->qty-1];
               Cart::find($cardId)->update($qty);
            
           
        }
        public function incrementQuantity(int $cardId)
        {
 $cardData= Cart::where('id',$cardId)->where('user_id',auth()->user()->id)->where('is_ordered',false)->first();
            if($cardData)
            {
                $cardData->increment('qty');
            }
            else
            {
                
            }
        }

        
    
    public function render()
    {
        return view('livewire.user.cart.cart-show');
    }
}
