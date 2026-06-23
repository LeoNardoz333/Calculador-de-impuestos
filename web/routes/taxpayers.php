<?php

use Illuminate\Support\Facades\Route;

#- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - taxpayers - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Route::middleware(['auth', 'role:taxpayer'])->prefix("taxpayers")->name("taxpayers.")->group(function () {
    Route::view('dashboard', 'taxpayers.home.index')->name('dashboard');
});