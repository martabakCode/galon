<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Currency extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $amount;
    public function __construct($amount = '0.00')
    {
        $this->amount = $amount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.currency');
    }
}