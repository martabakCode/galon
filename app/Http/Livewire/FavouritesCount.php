<?php

namespace App\Http\Livewire;

use App\Models\UserFavourite;
use Livewire\Component;

class FavouritesCount extends Component
{
    protected $listeners = [
        'RefreshFavouriteCount' => '$refresh',
    ];
    public $count;
    public function render()
    {
        $this->count = UserFavourite::where('user_id', Auth()->id())->get()->count();
        return view('livewire.favourites-count');
    }
}