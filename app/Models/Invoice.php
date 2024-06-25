<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'order_id', 'status_id'];

    public function getRouteKeyName()
    {
        return 'code';
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}