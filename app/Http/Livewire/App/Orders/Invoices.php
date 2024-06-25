<?php

namespace App\Http\Livewire\App\Orders;

use App\Models\Invoice;
use Livewire\Component;

class Invoices extends Component
{
    public $invoices;
    public $invoice;
    public $item_id;
    public $search;

    public function render()
    {
        if (!empty($this->search)) {
            //DB::enableQueryLog(); // Enable query log
            $this->invoices = Invoice::where('code', 'LIKE', "%" . strtoupper($this->search) . "%")
                ->get();
            //dd(DB::getQueryLog());
        } else
            $this->invoices = Invoice::all();
        return view('livewire.app.orders.invoices');
    }
}