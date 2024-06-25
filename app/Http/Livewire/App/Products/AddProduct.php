<?php

namespace App\Http\Livewire\App\Products;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use App\Models\ProductDisplay;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;
    public $images = [];
    public $name;
    public $name_id;
    public $excerpt;
    public $description = '';
    public $category_id;
    public $brand_id;
    public $sort;
    public $buy_price;
    public $price; //sell price
    public $category;
    public $stock;
    public $enabled = 1;
    public $readOnly;
    public $categories;

    //display options
    public $product_id;
    public $featured = 0;
    public $new = 0;
    public $promotion = 0;
    public $show_stock = 0;
    public $hide_price = 0;
    public $hide_options = 0;
    public $hide_excerpt = 0;
    public $hide_description = 0;
    public $hide_reviews = 0;
    public $hide_features = 0;
    public $hide_specifications = 0;

    protected $rules = [
        // 'images' => 'required',
        'images.*' => 'mimes:jpg,png,jpeg,gif,svg|max:6000',
        'name' => 'required',
        'name_id' => 'required',
        'excerpt' => 'required',
        'category_id' => 'required',
        'stock' => 'required',
    ];
    public function render()
    {
        $this->categories = Category::where('enabled', 1)->orderBy('sort')->get();
        $this->brands = Brand::where('enabled', 1)->orderBy('sort')->get();
        return view('livewire.app.products.add-product');
    }

    public function save()
    {
        //dd($this->images);
        $this->validate();

        $name['en'] = $this->name;
        $name['id'] = $this->name_id;
        $product = Product::create([
            'name' => $name,
            'excerpt' => $this->excerpt,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id ?? null,
            'price' => is_numeric($this->price) ? $this->price : 0,
            'buy_price' => is_numeric($this->buy_price) ? $this->buy_price : 0,
            'stock' => $this->stock ?? 0,
            'enabled' => $this->enabled,
        ]);
        foreach ($this->images as $image) {
            $file_info = $image->getClientOriginalName();
            $file_name = pathinfo($file_info, PATHINFO_FILENAME);
            $file_extension = pathinfo($file_info, PATHINFO_EXTENSION);
            //$name =  Str::slug($file_name, '-') . '-' . $product->id . '.' . $file_extension;
            $path = $image->storeAs('products', $file_info, 'public');
            $name['id'] = $file_info;
            $name['en'] = $file_info;
            Media::create([
                'name' => $name,
                'path' => $path,
                'size' => $image->getSize(),
                'description' => '',
                'type' => 'Product',
                'item_id' => $product->id,
            ]);
        }
        $display = [
            'product_id' => $product->id,
            'featured' => $this->featured,
            'new' => $this->new,
            'promotion' => $this->promotion,
            'show_stock' => $this->show_stock,
            'hide_price' => $this->hide_price,
            'hide_options' => $this->hide_options,
            'hide_excerpt' => $this->hide_excerpt,
            'hide_description' => $this->hide_description,
            'hide_reviews' => $this->hide_reviews,
            'hide_features' => $this->hide_features,
            'hide_specifications' => $this->hide_specifications,
        ];
        ProductDisplay::create($display);
        $this->images = [];
        //return back()->with('success', 'Product updated successfully');
        return redirect()->route('app.products')->with('success', 'Product updated successfully');
    }

    public function removePreview($index)
    {
        array_splice($this->images, $index, 1);
    }
}
