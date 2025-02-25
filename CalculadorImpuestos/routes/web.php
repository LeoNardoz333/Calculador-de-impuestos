<?php

use Illuminate\Support\Facades\Route;

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

#Home
Route::get('/', function () { return view('sign-up'); })->name('home');

#usuarios
Route::get('/login-usuarios', function () { return view('login-usuarios'); })
->name('V_login-usuarios');

#admins
Route::get('/login-admins', function() { return view('login-admins'); })
->name('V_login-admins');