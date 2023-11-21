<?php

use App\Http\Controllers\JikanAPI;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\myDashboardController;

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

Route::get('/', [ListController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'edit'])->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/coba', [JikanAPI::class, 'anime']);
Route::get('/anime', [JikanAPI::class, 'anime']);
Route::get('/animee', [JikanAPI::class, 'animeseason']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/mylist/{id}', [myListController::class, 'index']);
    Route::get('/mydashboard/{id}', [myDashboardController::class,'index']);
});

require __DIR__ . '/auth.php';
