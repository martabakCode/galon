<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Images extends Component
{
    public $media;
    public function mount($media)
    {
        $this->media = $media;
    }
    public function render()
    {
        return view('livewire.product.images');
    }
}