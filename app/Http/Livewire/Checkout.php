<?php

namespace App\Http\Livewire;

use App\Facades\Cart;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Shipping;
use Livewire\Component;

class Checkout extends Component
{
    public $total = 0.00;
    public $content;
    public $orderTotal = 0.00;
    public $similars;
    public $shipping_methods;
    public $sh_method = 0;
    public $shipping_cost = 0.00;
    public $payment_methodes;
    public $pa_method = 1;
    public $tax = 0;
    public $email;
    public $customer_name;
    public $shipping_address = [];
    public $street_address;
    public $country = 'Indonesia';
    public $city;
    public $state;
    public $post_code;
    public $phone;
    public $guest_info;
    public $fillFieldsFlag = true;

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
        $this->payment_methodes = Payment::where('is_active', 1)->orderBy('sort')->get();
        $this->shipping_methods = Shipping::where('is_active', 1)->orderBy('sort')->get();
        $this->fillFields();
        return view('livewire.checkout')->layout('layouts.guest');
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
        return Product::whereIn('category_id', $categories)->whereNotIn('id', $products)->where('enabled', 1)->get();
    }

    public function selectShipping($method_id)
    {
        $this->sh_method = $method_id;
        $this->shipping_cost = $this->shipping_methods[$method_id - 1]->cost;
        $this->updateCart();
    }

    public function selectPayment($method_id)
    {
        $this->pa_method = $method_id;
    }
    public function fillFields()
    {
        if ($this->fillFieldsFlag) {
            $user = auth()->user();
            if ($user) {
                $this->email = $user->email;
                $this->customer_name = $user->name;
                $this->phone = $user->phone;
            } else {
                $this->email = '';
                $this->customer_name = '';
                $this->phone = '';
            }
            $this->fillFieldsFlag = false;
        }
    }
    public function confirmOrder()
    {
        $this->validate(
            [
                'email' => 'required|email',
                'customer_name' => 'required|max:255',
                'phone' => 'required',
                'street_address' => 'required',
                'country' => 'required',
                'city' => 'required',
                'post_code' => 'required',
                'sh_method' => 'required|numeric|gt:0'
            ],
            ['sh_method.required' => trans('Delivery method is required')]
        );

        $address =
            [
                'street' => $this->street_address,
                'country' => $this->country,
                'state' => $this->state ?? '',
                'city' => $this->city,
                'post_code' => $this->post_code,
            ];
        $latest_id = Order::latest('id')->first()->id;
        $order_code = date('Y') . date('m') . date('d') . str_pad($latest_id + 1, 5, '0', STR_PAD_LEFT);
        $invoice_code = 'INV' . date('Y') . '-' . str_pad($latest_id + 1, 5, '0', STR_PAD_LEFT);
        $data = [
            'code' => $order_code,
            'user_id' => auth()->id() ?? NULL,
            'email' => $this->email,
            'customer_name' => $this->customer_name,
            'phone' => $this->phone,
            'shipping_address' => json_encode($address),
            'shipping_id' => $this->sh_method,
            'payment_id' => $this->pa_method,
            'payment_cost' =>  $this->total,
            'shipping_cost' =>  $this->shipping_cost,
            'subtotal' => $this->total,
            'tax' => $this->tax,
            'total' => $this->orderTotal,
        ];

        $order = Order::create($data);
        foreach ($this->content as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);

            $product = Product::findOrFail($item['id']);
            $stock = $product->stock - $item['quantity'];
            $product->update(['stock' => $stock]);
        }
        Invoice::create([
            'code' => $invoice_code,
            'order_id' => $order->id,
        ]);
        $this->clearCart();
        $this->emitTo('cart-count', 'RefreshCartCount');
        return redirect()->route('checkout')->with('success', 'Order places successfully');
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
        $stock = 0;
        $quantity = $this->content[$id]['quantity'];
        if ($action == 'plus') {
            $stock = Product::findOrFail($id)->stock;
            if ($stock > $quantity)
                Cart::update($id, $action);
            $this->updateCart();
        } else {
            Cart::update($id, $action);
            $this->updateCart();
        }
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
        dd($this->shipping_cost);
        $this->orderTotal = $this->total + $this->shipping_cost + $this->tax;
    }
}
