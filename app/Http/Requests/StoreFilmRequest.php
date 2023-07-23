<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'director_id' => ['required', 'integer'],
            'producer_id' => ['required', 'integer'],
            'release_date' => ['required'],
            'opening_crawl' => ['nullable', 'string'],
            'episode_id' => ['nullable', 'integer'],
        ];
    }
}
