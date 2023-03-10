<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index'])->name('annonces.home');
Route::get('/annonces/create', [AnnonceController::class, 'create'])->name('annonces.create');
Route::post('/annonces/create', [AnnonceController::class, 'store'])->name('annonces.store');
Route::get('/annonces/validate/{token}', [AnnonceController::class, 'validated'])->name('annonces.validated');
Route::get('/annonces/show/{id}', [AnnonceController::class, 'show'])->name('annonces.show');
Route::get('/annonces/delete/{token}', [AnnonceController::class, 'delete'])->name('annonces.delete');

