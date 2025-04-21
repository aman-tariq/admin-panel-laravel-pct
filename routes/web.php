<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminBaseController;
use App\Http\Controllers\admin\AdminAccountController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminContactController;
use App\Http\Controllers\admin\AdminCareerController;
use App\Http\Controllers\user\UserController;

// UI routes
Route::get('/', [UserController::class, 'index']);
Route::get('/contact', [UserController::class, 'contact']);
Route::post('/contact', [UserController::class, 'storeContact']);
Route::get('/careers', [UserController::class, 'careers']);
Route::post('/careers', [UserController::class, 'storeCareer']);
Route::get('/about', [UserController::class, 'about']);
Route::get('/services', [UserController::class, 'services']);

// Admin routes
Route::get('admin/login', [AdminAccountController::class, 'showAdminLoginView']);
Route::post('admin/do-login', [AdminAccountController::class, 'doAdminLogin']);
Route::post('admin/logout', [AdminAccountController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'showAdminDashboardView']);
Route::get('admin/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
Route::delete('admin/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('admin.contacts.destroy');
Route::put('admin/contacts/{contact}', [AdminContactController::class, 'update'])->name('admin.contacts.update');
Route::get('admin/careers', [AdminCareerController::class, 'index'])->name('admin.careers.index');
Route::delete('admin/careers/{id}', [AdminCareerController::class, 'destroy'])->name('admin.careers.destroy');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/menus', [AdminBaseController::class, 'manageMenus'])->name('menus.manage');
    Route::post('/menus', [AdminBaseController::class, 'storeMenu'])->name('menus.store');
    Route::delete('/menus/{id}', [AdminBaseController::class, 'deleteMenu'])->name('menus.delete');
});