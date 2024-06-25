<?php

namespace App\Http\Livewire\Customer;

use App\Models\Order;
use App\Models\Status;
use Livewire\Component;

class MyOrder extends Component
{
    public $order;
    public $code;
    public $status;

    public function mount($code)
    {
        $this->code = $code;
    }
    public function render()
    {
        $this->order = Order::where('code', $this->code)->first();
        $this->status = Status::all();
        //dd($this->order->invoice());
        return view('livewire.customer.my-order');
    }
}