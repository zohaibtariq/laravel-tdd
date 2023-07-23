<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpeciesRequest;
use App\Http\Requests\UpdateSpeciesRequest;
use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Species::orderBy('id', 'DESC')->paginate($request->limit?:10);
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
    public function store(StoreSpeciesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Species $species)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Species $species)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpeciesRequest $request, Species $species)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Species $species)
    {
        //
    }
}
