<?php

namespace App\Http\Livewire\Customer;

use App\Models\Order;
use Livewire\Component;

class MyOrders extends Component
{
    public $orders;
    public $order;
    public $search;
    public $status;
    public $user;


    public function render()
    {
        $this->user = Auth()->user();
        if (!empty($this->search)) {
            //DB::enableQueryLog(); // Enable query log
            $this->orders = Order::where('user_id', $this->user->id)
                ->where('code', 'LIKE', "%" . strtoupper($this->search) . "%")
                ->get();
            //dd(DB::getQueryLog());
        } else
            $this->orders = Order::where('user_id', $this->user->id)->get();
        return view('livewire.customer.my-orders');
    }
}