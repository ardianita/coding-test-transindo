<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TrashController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [SaleController::class, 'create'])->name('sale.create');
Route::post('/sales/store', [SaleController::class, 'store'])->name('sale.store');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');

Route::get('/sampah', [TrashController::class, 'index'])->name('trash.index');
Route::get('/sampah/create', [TrashController::class, 'create'])->name('trash.create');
Route::post('/sampah/store', [TrashController::class, 'store'])->name('trash.store');
Route::get('/sampah/{trash}/edit', [TrashController::class, 'edit'])->name('trash.edit');
Route::put('/sampah/{trash}/update', [TrashController::class, 'update'])->name('trash.update');
Route::delete('/sampah/{trash}', [TrashController::class, 'destroy'])->name('trash.delete');
