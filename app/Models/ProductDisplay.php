<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDisplay extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'featured',
        'new',
        'promotion',
        'show_stock',
        'hide_price',
        'hide_options',
        'hide_excerpt',
        'hide_description',
        'hide_reviews',
        'hide_features',
        'hide_specifications',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}