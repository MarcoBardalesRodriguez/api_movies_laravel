<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/", function () {
    return response()->json([
        "message" => "Welcome to the Movie API",
        "status" => "OK",
    ]);
});

Route::apiResource("movies", MovieController::class);
Route::apiResource("genres", GenreController::class);
Route::apiResource("actors", ActorController::class);
Route::apiResource("directors", DirectorController::class);

// Rutas para obtener datos relacionados con los modelos
Route::prefix('movies')->group(function () {
    Route::get('{movie_id}/genres', [MovieController::class, 'genres']);
    Route::get('{movie_id}/rating', [MovieController::class, 'rating']);
    Route::get('{movie_id}/directors', [MovieController::class, 'directors']);
    Route::get('{movie_id}/actors', [MovieController::class, 'actors']);
});
Route::prefix('genres')->group(function () {
    Route::get('{genre_id}/movies', [GenreController::class, 'movies']);
});
Route::prefix('actors')->group(function () {
    Route::get('{actor_id}/movies', [ActorController::class, 'movies']);
});
Route::prefix('directors')->group(function () {
    Route::get('{director_id}/movies', [DirectorController::class, 'movies']);
});