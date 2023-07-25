<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('welcome');
})->name('/');
 
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
 
    return redirect('/');

});

Route::get('/auth/google/logout', function () {
    Auth::logout();
 
    return redirect('/');
})->name('google.logout');
