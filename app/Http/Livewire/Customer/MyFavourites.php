<?php

namespace App\Http\Livewire\Customer;

use App\Models\UserFavourite;
use Livewire\Component;

class MyFavourites extends Component
{

    public $favourites;
    public function render()
    {
        if (Auth()->id())
            $this->favourites = UserFavourite::where('user_id', Auth()->id())->get();
        return view('livewire.customer.my-favourites');
    }

    public function removeFavourite($id)
    {
        UserFavourite::where('user_id', Auth()->id())->where('id', $id)->delete();
        $this->emitTo('favourites-count', 'RefreshFavouriteCount');
    }
}