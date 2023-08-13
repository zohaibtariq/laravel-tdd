<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

//use CountGptToken;
//use ChatGptToken;

class ThirdPartyTmdb extends Controller
{
    function test(){
//        dd(CountGptToken::count());
//        dd(CountGptToken::count_token('hello world'));

//        dd(ChatGptToken::count());
//        dd(ChatGptToken::count_token('hello world'));
    }

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
