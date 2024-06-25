<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class CartCount extends Component
{
    protected $listeners = [
        'RefreshCartCount' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.cart-count');
    }
}