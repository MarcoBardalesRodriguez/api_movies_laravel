<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *    name="Directors",
 *    description="API Endpoints of Directors and their relationships"
 * )
 */
class DirectorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/directors",
     *     operationId="getDirectors",
     *     tags={"Directors"},
     *     summary="Get all directors",
     *     description="Returns a list of directors.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="A list with directors"
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $directors = Director::paginate(10);
        return response()->json($directors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json([
            "message" => "Method not allowed"
        ], 405);
    }

    /**
     * @OA\Get(
     *     path="/api/directors/{director_id}",
     *     operationId="getDirectorById",
     *     tags={"Directors"},
     *     summary="Get a specific director",
     *     description="Returns a specific director by ID.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="director_id",
     *         in="path",
     *         required=true,
     *         description="ID of the director",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="The director details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Director not found"
     *     )
     * )
     */
    public function show(int $director_id): JsonResponse
    {
        if (!Director::where("id", $director_id)->exists()) {
            return response()->json([
                "message" => "Director not found"
            ], 404);
        }
        $director = Director::find($director_id);
        return response()->json($director);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $director_id): JsonResponse
    {
        return response()->json([
            "message" => "Method not allowed"
        ], 405);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $director_id): JsonResponse
    {
        return response()->json([
            "message" => "Method not allowed"
        ], 405);
    }
    
    /**
     * @OA\Get(
     *     path="/api/directors/{director_id}/movies",
     *     operationId="getDirectorMovies",
     *     tags={"Directors"},
     *     summary="Get movies associated with a specific director",
     *     description="Returns a list of movies associated with a specific director.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="director_id",
     *         in="path",
     *         required=true,
     *         description="ID of the director",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="A list with movies"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Director not found"
     *     )
     * )
     */
    public function movies(int $director_id): JsonResponse
    {
        if (!Director::where("id", $director_id)->exists()) {
            return response()->json([
                "message" => "Director not found"
            ], 404);
        }
        $director = Director::find($director_id);
        $movies = $director->movies()->paginate(10);
        return response()->json($movies);
    }
}
