<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\TokenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// View Routes
Route::get('/', function () {
    return view('pages.welcome');
})->name('/');
 
Route::get('/home', function () {
    return view('pages.index');
})->middleware(['auth'])->name('home');


// Auth Routes
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');
 
Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate([
        'google_id' => $googleUser->id,
    ], [
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'avatar' => $googleUser->avatar,
    ]);
 
    Auth::login($user);
 
    return redirect('home');
});

Route::get('/auth/google/logout', function () {
    Auth::logout();
 
    return redirect('/');
})->name('google.logout');


Route::resource('tokens', TokenController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(['auth']);


