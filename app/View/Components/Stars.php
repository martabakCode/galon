<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Stars extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $stars = 0;
    public function __construct($stars)
    {
        $this->stars = $stars;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.stars');
    }
}