<?php

namespace App\Http\Livewire\Customer;

use App\Models\Invoice;
use Livewire\Component;

class MyInvoice extends Component
{
    public $invoice;
    public $code;
    public function mount($code)
    {
        $this->code = $code;
    }
    public function render()
    {
        $this->invoice = Invoice::where('code', 'LIKE', $this->code)->first();
        return view('livewire.customer.my-invoice');
    }
}