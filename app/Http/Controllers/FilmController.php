<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Repositories\Interfaces\FilmRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends Controller
{
    public FilmRepositoryInterface $filmRepository;
    public function __construct(FilmRepositoryInterface $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    // TASK COMPLETED - API documentation will be valued positively.
    /**
     * @OA\Get(
     **     path="/api/films",
     *      tags={"Films"},
     *      summary="Display listing of film",
     *      description="Display a list of film with pagination",
     *      operationId="ListingOfAlllFilms",
     *      security={{"sanctum":{}}},
     *  @OA\Parameter(
     *      name="search",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
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
        $filmQuery = $this->filmRepository->orderBy('id', 'DESC');
        if($request->has('search') && !empty($request->search)) { // to test enable it from query param of postman.
            $filmQuery->where('title', 'like', '%' . $request->search . '%');
//            $filmQuery->search($request->search); // search don't work on builder it only works with direct model call
        }
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
     * @OA\Post(
     *      path="/api/films",
     *      summary="Store a film",
     *      description="Store a film",
     *      description="store film",
     *      operationId="StoreFilm",
     *      tags={"Films"},
     *      security={{"sanctum":{}}},
     * @OA\Response(
     *    response=201,
     *    description="Created"
     *     ),
     * @OA\Response(
     *    response=200,
     *    description="Success"
     *     ),
     *  @OA\Response(
     *      response=401,
     *      description="Returns when user is not authenticated",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Not authorized"),
     *          )
     *      )
     * )
     */
    public function store(StoreFilmRequest $request)
    {
        return response()->json($this->filmRepository->create($request->validated()), Response::HTTP_CREATED);
    }


    /**
     * @OA\Get(
     ** path="/api/films/{filmId}",
     *      tags={"Films"},
     *      summary="Detail of a film",
     *      description="Show detail of a film based on a film id",
     *      operationId="DetailOfAFilm",
     *      security={{"sanctum":{}}},
     *  @OA\Parameter(
     *    description="ID of Film",
     *    in="path",
     *    name="filmId",
     *    required=true,
     *    @OA\Schema(
     *       type="integer",
     *       format="int64",
     *       example=1
     *    )
     *  ),
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
     * @OA\Patch(
     ** path="/api/films/{filmId}",
     *      tags={"Films"},
     *      summary="Update a film",
     *      description="Update a film resource based on provided film id",
     *      operationId="UpdateFilm",
     *      security={{"sanctum":{}}},
     *  @OA\Parameter(
     *    description="ID of Film",
     *    in="path",
     *    name="filmId",
     *    required=true,
     *    @OA\Schema(
     *       type="integer",
     *       format="int64",
     *       example=1
     *    )
     *  ),
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
     * @OA\Delete(
     ** path="/api/films/{filmId}",
     *      tags={"Films"},
     *      summary="Delete a film",
     *      description="Permenantly delete a film resource based on provided film id",
     *      operationId="DeleteFilm",
     *      security={{"sanctum":{}}},
     *  @OA\Parameter(
     *    description="ID of Film",
     *    in="path",
     *    name="filmId",
     *    required=true,
     *    @OA\Schema(
     *       type="integer",
     *       format="int64",
     *       example=1
     *    )
     *  ),
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
    public function destroy(Film $film)
    {
        $film->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }
}
