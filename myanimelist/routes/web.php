<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home.home');
})->name('home');

Route::get('/coba', function () {
    return view('home.coba');
});

Route::get('/profile', function () {
    return view('profile.edit');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/home', [\App\Http\Controllers\ListController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cek1', function () {
    return '<h1>cek1</h1>';
})->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
