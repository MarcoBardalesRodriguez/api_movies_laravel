<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Display the specified resource.
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
     * Display genres associated with a specific movie.
     *
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
     * Display ratings associated with a specific movie.
     *
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
     * Display directors associated with a specific movie.
     *
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
     * Display actors associated with a specific movie.
     *
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
