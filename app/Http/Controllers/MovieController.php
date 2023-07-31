<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @OA\Tag(
 *    name="Movies",
 *  description="API Endpoints of Movies and their relationships"
 * )
 * 
 */
class MovieController extends Controller
{
/**
 * Display a listing of the resource.
 * @OA\Get(
 *     path="/api/movies",
 *     operationId="getMovies",
 *     summary="Get all movies",
 *     tags={"Movies"},
 *     description="Returns a list of movies. This endpoint requires a valid Bearer token in the Authorization header.",
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="A list with movies"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized. The request must include a valid Bearer token in the Authorization header."
 *     )
 * )
 */
    public function index(): JsonResponse
    {
        $movies = Movie::paginate(10);
        return response()->json($movies);
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
 *     path="/api/movies/{movie_id}",
 *     operationId="getMovieById",
 *     tags={"Movies"},
 *     summary="Get a specific movie",
 *     description="Returns a specific movie by ID.",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="movie_id",
 *         in="path",
 *         required=true,
 *         description="ID of the movie",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="The movie details"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized. The request must include a valid Bearer token in the Authorization header."
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Movie not found"
 *     )
 * )
 */
    public function show(int $movie_id): JsonResponse
    {
        if (!Movie::where("id", $movie_id)->exists()) {
            return response()->json([
                "message" => "Movie not found"
            ], 404);
        }
        $movie = Movie::find($movie_id);
        return response()->json($movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $movie_id)
    {
        return response()->json([
            "message" => "Method not allowed"
        ], 405);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $movie_id)
    {
        return response()->json([
            "message" => "Method not allowed"
        ], 405);
    }

    /**
 * @OA\Get(
 *     path="/api/movies/{movie_id}/genres",
 *     operationId="getMovieGenres",
 *     tags={"Movies"},
 *     summary="Get genres associated with a specific movie",
 *     description="Returns a list of genres associated with a specific movie.",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="movie_id",
 *         in="path",
 *         required=true,
 *         description="ID of the movie",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="A list with genres"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized. The request must include a valid Bearer token in the Authorization header."
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Movie not found"
 *     )
 * )
 */
    public function genres(int $movie_id): JsonResponse
    {
        if (!Movie::where("id", $movie_id)->exists()) {
            return response()->json([
                "message" => "Movie not found"
            ], 404);
        }
        $genres = Movie::find($movie_id)->genres;
        return response()->json($genres);

    }

    /**
 * @OA\Get(
 *     path="/api/movies/{movie_id}/rating",
 *     operationId="getMovieRating",
 *     tags={"Movies"},
 *     summary="Get ratings associated with a specific movie",
 *     description="Returns a list of ratings associated with a specific movie.",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="movie_id",
 *         in="path",
 *         required=true,
 *         description="ID of the movie",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="A list with ratings"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized. The request must include a valid Bearer token in the Authorization header."
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Movie not found"
 *     )
 * )
 */
    public function rating(int $movie_id): JsonResponse
    {
        if (!Movie::where("id", $movie_id)->exists()) {
            return response()->json([
                "message" => "Movie not found"
            ], 404);
        }
        $ratings = Movie::find($movie_id)->rating;
        return response()->json($ratings);
    }

    /**
 * @OA\Get(
 *     path="/api/movies/{movie_id}/directors",
 *     operationId="getMovieDirectors",
 *     tags={"Movies"},
 *     summary="Get directors associated with a specific movie",
 *     description="Returns a list of directors associated with a specific movie.",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="movie_id",
 *         in="path",
 *         required=true,
 *         description="ID of the movie",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="A list with directors"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized. The request must include a valid Bearer token in the Authorization header."
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Movie not found"
 *     )
 * )
 */
    public function directors(int $movie_id): JsonResponse
    {
        if(!Movie::where("id", $movie_id)->exists()) {
            return response()->json([
                "message" => "Movie not found"
            ], 404);
        }
        $directors = Movie::find($movie_id)->directors;
        return response()->json($directors);
    }

    /**
 * @OA\Get(
 *     path="/api/movies/{movie_id}/actors",
 *     operationId="getMovieActors",
 *     tags={"Movies"},
 *     summary="Get actors associated with a specific movie",
 *     description="Returns a list of actors associated with a specific movie.",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="movie_id",
 *         in="path",
 *         required=true,
 *         description="ID of the movie",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="A list with actors"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized. The request must include a valid Bearer token in the Authorization header."
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Movie not found"
 *     )
 * )
 */
    public function actors(int $movie_id): JsonResponse
    {
        if(!Movie::where("id", $movie_id)->exists()) {
            return response()->json([
                "message" => "Movie not found"
            ], 404);
        }
        $actors = Movie::find($movie_id)->actors;
        return response()->json($actors);
    }
}
