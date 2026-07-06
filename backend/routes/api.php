<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// Routes publiques
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes protégées par authentification
Route::middleware(['auth:sanctum'])->group(function () {

    // Espace Admin
    Route::middleware(['is_admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return response()->json(['message' => 'Dashboard Administrateur']);
        });
    });

    // Espace Agriculteur
    Route::middleware(['is_agriculteur'])->group(function () {
        Route::get('/agriculteur/dashboard', function () {
            return response()->json(['message' => 'Dashboard Agriculteur']);
        });
    });

    // Espace Conseiller
    Route::middleware(['is_conseiller'])->group(function () {
        Route::get('/conseiller/dashboard', function () {
            return response()->json(['message' => 'Dashboard Conseiller']);
        });
    });
});