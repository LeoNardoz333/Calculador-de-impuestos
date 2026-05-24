<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use GuzzleHttp\Middleware;

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
    return redirect()->route('auth.users.login');
})->name('home');

#- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - auth - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Route::prefix('auth')->name('auth.')->group(function () {
    #Users authentication
    Route::get('users', function () {
        return view('auth.users.login');
    })->name('users.login');

    Route::post('users', [AuthController::class, 'store'])->name('login.validate');
    Route::post('users/login', [UserController::class, 'attempt'])->name('user.attempt');


    Route::get('admins', function () {
        return view('admins.index');
    })->name('admins.login');

    #Sign up
    Route::get('sign-up', function () {
        return view('auth.register');
    })->name('sign-up');

    Route::post('sign-up', [UserController::class, 'store'])->name('register.store');
});

#- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - users - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Route::middleware(['auth'])->prefix("users")->name("users.")->group(function () {
    Route::get('dashboard', function () {
        return view('users.home.index');
    })->name('dashboard');
});

#- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - admins - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Route::prefix('admins')->name('admins.')->group(function () {
    Route::get('dashboard', function () {
        return view('admins.home.index');
    })->name('dashboard');
});
