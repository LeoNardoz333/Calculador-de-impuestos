<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

#- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - home - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Route::get('/', function () {
    return redirect()->route('auth.login.form');
})->name('home');

#- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - auth - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Route::prefix('auth')->name('auth.')->group(function () {
    #Users authentication
    Route::view('login', 'auth')->name('login.form');

    Route::post('login', [AuthController::class, 'login'])->name('login');

    #Sign up
    Route::view('sign-up', 'auth.register')->name('register.form');

    Route::post('sign-up', [AuthController::class, 'register'])->name('register');

    # Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});