<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Display the specified resource.
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
     * Display the movies related to the specified resource.
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
