<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\DomainsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ObservationsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/interets', 'interets')->name('interets');
    Route::view('/statistics', 'statistics')->name('statistics');
    Route::view('/rapport', 'rapport')->name('rapport');

    // CRUD for offers
    Route::resource('offers', OffreController::class);
    // CRUS for roles
    Route::resource('roles', RolesController::class);
    //CRUD for domains
    Route::resource('domains', DomainsController::class);
    // CRUD for observations
    Route::resource('observations', ObservationsController::class);

});

require __DIR__.'/auth.php';
