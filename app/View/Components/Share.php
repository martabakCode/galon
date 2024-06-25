<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Share extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = $this->data;
        return view('components.share', compact('data'));
    }
}