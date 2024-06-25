<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\Product;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $total = 0.00;
    public $content;
    public $orderTotal = 0.00;
    public $similars;
    protected $listeners = [
        'productAddedToCart' => 'updateCart',
    ];

    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->updateCart();
    }
    public function render()
    {
        $this->similars = $this->similarProducts();
        return view('livewire.shopping-cart')->layout('layouts.guest');
    }

    public function similarProducts()
    {
        $content = $this->content;
        $categories = [];
        $products = [];
        foreach ($content as $item) {
            $categories[] = Product::findOrFail($item['id'], ['category_id'])->category_id;
            $products[] = $item['id'];
        }
        return Product::whereIn('category_id', $categories)->whereNotIn('id', $products)->get();
    }

    /**
     * Removes a cart item by id.
     *
     * @param string $id
     * @return void
     */
    public function removeFromCart(string $id): void
    {
        Cart::remove($id);
        $this->updateCart();
    }

    /**
     * Clears the cart content.
     *
     * @return void
     */
    public function clearCart(): void
    {
        Cart::clear();
        $this->updateCart();
    }

    /**
     * Updates a cart item.
     *
     * @param string $id
     * @param string $action
     * @return void
     */
    public function updateCartItem(string $id, string $action): void
    {
        Cart::update($id, $action);
        $this->updateCart();
    }

    /**
     * Rerenders the cart items and total price on the browser.
     *
     * @return void
     */
    public function updateCart()
    {
        $this->total = Cart::total();
        $this->content = Cart::content();
        $this->orderTotal = $this->total;
        $this->emitTo('cart-count', 'RefreshCartCount');
    }

    public function addToCart($id)
    {
        //dd($product);
        $product = Product::findOrFail($id);
        $name['en'] = $product->getTranslation('name', 'en');
        $name['id'] = $product->getTranslation('name', 'id');
        Cart::add($product->id, $name, $product->price, $product->image(), 1);
        $this->emit('productAddedToCart');
        $this->emitTo('cart-count', 'RefreshCartCount');
    }
}
