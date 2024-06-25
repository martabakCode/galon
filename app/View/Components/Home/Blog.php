<?php

namespace App\View\Components\Home;

use App\Models\Blog as ModelsBlog;
use Illuminate\View\Component;

class Blog extends Component
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
    public $posts;
    public function render()
    {
        $this->posts = ModelsBlog::orderBy('sort')->limit(3)->get();
        return view('components.home.blog');
    }
}