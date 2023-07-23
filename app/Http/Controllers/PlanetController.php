<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanetRequest;
use App\Http\Requests\UpdatePlanetRequest;
use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Planet::orderBy('id', 'DESC')->paginate($request->limit?:10);
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
    public function store(StorePlanetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Planet $planet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planet $planet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanetRequest $request, Planet $planet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planet $planet)
    {
        //
    }
}
