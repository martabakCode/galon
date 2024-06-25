<?php

namespace App\View\Components\Category;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\View\Component;

class Filters extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;
    public $brands;
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
        $this->categories = Category::with('products')->has('products')->get();
        $this->brands = Brand::with('products')->has('products')->get();
        return view('components.category.filters');
    }
}