<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UploadImage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $image;
    public $name;
    public $width;
    public function __construct($image, $name, $width = 40)
    {
        $this->image = $image;
        $this->name = $name;
        $this->width = $width;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.upload-image');
    }
}