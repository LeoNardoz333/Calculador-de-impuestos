<?php
use Illuminate\Support\Facades\Route;

#- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - admins - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Route::middleware(['auth', 'role:admin'])->prefix('admins')->name('admins.')->group(function () {
    Route::view('dashboard', 'admins.home.index')->name('dashboard');
});