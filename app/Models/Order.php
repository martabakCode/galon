<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'code',
        'payment_id',
        'shipping_id',
        'payment_cost',
        'shipping_cost',
        'tax',
        'subtotal',
        'total',
        'email',
        'customer_name',
        'shipping_address',
        'billing_address',
        'phone',
        'guest_info',
        'status_id',
    ];

    public function getRouteKeyName()
    {
        return 'code';
    }


    public function products()
    {
        return $this->hasManyThrough(Product::class, OrderProduct::class,  'order_id', 'id', 'id', 'product_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function invoice()
    {
        return Invoice::where('order_id', $this->id)->first();
    }

    public function shipping_address()
    {
        if ($this->shipping_address)
            return json_decode($this->shipping_address);
        return;
    }
}