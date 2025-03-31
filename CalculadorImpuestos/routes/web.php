<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/', function () { return view('/login/login-usuarios'); })->name('home');

#usuarios
Route::get('/login/login-usuarios', function () { return view('/login/login-usuarios'); })
->name('V_login-usuarios');
Route::post('/login/login-usuarios', [UserController::class, 'validarLogin'])->name('login.validate');
Route::get('menu-usuarios', function(){ return view('menu-usuarios'); })->name('v_menu-usuarios');

#admins
Route::get('/login/login-admins', function() { return view('/login/login-admins'); })
->name('V_login-admins');

#Usuarios registro
Route::get('login/sign-up', function() {return view('/login/sign-up'); })->name('v_sign-up');
Route::post('/login/sign-up', [UserController::class, 'store'])->name('users.store');
Route::post('/login/login-usuarios',[UserController::class, 'validarLogin'])->name('user.login');