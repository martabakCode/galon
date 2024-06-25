<?php

namespace App\View\Components\Home;

use App\Models\Category;
use Illuminate\View\Component;

class Categories extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;
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
        $categories_limit = config('global.category_max_items');
        $this->categories = Category::where('enabled', 1)->where('parent_id', 0)->limit($categories_limit)->get();
        return view('components.home.categories');
    }
}