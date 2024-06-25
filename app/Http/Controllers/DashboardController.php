<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $customers = User::all()->count();
        $balance = $this->balance();
        $orders = Order::all();
        $invoices=Invoice::all();
        $contacts = Contact::where('is_read', 0)->count();
        return view('admin', compact('customers', 'balance', 'orders', 'contacts', 'invoices'));
    }

    public function customer()
    {
        $user = Auth()->user();
        $user_id=$user->id;
        //dd($user->favourites->count());
        $customers = User::all()->count();
        $balance = $this->balance();
        $orders = $user->orders;
        $invoices= Invoice::whereHas('order', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        $expenses = $this->expenses($user->orders);
        $messages = 0;
        $favourites = $user->favourites->count();
        //dd($favourites);
        return view('dashboard', compact('favourites', 'expenses', 'orders', 'messages','invoices'));
    }

    public function balance()
    {
        $total = 0.0;
        $orders = Order::where('status_id', '>', 1)->get();
        foreach ($orders as $order)
            $total = $total + $order->total;
        return sprintf('%.2f', $total);
    }
    public function expenses($orders)
    {
        $total = 0.0;
        foreach ($orders as $order)
            if ($order->status_id > 1)
                $total = $total + $order->total;
        return sprintf('%.2f', $total);
    }
}