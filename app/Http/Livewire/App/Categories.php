<?php

namespace App\Http\Livewire\App;

use App\Models\Category;
use App\Models\Media;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $item_id;
    public $categories;
    public $category;
    public $image;
    public $name;
    public $name_id;
    public $description_en;
    public $description_id;
    public $parent_id;
    public $sort;
    public $enabled;
    public $readOnly = false;
    public $isOpen = false;
    public $isDeleteOpen = false;
    public $search;

    protected $rules = [
        'name' => 'required',
        'name_id' => 'required',
        // 'image' => 'nullable|image|max:5120', // 5MB Max
    ];

    public function render()
    {
        if (!empty($this->search)) {
            //DB::enableQueryLog(); // Enable query log
            $s = "%" . $this->search . "%";
            $langs = config('app.languages');
            $this->categories = Category::where(function ($q) use ($langs, $s) {
                foreach ($langs as $lang) {
                    $q->orWhere('name->' . $lang, 'LIKE', strtolower($s));
                }
            })->orderBy('sort')
                ->get();

        } else {
            $this->categories = Category::where('parent_id', 0)->orderBy('sort')->get();
        }

        return view('livewire.app.categories');
    }

    public function removePreview()
    {
        $this->image = '';
        Media::where('type', 'Category')->where('item_id', $this->item_id)->delete();
    }

    public function resetFields()
    {
        $this->item_id = '';
        $this->category = '';
        $this->image = '';
        $this->name = '';
        $this->name_id = '';
        $this->description_en = '';
        $this->description_id = '';
        $this->parent_id = 0;
        $this->sort = 0;
        $this->enabled = 1;
        $this->readOnly = false;
    }
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function openDeleteModal()
    {
        $this->isDeleteOpen = true;
    }

    public function closeDeleteModal()
    {
        $this->isDeleteOpen = false;
    }

    public function create()
    {
        $this->resetFields();
        $this->category = new Category;
        $this->openModal();
    }
    public function edit($id, $readOnly = false)
    {
        $this->item_id = $id;
        $this->readOnly = $readOnly;
        $category = Category::findOrFail($id);
        $this->category = $category;
        $this->parent_id = $category->parent_id;
        $this->name = $category->getTranslation('name', 'en');
        $this->name_id = $category->getTranslation('name', 'id');
        $this->description_en = $category->description_en;
        $this->description_id = $category->description_id;
        $this->sort = $category->sort;
        $this->enabled = $category->enabled;
        $this->image = $category->media() ? $category->media() : '';
        $this->openModal();
    }
    public function view($id)
    {
        $this->edit($id, true);
    }
    public function save()
    {
        $this->validate();
        $name['en'] = $this->name;
        $name['id'] = $this->name_id;
        $data['name'] = $name;
        $data['description_en'] = $this->description_en;
        $data['description_id'] = $this->description_id;
        $data['parent_id'] = $this->parent_id;
        $data['sort'] = $this->sort;
        if ($this->item_id) {
            $this->category->Update($data);
        } else {
            $category = $this->category->Create($data);
            $this->item_id = $category->id;
        }

        if ($this->image && !isset($this->image->path)) {
            //dd($this->image);
            $file_info = $this->image->getClientOriginalName();
            $file_name = pathinfo($file_info, PATHINFO_FILENAME);
            $file_extension = pathinfo($file_info, PATHINFO_EXTENSION);
            // $name =  Str::slug($file_name, '-') . '-' . $product->id . '.' . $file_extension;
            $size = $this->image->getSize();
            $path = $this->image->storeAs('categories', $file_info, 'public');
            $name['id'] = $file_info;
            $name['en'] = $file_info;
            $media = Media::where('type', 'Category')->where('item_id', $this->item_id)->first();
            if ($media) {
                $media->update([
                    'name' => $name,
                    'path' => $path,
                    'size' => $size,
                    'type' => 'Category',
                    'item_id' => $this->item_id,
                ]);
            } else {
                Media::create([
                    'name' => $name,
                    'path' => $path,
                    'size' => $size,
                    'type' => 'Category',
                    'item_id' => $this->item_id,
                ]);
            }

        }
        $this->resetFields();
        session()->flash('success', 'Category updated successfully.');
        $this->closeModal();
    }

    public function enabled($id)
    {
        //dd('ggg');
        $this->enabled = !$this->enabled;
        $category = Category::findOrFail($id);
        $category->enabled = !$category->enabled;
        $category->update();
        //dd($category);
    }
    public function deleteId($id)
    {
        $this->item_id = $id;
        $this->category = Category::findOrFail($id);
        $this->openDeleteModal();
    }
    public function delete()
    {
        if ($this->item_id == 1) {
            return;
        }

        $category = Category::findOrFail($this->item_id);
        $category->delete();
        $this->resetFields();
        $this->closeDeleteModal();
    }
}
