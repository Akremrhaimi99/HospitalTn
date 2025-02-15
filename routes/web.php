<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Tableau de bord générique (redirigé selon le rôle après connexion)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes protégées par authentification
Route::middleware('auth')->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

    // Routes spécifiques aux rôles
    // Admin
    // Routes spécifiques aux rôles
// Admin
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Gestion des utilisateurs
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.manage_users');

    // Afficher le formulaire d'édition d'un utilisateur
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');

    // Mettre à jour un utilisateur
    Route::put('/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');

    // Supprimer un utilisateur
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});


    // Patient
    Route::middleware(['role:patient'])->prefix('patient')->group(function () {
        Route::get('/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');
        Route::get('/appointments', [AppointmentController::class, 'index'])->name('patient.appointments');
        Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('patient.appointments.create');
        Route::post('/appointments', [AppointmentController::class, 'store'])->name('patient.appointments.store');
    });
    
    // Docteur
    Route::middleware(['role:doctor'])->prefix('doctor')->group(function () {
        Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
        Route::get('/doctor/appointments', [DoctorController::class, 'appointments'])->name('doctor.appointments');
        Route::post('/appointments/{id}/accept', [DoctorController::class, 'acceptAppointment'])->name('doctor.appointments.accept');
        Route::post('/appointments/{id}/reject', [DoctorController::class, 'rejectAppointment'])->name('doctor.appointments.reject');
    });

    // Routes générales pour les services
    Route::resource('services', ServiceController::class);
});

// Fichier pour les authentifications (Laravel Breeze/Fortify)
require __DIR__ . '/auth.php';