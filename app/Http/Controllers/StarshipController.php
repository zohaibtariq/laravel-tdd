<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStarshipRequest;
use App\Http\Requests\UpdateStarshipRequest;

use App\Models\Starship;
use \Illuminate\Http\Request;

class StarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Starship::orderBy('id', 'DESC')->paginate($request->limit?:10);
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
    public function store(StoreStarshipRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Starship $starship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Starship $starship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStarshipRequest $request, Starship $starship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Starship $starship)
    {
        //
    }
}
