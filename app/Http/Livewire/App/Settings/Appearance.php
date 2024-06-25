<?php

namespace App\Http\Livewire\App\Settings;

use App\Models\Setting;
use Livewire\Component;

class Appearance extends Component
{
    public $layout;
    public $basic;
    public $modern;

    public function mount()
    {
        $this->layout = config('global.layout', 'basic');

    }
    public function render()
    {
        //dd($this->layout);
        return view('livewire.app.settings.appearance');
    }

    public function saveLayout()
    {
        // dd($this->layout);
        $layoutSetting = Setting::where('name', 'layout')->first();
        if ($layoutSetting) {
            $layoutSetting->update(['value' => $this->layout]);
        }

        $this->emit('saved');

    }
}
