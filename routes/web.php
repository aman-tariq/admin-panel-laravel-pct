<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminAccountController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminContactController;
use App\Http\Controllers\user\UserController;

Route::get('admin/login', [AdminAccountController::class, 'showAdminLoginView']);
Route::post('admin/do-login', [AdminAccountController::class, 'doAdminLogin']);

Route::get('/admin/dashboard', [AdminDashboardController::class, 'showAdminDashboardView']);


Route::get('admin/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');

Route::get('/', [UserController::class, 'index']);
Route::get('/contact', [UserController::class, 'contact']);
Route::post('/contact', [UserController::class, 'storeContact']);

Route::delete('admin/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('admin.contacts.destroy');
Route::put('admin/contacts/{contact}', [AdminContactController::class, 'update'])->name('admin.contacts.update');

Route::post('admin/logout', [AdminAccountController::class, 'logout'])->name('admin.logout');
