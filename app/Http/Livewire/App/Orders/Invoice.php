<?php

namespace App\Http\Livewire\App\Orders;

use App\Models\Invoice as ModelsInvoice;
use Livewire\Component;

class Invoice extends Component
{
    public $invoice;
    public $code;
    public function mount($code)
    {
        $this->code = $code;
    }
    public function render()
    {
        $this->invoice = ModelsInvoice::where('code', 'LIKE', $this->code)->first();
        return view('livewire.app.orders.invoice');
    }
}