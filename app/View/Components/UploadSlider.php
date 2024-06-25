<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UploadSlider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $image = [];
    public $index;
    public $width;
    public function __construct($image, $index, $width = 40)
    {
        $this->image = $image;
        $this->index = $index;
        $this->width = $width;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.upload-slider');
    }
}