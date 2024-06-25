<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Blade::component('customer-layout', CustomerLayout::class);
        if (Schema::hasTable('settings')) {
            config([
                'global' => Setting::pluck('value', 'name')->all(),
                //->keyBy('name') // key every setting by its name
                // ->transform(function ($setting) {
                //     return $setting->value; // return only the value
                // })
                //->toArray() // make it an array
            ]);
        }

    }
}