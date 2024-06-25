<?php

namespace App\Http\Livewire\App\Products;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use App\Models\ProductDisplay;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;
    public $item_id;
    public $images = [];
    public $old_images = [];
    public $name;
    public $name_id;
    public $excerpt;
    public $description = '';
    public $details;
    public $category_id;
    public $brand_id;
    public $sort;
    public $slug;
    public $buy_price = 0.0;
    public $price = 0.0; //sell price
    public $category;
    public $stock;
    public $enabled = 1;
    public $readOnly;
    public $categories;
    public $fillImages = true;
    public $setExcertpt = true;
    public $deleted_old_images_ids = [];

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
        'images' => 'nullable',
        'images.*' => 'mimes:jpg,png,jpeg,gif,svg|max:6000',
        'name' => 'required',
        'name_id' => 'required',
        'excerpt' => 'required',
        'category_id' => 'required|numeric|gt:0',
        'brand_id' => 'required|numeric|gt:0',
        'stock' => 'required',
    ];

    public function mount($id)
    {
        $this->item_id = $id;
    }
    public function render()
    {
        //dd($this->slug);
        $this->categories = Category::where('enabled', 1)->orderBy('sort')->get();
        $this->brands = Brand::where('enabled', 1)->orderBy('sort')->get();
        $this->product = Product::findOrFail($this->item_id);
        //dd($this->product);
        $this->fillFields();
        //dd($this->product->display);
        return view('livewire.app.products.edit-product');
    }

    public function update()
    {
        //dd($this->description);
        // dd($this->details);

        $this->validate();

        $name['en'] = $this->name;
        $name['id'] = $this->name_id;
        $this->product->update([
            'name' => $name,
            'excerpt' => $this->excerpt,
            'description' => $this->details ?? $this->description,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'price' => is_numeric($this->price) ? $this->price : 0,
            'buy_price' => is_numeric($this->buy_price) ? $this->buy_price : 0,
            'stock' => $this->stock ?? 0,
            'enabled' => $this->enabled,
        ]);

        //$this->resetFields();
        return redirect()->route('app.products')->with('success', 'Product updated successfully');
    }

    public function updateImages()
    {
        Media::where('type', 'Product')->whereIn('id', $this->deleted_old_images_ids)->delete();

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
                'item_id' => $this->item_id,
            ]);
        }
        $this->images = [];
        $this->emit('saved2');
    }

    public function updateFeatures()
    {
        $pDisplay = ProductDisplay::where('product_id', $this->item_id)->first();
        if ($pDisplay) {
            $pDisplay->update([
                'product_id' => $this->item_id,
                'featured' => $this->featured,
                'new' => $this->new,
                'promotion' => $this->promotion,
            ]);
        }

        $this->emit('saved');
    }

    public function updateDisplayOptions()
    {
        $pDisplay = ProductDisplay::where('product_id', $this->item_id)->first();
        if ($pDisplay) {
            $pDisplay->update([
                'product_id' => $this->item_id,
                'show_stock' => $this->show_stock,
                'hide_price' => $this->hide_price,
                'hide_options' => $this->hide_options,
                'hide_excerpt' => $this->hide_excerpt,
                'hide_description' => $this->hide_description,
                'hide_reviews' => $this->hide_reviews,
                'hide_features' => $this->hide_features,
                'hide_specifications' => $this->hide_specifications,
            ]);
        }

        $this->emit('saved1');
    }

    public function removeOldPreview($index)
    {
        array_push($this->deleted_old_images_ids, $this->old_images[$index]->id);
        unset($this->old_images[$index]);
        $this->fillImages = false;
    }
    public function removeNewPreview($index)
    {
        array_splice($this->images, $index, 1);
    }
    public function fillFields()
    {
        $product = $this->product;
        $this->item_id = $product->id;
        if ($this->fillImages) {
            $this->old_images = $product->media();
        }

        //dd($this->old_images);
        $this->name = $product->getTranslation('name', 'en');
        $this->name_id = $product->getTranslation('name', 'id');
        if ($this->setExcertpt) {
            $this->excerpt = $this->product->excerpt;
            $this->setExcertpt = false;
        }
        $this->description = $product->description;

        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
        $this->sort = $product->sort;
        $this->slug = $product->slug;
        $this->buy_price = $product->buy_price;
        $this->price = $product->price; //sell price
        //$this->category=$product->
        $this->stock = $product->stock;
        $this->enabled = $product->enabled;

        //$this->readOnly=$product->
        //$this->categories=$product->
        //display options
        $this->product_id = $product->id;
        $this->featured = $product->display->featured;
        $this->new = $product->display->new;
        $this->promotion = $product->display->promotion;
        $this->show_stock = $product->display->show_stock;
        $this->hide_price = $product->display->hide_price;
        $this->hide_options = $product->display->hide_options;
        $this->hide_excerpt = $product->display->hide_excerpt;
        $this->hide_description = $product->display->hide_description;
        $this->hide_reviews = $product->display->hide_reviews;
        $this->hide_features = $product->display->hide_features;
        $this->hide_specifications = $product->display->hide_specifications;
    }

    public function resetFields()
    {
        $this->product = '';
        $this->item_id = '';
        $this->images = '';
        $this->old_images = '';
        $this->name = '';
        $this->name_id = '';
        $this->description = '';
        $this->excerpt = '';
        $this->category_id = '';
        $this->brand_id = '';
        $this->sort = '';
        $this->slug = '';
        $this->buy_price = '';
        $this->price = ''; //sell price
        //$this->category=$product->
        $this->stock = '';
        $this->enabled = '';
        $this->deleted_old_images_ids = '';
        //$this->readOnly=$product->
        //$this->categories=$product->
    }
}
