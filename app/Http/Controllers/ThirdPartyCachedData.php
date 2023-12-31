<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ThirdPartyCachedData extends Controller
{
    public function __invoke()
    {
        // TASK COMPLETED 3. 3rd party responses may be cached for a configurable time.
        // TASK COMPLETED - You can use any endpoint found in the official documentation.
        // TASK COMPLETED Note: Please use both APIs. (https://swapi.dev/api/films)
        $url = config('main.third_party_api').'films';
        return Cache::remember($url, config('main.cache_time.one_day'), function () use ($url){
            return Http::get($url)->json();
        });
    }
}
