<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Models\Film;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filmQuery = Film::orderBy('id', 'DESC');
        if($request->has('search') && !empty($request->search)) // to test enable it from query param of postman.
            $filmQuery->where('title', 'like', '%'.$request->search.'%');
        return response()->json($filmQuery->paginate($request->limit?:10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmRequest $request)
    {
        return response()->json(Film::create($request->validated()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        $film->load('director', 'producer', 'episode', 'vehicles', 'characters', 'planets', 'starships', 'species'); // eager loading
        $film->makeHidden(['director_id', 'producer_id', 'episode_id']);
        return response()->json($film);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        $film->update($request->validated());
        if($request->has('starships_ids'))
            $film->starships()->sync($request->starships_ids);
        if($request->has('species_ids'))
            $film->species()->sync($request->starships_ids);
        if($request->has('characters_ids'))
            $film->characters()->sync($request->characters_ids);
        if($request->has('planets_ids'))
            $film->planets()->sync($request->planets_ids);
        if($request->has('vehicles_ids'))
            $film->vehicles()->sync($request->vehicles_ids);
        return response([]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }
}
