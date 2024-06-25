<?php

namespace App\Http\Livewire\App\Orders;

use App\Models\Order as ModelsOrder;
use App\Models\Status;
use Livewire\Component;

class Order extends Component
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
        $this->order = ModelsOrder::where('code', $this->code)->first();
        $this->status = Status::all();
        return view('livewire.app.orders.order');
    }
}