<?php

namespace App\View\Components\Home;

use App\Models\Product;
use Illuminate\View\Component;

class Trending extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $products;
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $products_limit = config('global.trending_max_items');
        $this->products = Product::where('enabled', 1)->limit($products_limit)->get();
        return view('components.home.trending');
    }
}