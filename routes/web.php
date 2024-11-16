<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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
    return view('layout.app');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [ProductController::class, 'geust'])->name('geust');
// Protège le tableau de bord avec le middleware 'auth'
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [ProductController::class, 'allProducts'])->name('dashboard');
    Route::get('/create', [ProductController::class, 'create'])->name('produits.create');
    Route::post('/produits', [ProductController::class, 'store'])->name('produits.store');
    Route::get('/produits', [ProductController::class, 'myProducts'])->name('produits.myProducts');
    Route::delete('/produits/{id}', [ProductController::class, 'destroy'])->name('produits.destroy');
    Route::get('/produits/{id}/edit', [ProductController::class, 'edit'])->name('produits.edit');
    Route::put('/produits/{id}', [ProductController::class, 'update'])->name('produits.update');
});