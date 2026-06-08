<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\EmergencyController;
use App\Http\Controllers\backend\HealthTipsController;
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
// Health Tips
Route::get('/admin/health-tips', [HealthTipsController::class, 'healthTips']);
Route::post('/admin/health-tips', [HealthTipsController::class, 'storeHealthTip'])->name('admin.health.store');
Route::post('/admin/health-tips/update/{id}', [HealthTipsController::class, 'updateHealthTip'])->name('admin.health.update');
Route::get('/admin/health-tips/delete/{id}', [HealthTipsController::class, 'deleteHealthTip'])->name('admin.health.delete');
// Emergency Contacts Routes
Route::get('/admin/emergency-contacts', [EmergencyController::class, 'emergencyContacts'])->name('admin.emergency.index');
Route::post('/admin/emergency-contacts/store', [EmergencyController::class, 'storeEmergency'])->name('admin.emergency.store');
Route::get('/admin/emergency-contacts/delete/{id}', [EmergencyController::class, 'deleteEmergency'])->name('admin.emergency.delete');