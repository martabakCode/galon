<?php

namespace App\View\Components\Layouts;

use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class GuestFooter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $copy_right;
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
        $this->copy_right = config('global.copy_right_' . App::getLocale());
        return view('components.layouts.guest-footer');
    }
}