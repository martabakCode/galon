<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\OrderProduct;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;

class MyReviews extends Component
{
    public $productsToReview = [];
    public $reviewedProducts = [];
    public $reviewContent = '';
    public $rating = 0;
    public $selectedProductId;
    public $showModal = false;

    public function mount()
    {
        $this->fetchProductsToReview();
        $this->fetchReviewedProducts();
    }

    public function fetchProductsToReview()
    {
        $user_id= Auth::id();
        $this->productsToReview = OrderProduct::whereHas('order', function ($query) use ($user_id) {
                    $query->where('user_id', $user_id)
                        ->where('status_id', 10);
                })
                ->whereDoesntHave('product.reviews', function ($query) use ($user_id) {
                    $query->where('user_id', $user_id);
                })
                ->with(['product' => function ($query) use ($user_id) {
                    $query->whereDoesntHave('reviews', function ($query) use ($user_id) {
                        $query->where('user_id', $user_id);
                    });
                    $query->with('category');
                },'order'])
                ->get();
    }

    public function fetchReviewedProducts()
    {
        $user_id = Auth::id();
        $this->reviewedProducts = OrderProduct::whereHas('order', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)
                ->where('status_id', 10); // Adjust status_id condition as needed
        })
        ->whereHas('product.reviews', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })
        ->with(['product' => function ($query) use ($user_id) {
            $query->with('category');
            $query->with(['reviews' => function ($query) use ($user_id) {
                $query->where('user_id', $user_id);

            }]);
        },'order'])
        ->get();
    }

    public function showModal($productId)
    {
        $this->selectedProductId = $productId;

        $this->showModal = true;

    }

    public function closeModal()
    {
        $this->reset(['reviewContent', 'rating', 'selectedProductId', 'showModal']);
    }

    public function addReview()
    {
        $this->validate([
            'reviewContent' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'selectedProductId' => 'required|exists:products,id',
        ]);

        ProductReview::create([
            'product_id' => $this->selectedProductId,
            'user_id' => Auth::id(),
            'comment' => $this->reviewContent,
            'stars' => $this->rating,
        ]);

        $this->closeModal();
        $this->fetchProductsToReview();
        $this->fetchReviewedProducts();
    }

    public function render()
    {
        $this->fetchProductsToReview();
        $this->fetchReviewedProducts();
        return view('livewire.customer.my-reviews');
    }
}
