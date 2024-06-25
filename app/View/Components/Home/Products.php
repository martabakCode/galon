<?php

namespace App\View\Components\Home;

use App\Models\Product;
use Illuminate\View\Component;

class Products extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $from_products;
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->from_products = Product::where('enabled', 1)->limit(10)->get();
        return view('components.home.products');
    }
}