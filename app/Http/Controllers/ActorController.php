<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *    name="Actors",
 *    description="API Endpoints of Actors and their relationships"
 * )
 */
class ActorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/actors",
     *     operationId="getActors",
     *     tags={"Actors"},
     *     summary="Get all actors",
     *     description="Returns a list of actors.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="A list with actors"
     *     )
     * )
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
     * @OA\Get(
     *     path="/api/actors/{actor_id}",
     *     operationId="getActorById",
     *     tags={"Actors"},
     *     summary="Get a specific actor",
     *     description="Returns a specific actor by ID.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="actor_id",
     *         in="path",
     *         required=true,
     *         description="ID of the actor",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="The actor details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Actor not found"
     *     )
     * )
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
     * @OA\Get(
     *     path="/api/actors/{actor_id}/movies",
     *     operationId="getActorMovies",
     *     tags={"Actors"},
     *     summary="Get movies associated with a specific actor",
     *     description="Returns a list of movies associated with a specific actor.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="actor_id",
     *         in="path",
     *         required=true,
     *         description="ID of the actor",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="A list with movies"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Actor not found"
     *     )
     * )
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
