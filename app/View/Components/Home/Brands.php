<?php

namespace App\View\Components\Home;

use App\Models\Brand;
use Illuminate\View\Component;

class Brands extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $brands;
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
        $this->brands = Brand::where('enabled', 1)->limit(8)->get();
        return view('components.home.brands');
    }
}