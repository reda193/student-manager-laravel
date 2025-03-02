<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SearchController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/manage', [InventoryController::class, 'index'])->name('manage.index');
Route::get('/manage/create', [InventoryController::class, 'create'])->name('manage.create');
Route::post('/manage', [InventoryController::class, 'store'])->name('manage.store');
Route::get('/manage/{id}/edit', [InventoryController::class, 'edit'])->name('manage.edit');
Route::put('/manage/{id}', [InventoryController::class, 'update'])->name('manage.update');
Route::delete('/manage/{id}', [InventoryController::class, 'destroy'])->name('manage.destroy');

Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search/results', [SearchController::class, 'search'])->name('search.perform');
