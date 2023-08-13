<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

//use CountGptToken;
//use ChatGptToken;

class ThirdPartyTmdb extends Controller
{
//    function test(){
//        $time = microtime(true);
//        $prompt = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at tempus tellus. Nullam tincidunt viverra nibh, eu maximus odio commodo et. In ac mauris venenatis, egestas leo commodo, venenatis nisi. Praesent sodales elit vel nulla cursus, id elementum justo pulvinar. Curabitur ut lectus rhoncus, faucibus massa a, pretium sapien. Vestibulum imperdiet nunc ac eros tempus hendrerit. Quisque maximus eu lorem convallis euismod. Vivamus non enim at nisi dictum consectetur. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc a semper lacus, et sollicitudin elit.';
//        $promptTokens = CountGptToken::count_token($prompt);
//        dd(CountGptToken::count());
//        dd($promptTokens, microtime(true) - $time);
//        dd(ChatGptToken::count());
//        dd(ChatGptToken::count_token('hello world'));
//    }

    // TASK COMPLETED Note: Please use both APIs. (https://api.themoviedb.org/)
    function accountList(){
        $url = config('tmdb.base_url') . config('tmdb.api_v3') . "/account/" . config('tmdb.account_id') . "/lists";
        return Cache::remember($url, config('main.cache_time.one_day'), function () use ($url){
            return Http::withHeaders([
                'Authorization' => 'Bearer ' . config('tmdb.api_read_access_token'),
                'accept' => 'application/json'
            ])->get($url)->json();
        });
    }

    function accountDetails(){
        $url = config('tmdb.base_url') . config('tmdb.api_v3') . "/account/" . config('tmdb.account_id');
        return Cache::remember($url, config('main.cache_time.one_day'), function () use ($url){
            return Http::withHeaders([
                'Authorization' => 'Bearer ' . config('tmdb.api_read_access_token'),
                'accept' => 'application/json'
            ])->get($url)->json();
        });
    }

    function changesMovieList(){
        $url = config('tmdb.base_url') . config('tmdb.api_v3') . "/movie/changes";
        return Cache::remember($url, config('main.cache_time.one_day'), function () use ($url){
            return Http::withHeaders([
                'Authorization' => 'Bearer ' . config('tmdb.api_read_access_token'),
                'accept' => 'application/json'
            ])->get($url)->json();
        });
    }

    function changesPeopleList(){
        $url = config('tmdb.base_url') . config('tmdb.api_v3') . "/person/changes";
        return Cache::remember($url, config('main.cache_time.one_day'), function () use ($url){
            return Http::withHeaders([
                'Authorization' => 'Bearer ' . config('tmdb.api_read_access_token'),
                'accept' => 'application/json'
            ])->get($url)->json();
        });
    }

    function changesTvList(){
        $url = config('tmdb.base_url') . config('tmdb.api_v3') . "/tv/changes";
        return Cache::remember($url, config('main.cache_time.one_day'), function () use ($url){
            return Http::withHeaders([
                'Authorization' => 'Bearer ' . config('tmdb.api_read_access_token'),
                'accept' => 'application/json'
            ])->get($url)->json();
        });
    }
}
