<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $languages = config('app.languages');
        $lang = session()->has('lang') ? session()->get('lang') : '';
        if (in_array($lang, $languages)) {
            App::setLocale($lang);
        }

        // $settings = Cache::rememberForever('settings', function () {
        //     return Setting::all()->pluck('value', 'name')->toArray();
        // });

        // config($settings); // Any DB settings will overwrite app config

        return $next($request);
    }
}
