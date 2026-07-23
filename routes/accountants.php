<?php
use Illuminate\Support\Facades\Route;

#- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - accountants - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Route::middleware(['auth', 'role:accountant'])->prefix('accountants')->name('accountants.')->group(function () {
    Route::view('dashboard', 'accountants.home.index')->name('dashboard');
});