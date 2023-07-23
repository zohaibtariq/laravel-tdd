<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateFilmRequest extends FormRequest
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
            'title' => ['required_without:director_id,producer_id,release_date,opening_crawl,episode_id,starships_ids,species_ids,characters_ids,planets_ids,vehicles_ids', 'sometimes', 'nullable', 'string', ],
            'director_id' => ['required_without:title,producer_id,release_date,opening_crawl,episode_id,starships_ids,species_ids,characters_ids,planets_ids,vehicles_ids', 'sometimes', 'nullable', 'integer', ],
            'producer_id' => ['required_without:director_id,title,release_date,opening_crawl,episode_id,starships_ids,species_ids,characters_ids,planets_ids,vehicles_ids', 'sometimes', 'nullable', 'integer', ],
            'release_date' => ['required_without:director_id,producer_id,title,opening_crawl,episode_id,starships_ids,species_ids,characters_ids,planets_ids,vehicles_ids', 'sometimes', 'nullable', 'date',],
            'opening_crawl' => ['required_without:director_id,producer_id,release_date,title,episode_id,starships_ids,species_ids,characters_ids,planets_ids,vehicles_ids', 'sometimes', 'nullable', 'string', ],
            'episode_id' => ['required_without:director_id,producer_id,release_date,opening_crawl,title,starships_ids,species_ids,characters_ids,planets_ids,vehicles_ids', 'sometimes', 'nullable', 'integer', ],
            'starships_ids' => ['required_without:director_id,producer_id,release_date,opening_crawl,title,species_ids,characters_ids,planets_ids,vehicles_ids', 'sometimes', 'nullable', 'array', ],
            'species_ids' => ['required_without:director_id,producer_id,release_date,opening_crawl,title,starships_ids,characters_ids,planets_ids,vehicles_ids', 'sometimes', 'nullable', 'array', ],
            'characters_ids' => ['required_without:director_id,producer_id,release_date,opening_crawl,title,starships_ids,species_ids,planets_ids,vehicles_ids', 'sometimes', 'nullable', 'array', ],
            'planets_ids' => ['required_without:director_id,producer_id,release_date,opening_crawl,title,starships_ids,species_ids,characters_ids,vehicles_ids', 'sometimes', 'nullable', 'array', ],
            'vehicles_ids' => ['required_without:director_id,producer_id,release_date,opening_crawl,title,starships_ids,species_ids,characters_ids,planets_ids', 'sometimes', 'nullable', 'array', ],
        ];
    }
}
