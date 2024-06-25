<?php

namespace App\View\Components\Home;

use App\Models\Setting;
use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

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
        $slides = Setting::where('name', 'slider_images')->first();
        if ($slides) {
            $slides = json_decode($slides->value);
        } else {
            // Handle the case when there are no slider images settings
            $slides = [];
        }

        return view('components.home.slider', compact('slides'));
    }
}
