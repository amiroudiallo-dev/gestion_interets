<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\DomainsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\FirstRegisterController;
use App\Http\Controllers\SecondRegisterController;
use App\Http\Controllers\ObservationsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

// Routes nécessitant une authentification
Route::middleware('auth')->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Gestion des utilisateurs
    Route::resource('users', UserController::class);
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});

// Routes nécessitant une authentification et vérification par email
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/analyse', 'analyse')->name('analyse');
    Route::view('/deliberate', 'delibarate')->name('deliberation');
    Route::view('/interets', 'interets')->name('interets');
    Route::view('/statistics', 'statistics')->name('statistics');
    Route::view('/rapport', 'rapport')->name('rapport');

    Route::resource('first_registers', FirstRegisterController::class);

    Route::resource('second_registers', SecondRegisterController::class);
    // Gestion des offres
    // Route::resource('offers', OffreController::class);

    // Gestion des rôles
    Route::resource('roles', RolesController::class);

    // Gestion des domaines
    Route::resource('domains', DomainsController::class);

    // Gestion des observations
    Route::resource('observations', ObservationsController::class);
});

require __DIR__.'/auth.php';
