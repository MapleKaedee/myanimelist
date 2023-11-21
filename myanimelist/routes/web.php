<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\JikanAPI;
use App\Http\Controllers\myDashboardController;
use App\Http\Controllers\myListController;
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

Route::get('/', [JikanAPI::class, 'showView'])->name('home');
Route::get('/profile', [ProfileController::class, 'edit'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/mylist/{id}', [myListController::class, 'index']);
    Route::get('/mydashboard/{id}', [myDashboardController::class, 'index']);
});

Route::controller(GoogleController::class)->group(function () {
    Route::get('/auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('/auth/google/callback', 'handleGoogleCallback');
});

require __DIR__ . '/auth.php';
