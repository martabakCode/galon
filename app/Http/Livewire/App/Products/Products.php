<?php

namespace App\Http\Livewire\App\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $product;
    public $enabled;
    public $item_id;
    public $readOnly = false;
    public $isDeleteOpen = false;
    public $search;

    public function render()
    {
        if (!empty($this->search)) {
            $s = "%" . $this->slug . "%";
            $langs = config('app.languages');
            $products = Product::where(function ($q) use ($langs, $s) {
                foreach ($langs as $lang) {
                    $q->orWhere('name->' . $lang, 'LIKE', strtolower($s));
                }
            })->where('enabled', 1)
                ->orderBy('sort')
                ->paginate(20);
        } else {
            $products = Product::orderBy('sort')->paginate(20);
        }

        //dd($this->products);
        return view('livewire.app.products.products', compact('products'));
    }

    public function resetFields()
    {
        $this->enabled;
        $this->sort = 0;
        $this->product = '';
        $this->item_id = '';
        $this->isDeleteOpen = false;
    }

    public function enabled($id)
    {
        //dd('ggg');
        $this->enabled = !$this->enabled;
        $product = Product::findOrFail($id);
        $product->enabled = !$product->enabled;
        $product->update();
        //dd($category);
    }
    public function deleteId($id)
    {
        $this->item_id = $id;
        $this->product = Product::findOrFail($id);
        $this->openDeleteModal();
    }
    public function delete()
    {
        Product::findOrFail($this->item_id)->delete();
        $this->resetFields();
    }

    public function openDeleteModal()
    {
        $this->isDeleteOpen = true;
    }

    public function closeDeleteModal()
    {
        $this->isDeleteOpen = false;
    }

    public function edit($id)
    {
    }
    public function view($id)
    {
    }
}