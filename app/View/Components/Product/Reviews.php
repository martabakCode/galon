<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Reviews extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $product;
    public function __construct($product = null)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.reviews');
    }
}