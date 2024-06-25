<?php

namespace App\Http\Livewire\App\Orders;

use App\Models\Order;
use App\Models\Status;
use Livewire\Component;

class Orders extends Component
{
    public $orders;
    public $order;
    public $enabled;
    public $item_id;
    public $readOnly = false;
    public $isDeleteOpen = false;
    public $search;
    public $order_status = [];
    public $setStatus = true;
    public $status;


    public function render()
    {
        if (!empty($this->search)) {
            //DB::enableQueryLog(); // Enable query log
            $this->orders = Order::where('code', 'LIKE', "%" . strtoupper($this->search) . "%")
                ->get();
            //dd(DB::getQueryLog());
        } else
            $this->orders = Order::all();
        $this->status = Status::all();
        $this->fillStatus();
        return view('livewire.app.orders.orders');
    }

    public function fillStatus()
    {
        if ($this->setStatus) {
            foreach ($this->orders as $order)
                $this->order_status[$order->id] = $order->status_id;
            $this->setStatus = false;
        }
    }
    public function resetFields()
    {
        $this->enabled;
        $this->sort = 0;
        $this->product = '';
        $this->item_id = '';
        $this->isDeleteOpen = false;
    }

    public function updateStatus($id)
    {
        //dd($this->order_status);
        $order = Order::findOrFail($id);
        $order->update(['status_id' => $this->order_status[$id]]);
        //$this->order_status = '';
        return redirect()->route('orders')->with('success', 'order status updated successfully.');
    }
    public function enabled($id)
    {
        //dd('ggg');
        $this->enabled = !$this->enabled;
        $product = Order::findOrFail($id);
        $product->enabled = !$product->enabled;
        $product->update();
        //dd($category);
    }
    public function deleteId($id)
    {
        $this->item_id = $id;
        $this->product = Order::findOrFail($id);
        $this->openDeleteModal();
    }
    public function delete()
    {
        Order::findOrFail($this->item_id)->delete();
        $this->resetFields();
    }

    public function openDeleteModal()
    {
        $this->isDeleteOpen = true;
    }

    public function closeDeleteModal()
    {
        $this->isDeleteOpen = false;
    }
}