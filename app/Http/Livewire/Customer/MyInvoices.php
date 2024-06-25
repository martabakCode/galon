<?php

namespace App\Http\Livewire\Customer;

use App\Models\Invoice;
use Livewire\Component;

class MyInvoices extends Component
{
    public $invoices;
    public $invoice;
    public $item_id;
    public $search;

    public function render()
    {
        $user_id = Auth()->id();
        if (!empty($this->search)) {
            $this->invoices = Invoice::whereHas('order', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->where('code', 'LIKE', "%" . strtoupper($this->search) . "%")
                ->get();
        } else
            $this->invoices = Invoice::whereHas('order', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->get();
        return view('livewire.customer.my-invoices');
    }
}