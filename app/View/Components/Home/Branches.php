<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class Branches extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $branches;
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
        $this->branches = json_decode(config('global.branches'));
        return view('components.home.branches');
    }
}