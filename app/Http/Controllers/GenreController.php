<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *    name="Genres",
 *    description="API Endpoints of Genres and their relationships"
 * )
 */
class GenreController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/genres",
     *     operationId="getGenres",
     *     tags={"Genres"},
     *     summary="Get all genres",
     *     description="Returns a list of genres.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="A list with genres"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized. The request must include a valid Bearer token in the Authorization header."
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $genres = Genre::all();
        return response()->json($genres);
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
     *     path="/api/genres/{genre_id}",
     *     operationId="getGenreById",
     *     tags={"Genres"},
     *     summary="Get a specific genre",
     *     description="Returns a specific genre by ID.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="genre_id",
     *         in="path",
     *         required=true,
     *         description="ID of the genre",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="The genre details"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized. The request must include a valid Bearer token in the Authorization header."
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Genre not found"
     *     )
     * )
     */
    public function show(int $genre_id): JsonResponse
    {
        if (!Genre::where("id", $genre_id)->exists()) {
            return response()->json([
                "message" => "Genre not found"
            ], 404);
        }
        $genre = Genre::find($genre_id);
        return response()->json($genre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $genre_id): JsonResponse
    {
        return response()->json([
            "message" => "Method not allowed"
        ], 405);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $genre_id): JsonResponse
    {
        return response()->json([
            "message" => "Method not allowed"
        ], 405);
    }

    /**
     * @OA\Get(
     *     path="/api/genres/{genre_id}/movies",
     *     operationId="getGenreMovies",
     *     tags={"Genres"},
     *     summary="Get movies associated with a specific genre",
     *     description="Returns a list of movies associated with a specific genre.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="genre_id",
     *         in="path",
     *         required=true,
     *         description="ID of the genre",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="A list with movies"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized. The request must include a valid Bearer token in the Authorization header."
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Genre not found"
     *     )
     * )
     */
    public function movies(int $genre_id): JsonResponse
    {
        if (!Genre::where("id", $genre_id)->exists()) {
            return response()->json([
                "message" => "Genre not found"
            ], 404);
        }
        $movies = Genre::find($genre_id)->movies()->paginate(10);
        return response()->json($movies);
    }
}
