<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHumanRequest;
use App\Http\Requests\UpdateHumanRequest;
use App\Repositories\Interfaces\HumanRepositoryInterface;

class HumanController extends Controller
{

    public HumanRepositoryInterface $humanRepository;

    public function __construct(HumanRepositoryInterface $humanRepository)
    {
        $this->humanRepository = $humanRepository;
    }

    /**
     * @OA\Get(
     **     path="/api/characters",
     *      tags={"StarWars"},
     *      summary="Display listing of characters",
     *      description="Display a list of characters with pagination",
     *      operationId="ListingOfAlllCharacters",
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
        return $this->humanRepository->orderBy('id', 'DESC')->paginate($request->limit?:10);
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
    public function store(StoreHumanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Human $human)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Human $human)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHumanRequest $request, Human $human)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Human $human)
    {
        //
    }
}
