<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Users management
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('manage-users');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('edit-user');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('update-user');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('delete-user');

    // Transporters management
    Route::get('/transporters', [AdminController::class, 'manageTransporters'])->name('manage-transporters');
    Route::get('/transporters/{transporter}/edit', [AdminController::class, 'editTransporter'])->name('edit-transporter');
    Route::put('/transporters/{transporter}', [AdminController::class, 'updateTransporter'])->name('update-transporter');
    Route::delete('/transporters/{transporter}', [AdminController::class, 'deleteTransporter'])->name('delete-transporter');

    // Packages management
    Route::get('/packages', [AdminController::class, 'managePackages'])->name('manage-packages');
    Route::get('/packages/{package}/edit', [AdminController::class, 'editPackage'])->name('edit-package');
    Route::put('/packages/{package}', [AdminController::class, 'updatePackage'])->name('update-package');
    Route::delete('/packages/{package}', [AdminController::class, 'deletePackage'])->name('delete-package');
});

Route::middleware(['auth', 'role:Transporter'])->group(function () {
    Route::get('/transporter', function () {
        return 'Welcome, Transporter!';
    });
});

Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/user', function () {
        return 'Welcome, User!';
    });
});





require __DIR__.'/auth.php';
