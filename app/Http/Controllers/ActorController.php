<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $actors = Actor::paginate(10);
        return response()->json($actors);
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
    public function show(int $actor_id): JsonResponse
    {
        if (!Actor::where("id", $actor_id)->exists()) {
            return response()->json([
                "message" => "Actor not found"
            ], 404);
        }
        $actor = Actor::find($actor_id);
        return response()->json($actor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $actor_id): JsonResponse
    {
        return response()->json([
            "message" => "Method not allowed"
        ], 405);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $actor_id): JsonResponse
    {
        return response()->json([
            "message" => "Method not allowed"
        ], 405);
    }

    /**
     * Display the movies related to the specified resource.
     * 
     */
    public function movies(int $actor_id): JsonResponse
    {
        if (!Actor::where("id", $actor_id)->exists()) {
            return response()->json([
                "message" => "Actor not found"
            ], 404);
        }
        $actor = Actor::find($actor_id);
        $movies = $actor->movies()->paginate(10);
        return response()->json($movies);
    }
}
