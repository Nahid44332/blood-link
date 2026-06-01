<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('donors.index');
Route::post('/store-donor', [FrontendController::class, 'store'])->name('donor.store');
//Auth
Route::get('/admin/login', [AuthController::class, 'adminLogin']);
Route::get('/admin/logout', [AuthController::class, 'adminLogout']);
Auth::routes();

Route::get('/admin/deshboard', [AdminController::class, 'deshboard']);
Route::get('/admin/donors', [AdminController::class, 'donors'])->name('admin.donors.list');
Route::put('/admin/donors/{id}', [AdminController::class, 'update'])->name('admin.donors.update');
Route::delete('/admin/donors/{id}', [AdminController::class, 'destroy'])->name('admin.donors.destroy');