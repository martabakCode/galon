<?php

namespace App\Http\Livewire\App;

use App\Models\Brand;
use App\Models\Media;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Brands extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $brand_id;
    public $brands;
    public $brand;
    public $image;
    public $name;
    public $name_id;
    public $description_en;
    public $description_id;
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
            $s = "%" . $this->search . "%";
            $langs = config('app.languages');
            $this->brands = Brand::where(function ($q) use ($langs, $s) {
                foreach ($langs as $lang) {
                    $q->orWhere('name->' . $lang, 'LIKE', strtolower($s));
                }
            })->orderBy('sort')
                ->get();
        } else {
            $this->brands = Brand::orderBy('sort')->get();
        }

        return view('livewire.app.brands');
    }

    public function removePreview()
    {
        $this->image = '';
    }

    public function resetFields()
    {
        $this->brand_id = '';
        $this->brand = '';
        $this->image = '';
        $this->name = '';
        $this->name_id = '';
        $this->description_en = '';
        $this->description_id = '';
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
        $this->brand = new Brand;
        $this->openModal();
    }
    public function edit($id, $readOnly = false)
    {
        $this->brand_id = $id;
        $this->readOnly = $readOnly;
        $brand = Brand::findOrFail($id);
        $this->brand = $brand;
        $this->name = $brand->getTranslation('name', 'en');
        $this->name_id = $brand->getTranslation('name', 'id');
        $this->description_en = $brand->description_en;
        $this->description_id = $brand->description_id;
        $this->sort = $brand->sort;
        $this->enabled = $brand->enabled;
        $this->image = $brand->media() ? $brand->media() : '';
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
        $data['sort'] = $this->sort;
        if ($this->brand_id) {
            $this->brand->Update($data);
        } else {
            $brand = $this->brand->Create($data);
            $this->brand_id = $brand->id;
        }

        if ($this->image && !isset($this->image->path)) {
            //dd($this->image);
            $file_info = $this->image->getClientOriginalName();
            $file_name = pathinfo($file_info, PATHINFO_FILENAME);
            $file_extension = pathinfo($file_info, PATHINFO_EXTENSION);
            // $name =  Str::slug($file_name, '-') . '-' . $product->id . '.' . $file_extension;
            $size = $this->image->getSize();
            $path = $this->image->storeAs('brands', $file_info, 'public');
            $name['id'] = $file_info;
            $name['en'] = $file_info;
            $media = Media::where('type', 'Brand')->where('item_id', $this->brand_id)->first();
            if ($media) {
                $media->update([
                    'name' => $name,
                    'path' => $path,
                    'size' => $size,
                    'type' => 'Brand',
                    'item_id' => $this->brand_id,
                ]);
            } else {
                Media::create([
                    'name' => $name,
                    'path' => $path,
                    'size' => $size,
                    'type' => 'Brand',
                    'item_id' => $this->brand_id,
                ]);
            }

        }
        $this->resetFields();
        session()->flash('success', 'Brand updated successfully.');
        $this->closeModal();
    }

    public function enabled($id)
    {
        //dd('ggg');
        $this->enabled = !$this->enabled;
        $brand = Brand::findOrFail($id);
        $brand->enabled = !$brand->enabled;
        $brand->update();
        //dd($brand);
    }
    public function deleteId($id)
    {
        $this->brand_id = $id;
        $this->brand = Brand::findOrFail($id);
        $this->openDeleteModal();
    }
    public function delete()
    {
        $brand = Brand::findOrFail($this->brand_id);
        $brand->delete();
        $this->resetFields();
        $this->closeDeleteModal();
    }
}
