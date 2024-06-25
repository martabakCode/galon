<?php

namespace App\Http\Livewire\Product;

use App\Facades\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\UserFavourite;
use Livewire\Component;

class Index extends Component
{
    public $slug;
    public $product;
    public $breadcrumb = [];
    public $similars;
    public $quantity = 1;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $s = "%" . $this->slug . "%";
        $langs = config('app.languages');
        $this->product = Product::where(function ($q) use ($langs, $s) {
            foreach ($langs as $lang) {
                $q->orWhere('slug->' . $lang, 'LIKE', strtolower($s));
            }
        })->where('enabled', 1)->first();
        if ($this->product) {
            $this->similars = Product::where('category_id', $this->product->category_id)->where('id', '!=', $this->product->id)->get();
        } else {
            abort(404);
        }
        $this->breadcrumb = [];
        $this->getParent($this->product->category);
        $this->breadcrumb = array_reverse($this->breadcrumb);
        return view('livewire.product.index')->layout('layouts.guest');
    }

    public function getParent($category)
    {
        array_push($this->breadcrumb, $category);
        if ($category->parent_id == 0) {
            return;
        } else {
            return $this->getParent(Category::findOrFail($category->parent_id));
        }

    }

    public function buyNow($id)
    {
        $this->addToCart($id);
        return redirect()->route('checkout');
    }

    public function AddToFavourite($id)
    {
        //dd($id);
        if (Auth()->id()) {
            $pro = UserFavourite::where('user_id', Auth()->id())->where('product_id', $id)->first();
            //dd($pro);
            if (!$pro) {
                UserFavourite::create(['user_id' => Auth()->id(), 'product_id' => $id]);
            }

            $this->emitTo('favourites-count', 'RefreshFavouriteCount');
        }
    }

    public function addToCart($id)
    {
        //dd($product);
        $product = Product::findOrFail($id);

        $name['en'] = $product->getTranslation('name', 'en');
        $name['id'] = $product->getTranslation('name', 'id');

        $slug['en'] = $product->getTranslation('slug', 'en');
        $slug['id'] = $product->getTranslation('slug', 'id');

        Cart::add($product->id, $name, $slug, $product->price, $product->image(), 1);
        $this->emit('productAddedToCart');
        $this->emitTo('cart-count', 'RefreshCartCount');
    }
}
