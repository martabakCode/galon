<?php

namespace App\Http\Livewire\App\Settings;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class General extends Component
{
    use WithFileUploads;

    public $settings = [];
    public $logo;
    public $icon;

    public $remove_logo = false;
    public $remove_icon = false;
    public $set_slides = false;

    public $slides;
    public $slider_images = [];
    public $branches = [];

    public function render()
    {
        $this->settings = Setting::all();
        $this->setFields();
        //dd($this->branches);
        return view('livewire.app.settings.general');
    }

    public function setFields()
    {
        $settings = [];
        foreach ($this->settings as $setting) {
            $settings[$setting->name] = $setting->value;
        }

        if (!$this->set_slides) {
            $this->slider_images = json_decode($settings['slider_images']);
            $this->slides = count($this->slider_images);
        }
        if (!$this->remove_logo) {
            $this->logo = $settings['logo_en'];
        }

        if (!$this->remove_icon) {
            $this->icon = $settings['icon'];
        }

        $this->branches = json_decode($settings['branches']);
        //$this->settings['branches'] = $this->branches;
        $this->settings = $settings;
    }

    public function saveGeneral()
    {
        //dd($this->logo);

        foreach ($this->settings as $key => $value) {
            $set = '';
            if ($key != 'logo_en' && $key != 'icon') {
                $set = Setting::where('name', $key)->first();
            }

            if ($set) {
                $set->update(['value' => $value]);
            }

        }
        //Artisan::call('cache:clear');

        if ($this->logo && !is_string($this->logo)) {
            $path = $this->logo->store('/', 'public');
            Setting::where('name', 'logo_en')->first()->update(['value' => $path]);
        }
        if ($this->icon && !is_string($this->icon)) {
            $path = $this->icon->store('/', 'public');
            Setting::where('name', 'icon')->first()->update(['value' => $path]);
        }
        $this->emit('saved');
        //return back()->with('success', 'Setting saved successfully.');
    }

    public function saveHome()
    {
        $images = $this->slider_images;
        foreach ($images as $key => $image) {
            if ($image && !is_string($image)) {
                $path = $image->store('slider', 'public');
                $images[$key] = $path;
            }
        }
        // Remove empty values
        $images = array_filter($images);
        // re-indexing array
        $images = array_combine(range(0, count($images) - 1), array_values($images));
        $this->slider_images = $images;
        Setting::where('name', 'slider_images')->first()->update(['value' => $this->slider_images]);
        $this->slides = count($images);

        Setting::where('name', 'category_max_items')->first()->update(['value' => $this->settings['category_max_items']]);
        Setting::where('name', 'category_row_cells')->first()->update(['value' => $this->settings['category_row_cells']]);
        Setting::where('name', 'trending_max_items')->first()->update(['value' => $this->settings['trending_max_items']]);

        $this->emit('saved');
        //return back()->with('success', 'Settings updated Successfully !');
    }

    public function saveFooter()
    {
        Setting::where('name', 'copy_right_en')->first()->update(['value' => $this->settings['copy_right_en']]);
        Setting::where('name', 'copy_right_id')->first()->update(['value' => $this->settings['copy_right_id']]);
        $this->emit('saved');
    }

    public function saveSocial()
    {
        Setting::where('name', 'facebook')->first()->update(['value' => $this->settings['facebook']]);
        Setting::where('name', 'twitter')->first()->update(['value' => $this->settings['twitter']]);
        Setting::where('name', 'youtube')->first()->update(['value' => $this->settings['youtube']]);
        Setting::where('name', 'instagram')->first()->update(['value' => $this->settings['instagram']]);
        Setting::where('name', 'whatsapp')->first()->update(['value' => $this->settings['whatsapp']]);
        $this->emit('saved');
    }

    public function saveBranches()
    {
        $branches = json_encode($this->branches);
        Setting::where('name', 'branches')->first()->update(['value' => $branches]);

        $this->emit('saved');
    }

    public function removePreviewlogo()
    {
        $this->logo = '';
        $this->remove_logo = true;
    }

    public function removePreviewicon()
    {
        $this->icon = '';
        $this->remove_icon = true;
    }

    public function setSlides($value)
    {
        $this->slides = $value;
        $this->set_slides = true;
        for ($i = count($this->slider_images); $i < $value; $i++) {
            array_push($this->slider_images, '');
        }

    }

    public function removePreview($index = 0)
    {
        $this->slider_images[$index] = '';
        $this->set_slides = true;
    }
}
