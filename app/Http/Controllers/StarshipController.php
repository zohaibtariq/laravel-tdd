<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStarshipRequest;
use App\Http\Requests\UpdateStarshipRequest;

use App\Models\Starship;
use App\Repositories\Interfaces\StarshipRepositoryInterface;
use \Illuminate\Http\Request;

class StarshipController extends Controller
{

    public StarshipRepositoryInterface $starshipRepository;
    public function __construct(StarshipRepositoryInterface $starshipRepository)
    {
        $this->starshipRepository = $starshipRepository;
    }
    
    /**
     * @OA\Get(
     **     path="/api/starships",
     *      tags={"StarWars"},
     *      summary="Display listing of starships",
     *      description="Display a list of starships with pagination",
     *      operationId="ListingOfAlllStarships",
     *      security={{"sanctum":{}}},
     *  @OA\Parameter(
     *      name="page",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *       type="integer",
     *       format="int64",
     *       example=1
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="limit",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *       type="integer",
     *       format="int64",
     *       example=20
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success"
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function index(Request $request)
    {
        return $this->starshipRepository->orderBy('id', 'DESC')->paginate($request->limit?:10);
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
