<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomerLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if (Auth())
            return view('layouts.customer');
        else
            return view('home');
    }
}