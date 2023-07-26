<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Display the specified resource.
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
     * Display the movies of the specified director.
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
