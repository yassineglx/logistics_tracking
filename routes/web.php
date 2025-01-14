<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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




Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Welcome, Admin!';
    });
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
